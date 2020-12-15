<?php
/**
 * PHP version 7.3
 *
 * @category OAuthTokenFetcher
 * @package  RetailCrm\Component
 */

namespace RetailCrm\Component;

use Exception;
use JMS\Serializer\SerializerInterface;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriFactoryInterface;
use RetailCrm\Component\Exception\OAuthTokenFetcherException;
use RetailCrm\Interfaces\AppDataInterface;
use RetailCrm\Model\Request\OAuthTokenFetchRequest;
use RetailCrm\Model\Response\OAuthTokenFetcherResponse;

/**
 * Class OAuthTokenFetcher
 *
 * @category OAuthTokenFetcher
 * @package  RetailCrm\Component
 */
class OAuthTokenFetcher
{
    /**
     * @var SerializerInterface|\JMS\Serializer\Serializer $serializer
     */
    private $serializer;

    /**
     * @var StreamFactoryInterface $streamFactory
     */
    private $streamFactory;

    /**
     * @var \Psr\Http\Message\RequestFactoryInterface $requestFactory
     */
    private $requestFactory;

    /**
     * @var \Psr\Http\Message\UriFactoryInterface $uriFactory
     */
    private $uriFactory;

    /**
     * @var ClientInterface $client
     */
    private $client;

    /**
     * @var \RetailCrm\Interfaces\AppDataInterface $appData
     */
    private $appData;

    /**
     * OAuthTokenFetcher constructor.
     *
     * @param \JMS\Serializer\SerializerInterface       $serializer
     * @param \Psr\Http\Message\StreamFactoryInterface  $streamFactory
     * @param \Psr\Http\Message\RequestFactoryInterface $requestFactory
     * @param \Psr\Http\Message\UriFactoryInterface     $uriFactory
     * @param \Psr\Http\Client\ClientInterface          $client
     */
    public function __construct(
        SerializerInterface $serializer,
        StreamFactoryInterface $streamFactory,
        RequestFactoryInterface $requestFactory,
        UriFactoryInterface $uriFactory,
        ClientInterface $client
    ) {
        $this->serializer     = $serializer;
        $this->streamFactory  = $streamFactory;
        $this->requestFactory = $requestFactory;
        $this->uriFactory     = $uriFactory;
        $this->client         = $client;
    }

    /**
     * @param \RetailCrm\Interfaces\AppDataInterface $appData
     *
     * @return OAuthTokenFetcher
     */
    public function setAppData(AppDataInterface $appData): OAuthTokenFetcher
    {
        $this->appData = $appData;
        return $this;
    }

    /**
     * @param string $code
     * @param string $state
     *
     * @return \RetailCrm\Model\Response\OAuthTokenFetcherResponse
     * @throws \RetailCrm\Component\Exception\OAuthTokenFetcherException
     */
    public function fetchToken(string $code, string $state = ''): OAuthTokenFetcherResponse
    {
        $request               = new OAuthTokenFetchRequest();
        $request->clientId     = $this->appData->getAppKey();
        $request->clientSecret = $this->appData->getAppSecret();
        $request->redirectUri  = $this->appData->getRedirectUri();
        $request->code         = $code;

        if ('' !== $state) {
            $request->state = $state;
        }

        $requestData = $this->serializer->toArray($request);
        $postData    = http_build_query($requestData);
        $request     = null;
        $response    = null;

        try {
            $request = $this->requestFactory
                ->createRequest(
                    'POST',
                    $this->uriFactory->createUri('https://oauth.aliexpress.com/token')
                )->withBody($this->streamFactory->createStream($postData))
                ->withHeader('content-type', 'application/x-www-form-urlencoded; charset=UTF-8');
        } catch (Exception $exception) {
            throw new OAuthTokenFetcherException(
                sprintf('Cannot create request: %s', $exception->getMessage()),
                $exception
            );
        }

        try {
            $response = $this->client->sendRequest($request);
        } catch (ClientExceptionInterface $exception) {
            throw new OAuthTokenFetcherException(
                sprintf('Cannot send request: %s', $exception->getMessage()),
                $exception
            );
        }
        
        return $this->serializer->deserialize(
            self::getBodyContents($response->getBody()),
            OAuthTokenFetcherResponse::class,
            'json'
        );
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
