<?php

/**
 * PHP version 7.3
 *
 * @category UploadedFileFactory
 * @package  RetailCrm\Factory
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Factory;

use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UploadedFileFactoryInterface as BaseUploadedFileFactoryInterface;
use Psr\Http\Message\UploadedFileInterface;
use RetailCrm\Interfaces\UploadedFileFactoryInterface;

/**
 * Class UploadedFileFactory
 *
 * @category UploadedFileFactory
 * @package  RetailCrm\Factory
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class UploadedFileFactory implements UploadedFileFactoryInterface
{
    /** @var BaseUploadedFileFactoryInterface $baseFactory */
    private $baseFactory;

    /** @var StreamFactoryInterface $streamFactory */
    private $streamFactory;

    /**
     * UploadedFileFactory constructor.
     *
     * @param \Psr\Http\Message\UploadedFileFactoryInterface $baseFactory
     * @param \Psr\Http\Message\StreamFactoryInterface       $streamFactory
     */
    public function __construct(BaseUploadedFileFactoryInterface $baseFactory, StreamFactoryInterface $streamFactory)
    {
        $this->baseFactory   = $baseFactory;
        $this->streamFactory = $streamFactory;
    }

    /**
     * @param string $fileName
     *
     * @return \Psr\Http\Message\UploadedFileInterface
     */
    public function create(string $fileName): UploadedFileInterface
    {
        return $this->baseFactory->createUploadedFile($this->streamFactory->createStreamFromFile($fileName));
    }
}
