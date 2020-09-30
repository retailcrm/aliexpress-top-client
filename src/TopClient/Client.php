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
use Psr\Http\Message\StreamInterface;
use RetailCrm\Component\Exception\TopApiException;
use RetailCrm\Component\Exception\TopClientException;
use RetailCrm\Component\ServiceLocator;
use RetailCrm\Interfaces\AppDataInterface;
use RetailCrm\Interfaces\AuthenticatorInterface;
use RetailCrm\Interfaces\TopRequestFactoryInterface;
use RetailCrm\Interfaces\TopRequestProcessorInterface;
use RetailCrm\Model\Request\BaseRequest;
use RetailCrm\Model\Response\BaseResponse;
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
     * @var \RetailCrm\Interfaces\TopRequestFactoryInterface $requestFactory
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
     * @var TopRequestProcessorInterface $processor
     */
    protected $processor;

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
     * @param \RetailCrm\Interfaces\TopRequestFactoryInterface $requestFactory
     */
    public function setRequestFactory(TopRequestFactoryInterface $requestFactory): void
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
     * @param \RetailCrm\Interfaces\TopRequestProcessorInterface $processor
     *
     * @return Client
     */
    public function setProcessor(TopRequestProcessorInterface $processor): Client
    {
        $this->processor = $processor;
        return $this;
    }

    /**
     * @param \RetailCrm\Model\Request\BaseRequest $request
     *
     * @return \RetailCrm\Model\Response\BaseResponse
     * @throws \Psr\Http\Client\ClientExceptionInterface
     * @throws \RetailCrm\Component\Exception\ValidationException
     * @throws \RetailCrm\Component\Exception\FactoryException
     * @throws \RetailCrm\Component\Exception\TopClientException
     * @throws \RetailCrm\Component\Exception\TopApiException
     */
    public function sendRequest(BaseRequest $request)
    {
        $this->processor->process($request, $this->appData, $this->authenticator);

        $httpRequest = $this->requestFactory->fromModel($request, $this->appData, $this->authenticator);
        $httpResponse = $this->httpClient->sendRequest($httpRequest);

        /** @var BaseResponse $response */
        $response = $this->serializer->deserialize(
            self::getBodyContents($httpResponse->getBody()),
            $request->getExpectedResponse(),
            $request->format
        );

        if (!($response instanceof BaseResponse) && !is_subclass_of($response, BaseResponse::class)) {
            throw new TopClientException(sprintf('Invalid response class: %s', get_class($response)));
        }

        if (null !== $response->errorResponse) {
            throw new TopApiException($response->errorResponse);
        }

        return $response;
    }

    /**
     * Returns body stream data (it should work like that in order to keep compatibility with some implementations).
     *
     * @param \Psr\Http\Message\StreamInterface $stream
     *
     * @return string
     */
    protected static function getBodyContents(StreamInterface $stream): string
    {
        return $stream->isSeekable() ? $stream->__toString() : $stream->getContents();
    }
}
