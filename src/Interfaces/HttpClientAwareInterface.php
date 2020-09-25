<?php

/**
 * PHP version 7.4
 *
 * @category ClientAwareInterface
 * @package  RetailCrm\Interfaces
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Interfaces;

use Psr\Http\Client\ClientInterface;

/**
 * Interface HttpClientAwareInterface
 *
 * @category HttpClientAwareInterface
 * @package  RetailCrm\Interfaces
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
interface HttpClientAwareInterface
{
    /**
     * @param \Psr\Http\Client\ClientInterface $httpClient
     *
     * @return mixed
     */
    public function setHttpClient(ClientInterface $httpClient): void;
}
