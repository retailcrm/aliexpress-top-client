<?php

/**
 * PHP version 7.3
 *
 * @category PumpStream
 * @package  RetailCrm\Component\Psr7
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Component\Psr7;

use Psr\Http\Message\StreamInterface;

/**
 * Class PumpStream
 *
 * @category PumpStream
 * @package  RetailCrm\Component\Psr7
 * @author   Michael Dowling <mtdowling@gmail.com>
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class PumpStream implements StreamInterface
{
    /** @var callable|null */
    private $source;

    /** @var int|null */
    private $size;

    /** @var int */
    private $tellPos = 0;

    /** @var array */
    private $metadata;

    /** @var BufferStream */
    private $buffer;

    /**
     * @param callable(int): (string|null|false)  $source  Source of the stream data. The callable MAY
     *                                                     accept an integer argument used to control the
     *                                                     amount of data to return. The callable MUST
     *                                                     return a string when called, or false|null on error
     *                                                     or EOF.
     * @param array{size?: int, metadata?: array} $options Stream options:
     *                                                     - metadata: Hash of metadata to use with stream.
     *                                                     - size: Size of the stream, if known.
     */
    public function __construct(callable $source, array $options = [])
    {
        $this->source = $source;
        $this->size = $options['size'] ?? null;
        $this->metadata = $options['metadata'] ?? [];
        $this->buffer = new BufferStream();
    }

    /**
     * @return string
     * @throws \Throwable
     */
    public function __toString(): string
    {
        try {
            return Utils::copyToString($this);
        } catch (\Throwable $e) {
            if (\PHP_VERSION_ID >= 70400) {
                throw $e;
            }

            trigger_error(sprintf('%s::__toString exception: %s', self::class, (string) $e), E_USER_ERROR);
        }
    }

    /**
     * @return void
     */
    public function close(): void
    {
        $this->detach();
    }

    /**
     * @return |null
     */
    public function detach()
    {
        $this->tellPos = 0;
        $this->source = null;

        return null;
    }

    /**
     * @return int|null
     */
    public function getSize(): ?int
    {
        return $this->size;
    }

    /**
     * @return int
     */
    public function tell(): int
    {
        return $this->tellPos;
    }

    /**
     * @return bool
     */
    public function eof(): bool
    {
        return $this->source === null;
    }

    /**
     * @return bool
     */
    public function isSeekable(): bool
    {
        return false;
    }

    /**
     *
     */
    public function rewind(): void
    {
        $this->seek(0);
    }

    /**
     * @param     $offset
     * @param int $whence
     */
    public function seek($offset, $whence = SEEK_SET): void
    {
        throw new \RuntimeException('Cannot seek a PumpStream');
    }

    /**
     * @return bool
     */
    public function isWritable(): bool
    {
        return false;
    }

    /**
     * @param $string
     *
     * @return int
     */
    public function write($string): int
    {
        throw new \RuntimeException('Cannot write to a PumpStream');
    }

    /**
     * @return bool
     */
    public function isReadable(): bool
    {
        return true;
    }

    /**
     * @param $length
     *
     * @return string
     */
    public function read($length): string
    {
        $data = $this->buffer->read($length);
        $readLen = strlen($data);
        $this->tellPos += $readLen;
        $remaining = $length - $readLen;

        if ($remaining) {
            $this->pump($remaining);
            $data .= $this->buffer->read($remaining);
            $this->tellPos += strlen($data) - $readLen;
        }

        return $data;
    }

    /**
     * @return string
     */
    public function getContents(): string
    {
        $result = '';
        while (!$this->eof()) {
            $result .= $this->read(1000000);
        }

        return $result;
    }

    /**
     * @param null $key
     *
     * @return array|mixed|null
     */
    public function getMetadata($key = null)
    {
        if (!$key) {
            return $this->metadata;
        }

        return $this->metadata[$key] ?? null;
    }

    /**
     * @param int $length
     */
    private function pump(int $length): void
    {
        if ($this->source) {
            do {
                $data = call_user_func($this->source, $length);

                if ($data === false || $data === null) {
                    $this->source = null;
                    return;
                }

                $this->buffer->write($data);
                $length -= strlen($data);
            } while ($length > 0);
        }
    }
}
