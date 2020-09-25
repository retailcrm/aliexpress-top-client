<?php

/**
 * PHP version 7.4
 *
 * @category ClientFactory
 * @package  RetailCrm\Factory
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Factory;

use RetailCrm\Interfaces\HttpClientAwareInterface;
use RetailCrm\Interfaces\ValidatorAwareInterface;
use RetailCrm\TopClient\Client;
use RetailCrm\Traits\HttpClientAwareTrait;
use RetailCrm\Traits\ValidatorAwareTrait;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerAwareTrait;

/**
 * Class ClientFactory
 *
 * @category ClientFactory
 * @package  RetailCrm\Factory
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ClientFactory implements HttpClientAwareInterface, SerializerAwareInterface, ValidatorAwareInterface
{
    use HttpClientAwareTrait;
    use SerializerAwareTrait;
    use ValidatorAwareTrait;

    /**
     * @param string $serviceUrl
     *
     * @return \RetailCrm\TopClient\Client
     * @throws \RetailCrm\Component\Exception\ValidationException
     */
    public function create(string $serviceUrl): Client
    {
        $client = new Client($serviceUrl);
        $client->setHttpClient($this->httpClient);
        $client->setSerializer($this->serializer);
        $client->setValidator($this->validator);
        $client->validateSelf();

        return $client;
    }
}
