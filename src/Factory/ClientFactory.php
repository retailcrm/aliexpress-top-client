<?php

/**
 * PHP version 7.3
 *
 * @category ClientFactory
 * @package  RetailCrm\Factory
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Factory;

use Psr\Container\ContainerInterface;
use RetailCrm\Interfaces\ContainerAwareInterface;
use RetailCrm\Interfaces\FactoryInterface;
use RetailCrm\TopClient\Client;
use RetailCrm\Traits\ContainerAwareTrait;

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
class ClientFactory implements ContainerAwareInterface, FactoryInterface
{
    use ContainerAwareTrait;

    /** @var string $serviceUrl */
    private $serviceUrl;

    /**
     * @param \Psr\Container\ContainerInterface $container
     *
     * @return \RetailCrm\Factory\ClientFactory
     */
    public static function withContainer(ContainerInterface $container): ClientFactory
    {
        $factory = new self();
        $factory->setContainer($container);

        return $factory;
    }

    /**
     * @param string $serviceUrl
     *
     * @return $this
     */
    public function setServiceUrl(string $serviceUrl): ClientFactory
    {
        $this->serviceUrl = $serviceUrl;
        return $this;
    }

    /**
     * @return \RetailCrm\TopClient\Client
     * @throws \RetailCrm\Component\Exception\ValidationException
     */
    public function create(): Client
    {
        $client = new Client($this->serviceUrl);
        $client->setHttpClient($this->container->get('httpClient'));
        $client->setSerializer($this->container->get('serializer'));
        $client->setValidator($this->container->get('validator'));
        $client->validateSelf();

        return $client;
    }
}
