<?php

/**
 * PHP version 7.3
 *
 * @category ClientBuilder
 * @package  RetailCrm\Builder
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Builder;

use RetailCrm\Component\Constants;
use RetailCrm\Component\ServiceLocator;
use RetailCrm\Factory\RequestFactory;
use RetailCrm\Interfaces\AppDataInterface;
use RetailCrm\Interfaces\AuthenticatorInterface;
use RetailCrm\Interfaces\BuilderInterface;
use RetailCrm\Interfaces\ContainerAwareInterface;
use RetailCrm\TopClient\Client;
use RetailCrm\Traits\ContainerAwareTrait;

/**
 * Class ClientBuilder
 *
 * @category ClientBuilder
 * @package  RetailCrm\Builder
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ClientBuilder implements ContainerAwareInterface, BuilderInterface
{
    use ContainerAwareTrait;

    /** @var \RetailCrm\Interfaces\AppDataInterface $appData */
    private $appData;

    /*** @var AuthenticatorInterface $authenticator */
    protected $authenticator;

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
     * @return ClientBuilder
     */
    public function setAppData(AppDataInterface $appData): ClientBuilder
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
    public function build(): Client
    {
        $client = new Client($this->appData, $this->authenticator);
        $client->setHttpClient($this->container->get(Constants::HTTP_CLIENT));
        $client->setSerializer($this->container->get(Constants::SERIALIZER));
        $client->setValidator($this->container->get(Constants::VALIDATOR));
        $client->setRequestFactory($this->container->get(RequestFactory::class));
        $client->setServiceLocator($this->container->get(ServiceLocator::class));
        $client->validateSelf();

        return $client;
    }
}
