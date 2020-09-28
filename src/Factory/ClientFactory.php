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
use RetailCrm\Component\Constants;
use RetailCrm\Interfaces\AppDataInterface;
use RetailCrm\Interfaces\AuthenticatorInterface;
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

    /** @var \RetailCrm\Interfaces\AppDataInterface $appData */
    private $appData;

    /*** @var AuthenticatorInterface $authenticator */
    protected $authenticator;

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
     * @param \RetailCrm\Interfaces\AppDataInterface $appData
     *
     * @return ClientFactory
     */
    public function setAppData(AppDataInterface $appData): ClientFactory
    {
        $this->appData = $appData;
        return $this;
    }

    /**
     * @param \RetailCrm\Interfaces\AuthenticatorInterface $authenticator
     *
     * @return $this
     */
    public function setAuthenticator(AuthenticatorInterface $authenticator): self
    {
        $this->authenticator = $authenticator;
        return $this;
    }

    /**
     * @return \RetailCrm\TopClient\Client
     * @throws \RetailCrm\Component\Exception\ValidationException
     */
    public function create(): Client
    {
        $client = new Client($this->appData, $this->authenticator);
        $client->setHttpClient($this->container->get(Constants::HTTP_CLIENT));
        $client->setSerializer($this->container->get(Constants::SERIALIZER));
        $client->setValidator($this->container->get(Constants::VALIDATOR));
        $client->setRequestFactory($this->container->get(RequestFactory::class));
        $client->validateSelf();

        return $client;
    }
}
