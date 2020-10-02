<?php
/**
 * PHP version 7.3
 *
 * @category ProductSchemaStorageFactory
 * @package  RetailCrm\Factory
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Factory;

use Psr\Cache\CacheItemPoolInterface;
use RetailCrm\Component\Storage\ProductSchemaStorage;
use RetailCrm\Interfaces\FactoryInterface;
use RetailCrm\Interfaces\TopClientInterface;

/**
 * Class ProductSchemaStorageFactory
 *
 * @category ProductSchemaStorageFactory
 * @package  RetailCrm\Factory
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ProductSchemaStorageFactory implements FactoryInterface
{
    /** @var CacheItemPoolInterface $cache */
    private $cache;

    /** @var TopClientInterface $client */
    private $client;

    /**
     * ProductSchemaStorageFactory constructor.
     *
     * @param \Psr\Cache\CacheItemPoolInterface $cache
     */
    public function __construct(CacheItemPoolInterface $cache)
    {
        $this->cache = $cache;
    }

    /**
     * @param \RetailCrm\Interfaces\TopClientInterface $client
     *
     * @return ProductSchemaStorageFactory
     */
    public function setClient(TopClientInterface $client): ProductSchemaStorageFactory
    {
        $this->client = $client;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function create()
    {
        return new ProductSchemaStorage($this->client, $this->cache);
    }
}
