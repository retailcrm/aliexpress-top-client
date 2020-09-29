<?php

/**
 * PHP version 7.3
 *
 * @category Client
 * @package  RetailCrm\TopClient
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\TopClient;

use JMS\Serializer\SerializerInterface;
use Psr\Http\Client\ClientInterface;
use RetailCrm\Component\ServiceLocator;
use RetailCrm\Interfaces\AppDataInterface;
use RetailCrm\Interfaces\AuthenticatorInterface;
use RetailCrm\Interfaces\RequestFactoryInterface;
use RetailCrm\Model\Request\BaseRequest;
use RetailCrm\Traits\ValidatorAwareTrait;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Client
 *
 * @category Client
 * @package  RetailCrm\TopClient
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class Client
{
    use ValidatorAwareTrait;

    /**
     * @var \RetailCrm\Interfaces\AppDataInterface $appData
     */
    protected $appData;

    /**
     * @var AuthenticatorInterface $authenticator
     * @Assert\NotNull(message="Authenticator should be provided")
     */
    protected $authenticator;

    /**
     * @var ClientInterface $httpClient
     * @Assert\NotNull(message="HTTP client should be provided")
     */
    protected $httpClient;

    /**
     * @var \RetailCrm\Interfaces\RequestFactoryInterface $requestFactory
     * @Assert\NotNull(message="RequestFactoryInterface should be provided")
     */
    protected $requestFactory;

    /**
     * @var SerializerInterface $serializer
     * @Assert\NotNull(message="Serializer should be provided")
     */
    protected $serializer;

    /**
     * @var \RetailCrm\Component\ServiceLocator $serviceLocator
     */
    protected $serviceLocator;

    /**
     * @var \RetailCrm\Interfaces\RequestTimestampProviderInterface
     */
    protected $timestampProvider;

    /**
     * Client constructor.
     *
     * @param \RetailCrm\Interfaces\AppDataInterface       $appData
     * @param \RetailCrm\Interfaces\AuthenticatorInterface $authenticator
     */
    public function __construct(AppDataInterface $appData, AuthenticatorInterface $authenticator)
    {
        $this->appData       = $appData;
        $this->authenticator = $authenticator;
    }

    /**
     * @throws \RetailCrm\Component\Exception\ValidationException
     */
    public function validateSelf(): void
    {
        $this->validate($this);
    }

    /**
     * @param \Psr\Http\Client\ClientInterface $httpClient
     */
    public function setHttpClient(ClientInterface $httpClient): void
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param \JMS\Serializer\SerializerInterface $serializer
     */
    public function setSerializer(SerializerInterface $serializer): void
    {
        $this->serializer = $serializer;
    }

    /**
     * @param \RetailCrm\Interfaces\RequestFactoryInterface $requestFactory
     */
    public function setRequestFactory(RequestFactoryInterface $requestFactory): void
    {
        $this->requestFactory = $requestFactory;
    }

    /**
     * @param \RetailCrm\Component\ServiceLocator $serviceLocator
     */
    public function setServiceLocator(ServiceLocator $serviceLocator): void
    {
        $this->serviceLocator = $serviceLocator;
    }

    /**
     * @return \RetailCrm\Component\ServiceLocator
     */
    public function getServiceLocator(): ServiceLocator
    {
        return $this->serviceLocator;
    }

    /**
     * @param \RetailCrm\Model\Request\BaseRequest $request
     *
     * @return void
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @throws \RetailCrm\Component\Exception\ValidationException
     * @throws \RetailCrm\Component\Exception\FactoryException
     *
     * @todo Implement this method and remove tag below.
     * @SuppressWarnings(PHPMD)
     */
    public function sendRequest(BaseRequest $request)
    {
        $httpRequest = $this->requestFactory->fromModel($request, $this->appData, $this->authenticator);
        $response = $this->httpClient->sendRequest($httpRequest);
    }
}
