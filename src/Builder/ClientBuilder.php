<?php

/**
 * PHP version 7.3
 *
 * @category ClientBuilder
 * @package  RetailCrm\Builder
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Builder;

use RetailCrm\Component\Constants;
use RetailCrm\Component\ServiceLocator;
use RetailCrm\Interfaces\AppDataInterface;
use RetailCrm\Interfaces\BuilderInterface;
use RetailCrm\Interfaces\ContainerAwareInterface;
use RetailCrm\Interfaces\TopRequestFactoryInterface;
use RetailCrm\Interfaces\TopRequestProcessorInterface;
use RetailCrm\TopClient\Client;
use RetailCrm\Traits\ContainerAwareTrait;

/**
 * Class ClientBuilder
 *
 * @category ClientBuilder
 * @package  RetailCrm\Builder
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ClientBuilder implements ContainerAwareInterface, BuilderInterface
{
    use ContainerAwareTrait;

    /** @var \RetailCrm\Interfaces\AppDataInterface $appData */
    private $appData;

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
     * @return \RetailCrm\TopClient\Client
     * @throws \RetailCrm\Component\Exception\ValidationException
     */
    public function build(): Client
    {
        $client = new Client($this->appData);
        $client->setHttpClient($this->container->get(Constants::HTTP_CLIENT));
        $client->setSerializer($this->container->get(Constants::SERIALIZER));
        $client->setValidator($this->container->get(Constants::VALIDATOR));
        $client->setRequestFactory($this->container->get(TopRequestFactoryInterface::class));
        $client->setServiceLocator($this->container->get(ServiceLocator::class));
        $client->setProcessor($this->container->get(TopRequestProcessorInterface::class));
        $client->validateSelf();

        return $client;
    }
}
