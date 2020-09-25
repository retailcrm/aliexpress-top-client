<?php

/**
 * PHP version 7.4
 *
 * @category Environment
 * @package  RetailCrm\Component
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Component;

use Psr\Container\ContainerInterface;
use RetailCrm\Factory\ClientFactory;
use RetailCrm\TopClient\Client;

/**
 * Class Environment
 *
 * @category Environment
 * @package  RetailCrm\Component
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class Environment
{
    public const PROD = 'PROD';
    public const DEV  = 'DEV';
    public const TEST = 'TEST';

    private ContainerInterface $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @return \Psr\Container\ContainerInterface
     */
    public function getContainer(): ContainerInterface
    {
        return $this->container;
    }

    /**
     * @param string $serviceUrl
     *
     * @return \RetailCrm\TopClient\Client
     * @throws \RetailCrm\Component\Exception\ValidationException
     */
    public function createClient(string $serviceUrl): Client
    {
        $factory = $this->container->get(ClientFactory::class);

        if (!($factory instanceof ClientFactory)) {
            throw new \RuntimeException('Invalid factory definition in the provided container');
        }

        return $factory->create($serviceUrl);
    }
}
