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

use DateTime;
use JMS\Serializer\SerializerInterface;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\StreamInterface;
use RetailCrm\Builder\AuthorizationUriBuilder;
use RetailCrm\Component\Exception\TopApiException;
use RetailCrm\Component\Exception\TopClientException;
use RetailCrm\Component\ServiceLocator;
use RetailCrm\Interfaces\AppDataInterface;
use RetailCrm\Interfaces\AuthenticatorInterface;
use RetailCrm\Interfaces\TopRequestFactoryInterface;
use RetailCrm\Interfaces\TopRequestProcessorInterface;
use RetailCrm\Model\Request\BaseRequest;
use RetailCrm\Model\Response\BaseResponse;
use RetailCrm\Model\Response\TopResponseInterface;
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
     * @var \RetailCrm\Interfaces\AuthenticatorInterface $authenticator
     */
    protected $authenticator;

    /**
     * Client constructor.
     *
     * @param \RetailCrm\Interfaces\AppDataInterface       $appData
     */
    public function __construct(AppDataInterface $appData)
    {
        $this->appData       = $appData;
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
     * @param \RetailCrm\Interfaces\AuthenticatorInterface $authenticator
     *
     * @return Client
     */
    public function setAuthenticator(AuthenticatorInterface $authenticator): Client
    {
        $this->authenticator = $authenticator;
        return $this;
    }

    /**
     * @return \RetailCrm\Component\ServiceLocator
     */
    public function getServiceLocator(): ServiceLocator
    {
        return $this->serviceLocator;
    }

    /**
     * @param bool $withState
     *
     * @return string
     *
     * $withState is passed to AuthorizationUriBuilder.
     * @see AuthorizationUriBuilder::__construct
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function getAuthorizationUri(bool $withState = false): string
    {
        $builder = new AuthorizationUriBuilder($this->appData->getAppKey(), $this->appData->getAppSecret(), $withState);
        return $builder->build();
    }

    /**
     * Send TOP request
     *
     * @param \RetailCrm\Model\Request\BaseRequest $request
     *
     * @return TopResponseInterface
     * @throws \RetailCrm\Component\Exception\ValidationException
     * @throws \RetailCrm\Component\Exception\FactoryException
     * @throws \RetailCrm\Component\Exception\TopClientException
     * @throws \RetailCrm\Component\Exception\TopApiException
     */
    public function sendRequest(BaseRequest $request): TopResponseInterface
    {
        if ('json' !== $request->format) {
            throw new TopClientException(sprintf('Client only supports JSON mode, got `%s` mode', $request->format));
        }

        $this->processor->process($request, $this->appData);

        $httpRequest = $this->requestFactory->fromModel($request, $this->appData);

        try {
            $httpResponse = $this->httpClient->sendRequest($httpRequest);
        } catch (ClientExceptionInterface $exception) {
            throw new TopClientException(sprintf('Error sending request: %s', $exception->getMessage()), $exception);
        }

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
            throw new TopApiException($response->errorResponse, $response->requestId);
        }

        return $response;
    }

    /**
     * Send authenticated TOP request
     *
     * @param \RetailCrm\Model\Request\BaseRequest $request
     *
     * @return \RetailCrm\Model\Response\TopResponseInterface
     * @throws \RetailCrm\Component\Exception\FactoryException
     * @throws \RetailCrm\Component\Exception\TopApiException
     * @throws \RetailCrm\Component\Exception\TopClientException
     * @throws \RetailCrm\Component\Exception\ValidationException
     */
    public function sendAuthenticatedRequest(BaseRequest $request): TopResponseInterface
    {
        if (null === $this->authenticator) {
            throw new TopClientException('Authenticator is not provided');
        }

        $this->authenticator->authenticate($request);

        return $this->sendRequest($request);
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
