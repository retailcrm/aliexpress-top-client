<?php

/**
 * PHP version 7.3
 *
 * @category HttpClientAwareTrait
 * @package  RetailCrm\Traits
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Traits;

use Psr\Http\Client\ClientInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Trait HttpClientAwareTrait
 *
 * @category HttpClientAwareTrait
 * @package  RetailCrm\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
trait HttpClientAwareTrait
{
    /**
     * @var ClientInterface $httpClient
     * @Assert\NotNull(message="HTTP client should be provided")
     */
    protected $httpClient;

    /**
     * @param \Psr\Http\Client\ClientInterface $httpClient
     */
    public function setHttpClient(ClientInterface $httpClient): void
    {
        $this->httpClient = $httpClient;
    }
}
