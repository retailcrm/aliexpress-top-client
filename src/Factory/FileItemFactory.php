<?php

/**
 * PHP version 7.3
 *
 * @category FileItemFactory
 * @package  RetailCrm\Factory
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Factory;

use Psr\Http\Message\StreamFactoryInterface;
use RetailCrm\Interfaces\FileItemFactoryInterface;
use RetailCrm\Interfaces\FileItemInterface;
use RetailCrm\Model\FileItem;

/**
 * Class FileItemFactory
 *
 * @category FileItemFactory
 * @package  RetailCrm\Factory
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class FileItemFactory implements FileItemFactoryInterface
{
    /** @var StreamFactoryInterface $streamFactory */
    private $streamFactory;

    /**
     * FileItemFactory constructor.
     *
     * @param \Psr\Http\Message\StreamFactoryInterface $streamFactory
     */
    public function __construct(StreamFactoryInterface $streamFactory)
    {
        $this->streamFactory = $streamFactory;
    }

    /**
     * @param string $fileName Name without path
     * @param string $contents
     *
     * @return FileItemInterface
     */
    public function fromString(string $fileName, string $contents): FileItemInterface
    {
        return new FileItem($fileName, $this->streamFactory->createStream($contents));
    }

    /**
     * @param string $fileName Name with or without path
     *
     * @return FileItemInterface
     */
    public function fromFile(string $fileName): FileItemInterface
    {
        return new FileItem(basename($fileName), $this->streamFactory->createStreamFromFile($fileName));
    }
}
