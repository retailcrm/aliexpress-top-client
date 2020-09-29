<?php

/**
 * PHP version 7.3
 *
 * @category MultipartStream
 * @package  RetailCrm\Component\Psr7
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Component\Psr7;

use Psr\Http\Message\StreamInterface;

/**
 * Class MultipartStream
 *
 * @category MultipartStream
 * @package  RetailCrm\Component\Psr7
 * @author   Michael Dowling <mtdowling@gmail.com>
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class MultipartStream implements StreamInterface
{
    /**
     * @var \Psr\Http\Message\StreamInterface $stream
     */
    private $stream;

    /** @var string */
    private $boundary;

    /**
     * @param array       $elements Array of associative arrays, each containing a
     *                              required "name" key mapping to the form field,
     *                              name, a required "contents" key mapping to a
     *                              StreamInterface/resource/string, an optional
     *                              "headers" associative array of custom headers,
     *                              and an optional "filename" key mapping to a
     *                              string to send as the filename in the part.
     * @param string|null $boundary You can optionally provide a specific boundary
     *
     */
    public function __construct(array $elements = [], string $boundary = null)
    {
        $this->boundary = $boundary ?: sha1(uniqid('', true));
        $this->stream = $this->createStream($elements);
    }

    /**
     * Magic method used to create a new stream if streams are not added in
     * the constructor of a decorator.
     *
     * @param string $name
     *
     * @return StreamInterface
     */
    public function __get(string $name)
    {
        if ($name === 'stream') {
            $this->stream = $this->createStream();

            return $this->stream;
        }

        throw new \UnexpectedValueException("$name not found on class");
    }

    /**
     * @param string $name
     * @param        $value
     */
    public function __set(string $name, $value)
    {
        throw new \RuntimeException('Not implemented');
    }

    /**
     * @param string $name
     */
    public function __isset(string $name)
    {
        throw new \RuntimeException('Not implemented');
    }

    /**
     * @return string
     * @throws \Throwable
     */
    public function __toString(): string
    {
        try {
            if ($this->isSeekable()) {
                $this->seek(0);
            }

            return $this->getContents();
        } catch (\Throwable $e) {
            if (\PHP_VERSION_ID >= 70400) {
                throw $e;
            }

            trigger_error(sprintf('%s::__toString exception: %s', self::class, (string) $e), E_USER_ERROR);
        }
    }

    /**
     * Allow decorators to implement custom methods
     *
     * @param string $method
     * @param array  $args
     *
     * @return mixed
     */
    public function __call(string $method, array $args)
    {
        /** @var callable $callable */
        $callable = [$this->stream, $method];
        $result = call_user_func_array($callable, $args);

        return $result === $this->stream ? $this : $result;
    }

    /**
     * @return string
     */
    public function getContents(): string
    {
        return Utils::copyToString($this);
    }

    /**
     * close
     */
    public function close(): void
    {
        $this->stream->close();
    }

    /**
     * @param null $key
     *
     * @return array|mixed|null
     */
    public function getMetadata($key = null)
    {
        return $this->stream->getMetadata($key);
    }

    /**
     * @return resource|null
     */
    public function detach()
    {
        return $this->stream->detach();
    }

    /**
     * @return int|null
     */
    public function getSize(): ?int
    {
        return $this->stream->getSize();
    }

    /**
     * @return bool
     */
    public function eof(): bool
    {
        return $this->stream->eof();
    }

    /**
     * @return int
     */
    public function tell(): int
    {
        return $this->stream->tell();
    }

    /**
     * @return bool
     */
    public function isReadable(): bool
    {
        return $this->stream->isReadable();
    }

    /**
     * @return bool
     */
    public function isWritable(): bool
    {
        return $this->stream->isWritable();
    }

    /**
     * @return bool
     */
    public function isSeekable(): bool
    {
        return $this->stream->isSeekable();
    }

    /**
     * rewind
     */
    public function rewind(): void
    {
        $this->seek(0);
    }

    /**
     * @param int $offset
     * @param int $whence
     */
    public function seek($offset, $whence = SEEK_SET): void
    {
        $this->stream->seek($offset, $whence);
    }

    /**
     * @param int $length
     *
     * @return string
     */
    public function read($length): string
    {
        return $this->stream->read($length);
    }

    /**
     * @param string $string
     *
     * @return int
     */
    public function write($string): int
    {
        return $this->stream->write($string);
    }

    /**
     * @return string
     */
    public function getBoundary(): string
    {
        return $this->boundary;
    }

    /**
     * Create the aggregate stream that will be used to upload the POST data
     *
     * @param array $elements
     *
     * @return \Psr\Http\Message\StreamInterface
     */
    protected function createStream(array $elements = []): StreamInterface
    {
        $stream = new AppendStream();

        foreach ($elements as $element) {
            $this->addElement($stream, $element);
        }

        // Add the trailing boundary with CRLF
        $stream->addStream(Utils::streamFor("--{$this->boundary}--\r\n"));

        return $stream;
    }

    /**
     * Get the headers needed before transferring the content of a POST file
     *
     * @param array<string, string> $headers
     *
     * @return string
     */
    private function getHeaders(array $headers): string
    {
        $str = '';

        foreach ($headers as $key => $value) {
            $str .= "{$key}: {$value}\r\n";
        }

        return "--{$this->boundary}\r\n" . trim($str) . "\r\n\r\n";
    }

    /**
     * @param \RetailCrm\Component\Psr7\AppendStream $stream
     * @param array                                  $element
     */
    private function addElement(AppendStream $stream, array $element): void
    {
        foreach (['contents', 'name'] as $key) {
            if (!array_key_exists($key, $element)) {
                throw new \InvalidArgumentException("A '{$key}' key is required");
            }
        }

        $element['contents'] = Utils::streamFor($element['contents']);

        if (empty($element['filename'])) {
            $uri = $element['contents']->getMetadata('uri');

            if (substr($uri, 0, 6) !== 'php://') {
                $element['filename'] = $uri;
            }
        }

        [$body, $headers] = $this->createElement(
            $element['name'],
            $element['contents'],
            $element['filename'] ?? null,
            $element['headers'] ?? []
        );

        $stream->addStream(Utils::streamFor($this->getHeaders($headers)));
        $stream->addStream($body);
        $stream->addStream(Utils::streamFor("\r\n"));
    }

    /**
     * @param string                            $name
     * @param \Psr\Http\Message\StreamInterface $stream
     * @param string|null                       $filename
     * @param array                             $headers
     *
     * @return array
     */
    private function createElement(string $name, StreamInterface $stream, ?string $filename, array $headers): array
    {
        // Set a default content-disposition header if one was no provided
        $disposition = $this->getHeader($headers, 'content-disposition');

        if (!$disposition) {
            $headers['Content-Disposition'] = ($filename === '0' || $filename)
                ? sprintf(
                    'form-data; name="%s"; filename="%s"',
                    $name,
                    basename($filename)
                )
                : "form-data; name=\"{$name}\"";
        }

        // Set a default content-length header if one was no provided
        $length = $this->getHeader($headers, 'content-length');

        if (!$length && $length = $stream->getSize()) {
            $headers['Content-Length'] = (string) $length;
        }

        // Set a default Content-Type if one was not supplied
        $type = $this->getHeader($headers, 'content-type');

        if (!$type && ($filename === '0' || $filename) && $type = Utils::mimetypeFromFilename($filename)) {
            $headers['Content-Type'] = $type;
        }

        return [$stream, $headers];
    }

    /**
     * @param array  $headers
     * @param string $key
     *
     * @return mixed|null
     */
    private function getHeader(array $headers, string $key)
    {
        $lowercaseHeader = strtolower($key);
        foreach ($headers as $k => $v) {
            if (strtolower($k) === $lowercaseHeader) {
                return $v;
            }
        }

        return null;
    }
}
