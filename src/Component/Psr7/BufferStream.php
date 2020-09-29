<?php

/**
 * PHP version 7.3
 *
 * @category BufferStream
 * @package  RetailCrm\Component\Psr7
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Component\Psr7;

use Psr\Http\Message\StreamInterface;

/**
 * Class BufferStream
 *
 * @category BufferStream
 * @package  RetailCrm\Component\Psr7
 * @author   Michael Dowling <mtdowling@gmail.com>
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class BufferStream implements StreamInterface
{
    /** @var int */
    private $hwm;

    /** @var string */
    private $buffer = '';

    /**
     * @param int $hwm High water mark, representing the preferred maximum
     *                 buffer size. If the size of the buffer exceeds the high
     *                 water mark, then calls to write will continue to succeed
     *                 but will return 0 to inform writers to slow down
     *                 until the buffer has been drained by reading from it.
     */
    public function __construct(int $hwm = 16384)
    {
        $this->hwm = $hwm;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getContents();
    }

    /**
     * @return string
     */
    public function getContents(): string
    {
        $buffer = $this->buffer;
        $this->buffer = '';

        return $buffer;
    }

    /**
     *
     */
    public function close(): void
    {
        $this->buffer = '';
    }

    /**
     * @return |null
     */
    public function detach()
    {
        $this->close();

        return null;
    }

    /**
     * @return int|null
     */
    public function getSize(): ?int
    {
        return strlen($this->buffer);
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
        return true;
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
        throw new \RuntimeException('Cannot seek a BufferStream');
    }

    /**
     * @return bool
     */
    public function eof(): bool
    {
        return strlen($this->buffer) === 0;
    }

    /**
     * @return int
     */
    public function tell(): int
    {
        throw new \RuntimeException('Cannot determine the position of a BufferStream');
    }

    /**
     * Reads data from the buffer.
     */
    public function read($length): string
    {
        $currentLength = strlen($this->buffer);

        if ($length >= $currentLength) {
            // No need to slice the buffer because we don't have enough data.
            $result = $this->buffer;
            $this->buffer = '';
        } else {
            // Slice up the result to provide a subset of the buffer.
            $result = substr($this->buffer, 0, $length);
            $this->buffer = substr($this->buffer, $length);
        }

        return $result;
    }

    /**
     * Writes data to the buffer.
     */
    public function write($string): int
    {
        $this->buffer .= $string;

        if (strlen($this->buffer) >= $this->hwm) {
            return 0;
        }

        return strlen($string);
    }

    /**
     * @param null $key
     *
     * @return array|int|null
     */
    public function getMetadata($key = null)
    {
        if ($key === 'hwm') {
            return $this->hwm;
        }

        return $key ? null : [];
    }
}
