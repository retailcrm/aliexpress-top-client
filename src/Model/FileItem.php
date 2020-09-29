<?php

/**
 * PHP version 7.3
 *
 * @category FileItem
 * @package  RetailCrm\Model
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Model;

use Psr\Http\Message\StreamInterface;
use RetailCrm\Interfaces\FileItemInterface;

/**
 * Class FileItem
 *
 * @category FileItem
 * @package  RetailCrm\Model
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
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
