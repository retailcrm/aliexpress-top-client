<?php

/**
 * PHP version 7.3
 *
 * @category AppendStream
 * @package  RetailCrm\Component\Psr7
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Component\Psr7;

use Psr\Http\Message\StreamInterface;

/**
 * Class AppendStream
 *
 * @category AppendStream
 * @package  RetailCrm\Component\Psr7
 * @author   Michael Dowling <mtdowling@gmail.com>
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class AppendStream implements StreamInterface
{
    /** @var StreamInterface[] Streams being decorated */
    private $streams = [];

    /** @var bool */
    private $seekable = true;

    /** @var int */
    private $current = 0;

    /** @var int */
    private $pos = 0;

    /**
     * AppendStream constructor.
     *
     * @param StreamInterface[] $streams Streams to decorate. Each stream must
     *                                   be readable.
     */
    public function __construct(array $streams = [])
    {
        foreach ($streams as $stream) {
            $this->addStream($stream);
        }
    }

    /**
     * @return string
     * @throws \Throwable
     */
    public function __toString(): string
    {
        try {
            $this->rewind();

            return $this->getContents();
        } catch (\Throwable $e) {
            if (\PHP_VERSION_ID >= 70400) {
                throw $e;
            }

            trigger_error(sprintf('%s::__toString exception: %s', self::class, (string) $e), E_USER_ERROR);
        }
    }

    /**
     * Add a stream to the AppendStream
     *
     * @param StreamInterface $stream Stream to append. Must be readable.
     *
     * @throws \InvalidArgumentException if the stream is not readable
     */
    public function addStream(StreamInterface $stream): void
    {
        if (!$stream->isReadable()) {
            throw new \InvalidArgumentException('Each stream must be readable');
        }

        // The stream is only seekable if all streams are seekable
        if (!$stream->isSeekable()) {
            $this->seekable = false;
        }

        $this->streams[] = $stream;
    }

    /**
     * @return string
     */
    public function getContents(): string
    {
        return Utils::copyToString($this);
    }

    /**
     * Closes each attached stream.
     */
    public function close(): void
    {
        $this->pos = 0;
        $this->current = 0;
        $this->seekable = true;

        foreach ($this->streams as $stream) {
            $stream->close();
        }

        $this->streams = [];
    }

    /**
     * Detaches each attached stream.
     *
     * Returns null as it's not clear which underlying stream resource to return.
     */
    public function detach()
    {
        $this->pos = $this->current = 0;
        $this->seekable = true;

        foreach ($this->streams as $stream) {
            $stream->detach();
        }

        $this->streams = [];

        return null;
    }

    /**
     * @return int
     */
    public function tell(): int
    {
        return $this->pos;
    }

    /**
     * Tries to calculate the size by adding the size of each stream.
     *
     * If any of the streams do not return a valid number, then the size of the
     * append stream cannot be determined and null is returned.
     */
    public function getSize(): ?int
    {
        $size = 0;

        foreach ($this->streams as $stream) {
            $s = $stream->getSize();

            if ($s === null) {
                return null;
            }

            $size += $s;
        }

        return $size;
    }

    /**
     * @return bool
     */
    public function eof(): bool
    {
        return !$this->streams ||
            ($this->current >= count($this->streams) - 1 &&
                $this->streams[$this->current]->eof());
    }

    /**
     *
     */
    public function rewind(): void
    {
        $this->seek(0);
    }

    /**
     * Attempts to seek to the given position. Only supports SEEK_SET.
     *
     * @param int $offset
     * @param int $whence
     */
    public function seek($offset, $whence = SEEK_SET): void
    {
        if (!$this->seekable) {
            throw new \RuntimeException('This AppendStream is not seekable');
        }

        if ($whence !== SEEK_SET) {
            throw new \RuntimeException('The AppendStream can only seek with SEEK_SET');
        }

        $this->pos = $this->current = 0;

        // Rewind each stream
        foreach ($this->streams as $i => $stream) {
            try {
                $stream->rewind();
            } catch (\Exception $e) {
                throw new \RuntimeException('Unable to seek stream '
                    . $i . ' of the AppendStream', 0, $e);
            }
        }

        // Seek to the actual position by reading from each stream
        while ($this->pos < $offset && !$this->eof()) {
            $result = $this->read(min(8096, $offset - $this->pos));
            if ($result === '') {
                break;
            }
        }
    }

    /**
     * Reads from all of the appended streams until the length is met or EOF.
     *
     * @param int $length
     *
     * @return string
     */
    public function read($length): string
    {
        $buffer = '';
        $total = count($this->streams) - 1;
        $remaining = $length;
        $progressToNext = false;

        while ($remaining > 0) {
            if ($progressToNext || $this->streams[$this->current]->eof()) {
                $progressToNext = false;

                if ($this->current === $total) {
                    break;
                }

                $this->current++;
            }

            $result = $this->streams[$this->current]->read($remaining);

            if ($result === '') {
                $progressToNext = true;

                continue;
            }

            $buffer .= $result;
            $remaining = $length - strlen($buffer);
        }

        $this->pos += strlen($buffer);

        return $buffer;
    }

    /**
     * @return bool
     */
    public function isReadable(): bool
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isWritable(): bool
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isSeekable(): bool
    {
        return $this->seekable;
    }

    /**
     * @param string $string
     *
     * @return int
     */
    public function write($string): int
    {
        throw new \RuntimeException('Cannot write to an AppendStream');
    }

    /**
     * @param null $key
     *
     * @return array|mixed|null
     */
    public function getMetadata($key = null)
    {
        return $key ? null : [];
    }
}
