<?php

/**
 * PHP version 7.3
 *
 * @category FileItem
 * @package  RetailCrm\Model
 */
namespace RetailCrm\Model;

use Psr\Http\Message\StreamInterface;
use RetailCrm\Interfaces\FileItemInterface;

/**
 * Class FileItem
 *
 * @category FileItem
 * @package  RetailCrm\Model
 */
class FileItem implements FileItemInterface
{
    /** @var string $fileName */
    private $fileName;

    /** @var StreamInterface */
    private $stream;

    /**
     * FileItem constructor.
     *
     * @param string                            $fileName
     * @param \Psr\Http\Message\StreamInterface $stream
     */
    public function __construct(string $fileName, StreamInterface $stream)
    {
        $this->fileName = $fileName;
        $this->stream = $stream;
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getStream(): StreamInterface
    {
        return $this->stream;
    }
}
