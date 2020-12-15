<?php

/**
 * PHP version 7.3
 *
 * @category ServiceLocator
 * @package  RetailCrm\Component
 */
namespace RetailCrm\Component;

use RetailCrm\Factory\FileItemFactory;
use RetailCrm\Factory\OAuthTokenFetcherFactory;
use RetailCrm\Interfaces\ContainerAwareInterface;
use RetailCrm\Interfaces\FileItemFactoryInterface;
use RetailCrm\Traits\ContainerAwareTrait;

/**
 * Class ServiceLocator
 *
 * @category ServiceLocator
 * @package  RetailCrm\Component
 */
class ServiceLocator implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * @return \RetailCrm\Factory\OAuthTokenFetcherFactory
     */
    public function getOAuthTokenFetcherFactory(): OAuthTokenFetcherFactory
    {
        return $this->getContainer()->get(OAuthTokenFetcherFactory::class);
    }

    /**
     * @return \RetailCrm\Interfaces\FileItemFactoryInterface
     */
    public function getFileItemFactory(): FileItemFactoryInterface
    {
        return $this->getContainer()->get(FileItemFactory::class);
    }
}
