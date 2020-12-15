<?php

/**
 * PHP version 7.3
 *
 * @category TopClientBuilder
 * @package  RetailCrm\Builder
 */
namespace RetailCrm\Builder;

use RetailCrm\Component\Constants;
use RetailCrm\Component\Environment;
use RetailCrm\Component\ServiceLocator;
use RetailCrm\Factory\ProductSchemaStorageFactory;
use RetailCrm\Interfaces\AppDataInterface;
use RetailCrm\Interfaces\AuthenticatorInterface;
use RetailCrm\Interfaces\BuilderInterface;
use RetailCrm\Interfaces\ContainerAwareInterface;
use RetailCrm\Interfaces\TopRequestFactoryInterface;
use RetailCrm\TopClient\TopClient;
use RetailCrm\Traits\ContainerAwareTrait;

/**
 * Class TopClientBuilder
 *
 * @category TopClientBuilder
 * @package  RetailCrm\Builder
 */
class TopClientBuilder implements ContainerAwareInterface, BuilderInterface
{
    use ContainerAwareTrait;

    /** @var \RetailCrm\Interfaces\AppDataInterface $appData */
    private $appData;

    /** @var \RetailCrm\Interfaces\AuthenticatorInterface $authenticator */
    private $authenticator;

    /**
     * @return static
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * @param \RetailCrm\Interfaces\AppDataInterface $appData
     *
     * @return TopClientBuilder
     */
    public function setAppData(AppDataInterface $appData): TopClientBuilder
    {
        $this->appData = $appData;
        return $this;
    }

    /**
     * @param \RetailCrm\Interfaces\AuthenticatorInterface $authenticator
     *
     * @return TopClientBuilder
     */
    public function setAuthenticator(AuthenticatorInterface $authenticator): TopClientBuilder
    {
        $this->authenticator = $authenticator;
        return $this;
    }

    /**
     * @return \RetailCrm\TopClient\TopClient
     * @throws \RetailCrm\Component\Exception\ValidationException
     */
    public function build(): TopClient
    {
        $client = new TopClient($this->appData);
        $client->setHttpClient($this->container->get(Constants::HTTP_CLIENT));
        $client->setSerializer($this->container->get(Constants::SERIALIZER));
        $client->setValidator($this->container->get(Constants::VALIDATOR));
        $client->setEnv($this->container->get(Environment::class));
        $client->setLogger($this->container->get(Constants::LOGGER));
        $client->setRequestFactory($this->container->get(TopRequestFactoryInterface::class));
        $client->setServiceLocator($this->container->get(ServiceLocator::class));
        $client->setProductSchemaStorageFactory($this->container->get(ProductSchemaStorageFactory::class));

        if (null !== $this->authenticator) {
            $client->setAuthenticator($this->authenticator);
        }

        $client->validateSelf();

        return $client;
    }
}
