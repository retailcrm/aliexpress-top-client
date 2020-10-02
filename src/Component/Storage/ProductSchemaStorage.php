<?php
/**
 * PHP version 7.3
 *
 * @category ProductSchemaStorage
 * @package  RetailCrm\Component\Storage
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Component\Storage;

use Psr\Cache\CacheItemPoolInterface;
use RetailCrm\Interfaces\TopClientInterface;

/**
 * Class ProductSchemaStorage
 *
 * @category ProductSchemaStorage
 * @package  RetailCrm\Component\Storage
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ProductSchemaStorage
{
    /** @var TopClientInterface */
    private $client;

    /** @var CacheItemPoolInterface $cache */
    private $cache;

    /**
     * ProductSchemaStorage constructor.
     *
     * @param \RetailCrm\Interfaces\TopClientInterface $client
     * @param \Psr\Cache\CacheItemPoolInterface        $cache
     */
    public function __construct(TopClientInterface $client, CacheItemPoolInterface $cache)
    {
        $this->client = $client;
        $this->cache = $cache;
    }

    /**
     * Returns product schema (updates it automatically if it's TTL has expired)
     *
     * @param int $ttl in seconds
     *
     * @return string
     */
    public function getProductSchema(int $ttl = 86400): string
    {
        // TODO: Implement product schema fetching and refreshing.
    }
}
