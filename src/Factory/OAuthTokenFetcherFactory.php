<?php
/**
 * PHP version 7.3
 *
 * @category OAuthTokenFetcherFactory
 * @package  RetailCrm\Factory
 */

namespace RetailCrm\Factory;

use JMS\Serializer\SerializerInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;
use RetailCrm\Component\OAuthTokenFetcher;
use RetailCrm\Interfaces\ParametrizedFactoryInterface;

/**
 * Class OAuthTokenFetcherFactory
 *
 * @category OAuthTokenFetcherFactory
 * @package  RetailCrm\Factory
 */
class OAuthTokenFetcherFactory implements ParametrizedFactoryInterface
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
     * OAuthTokenFetcherFactory constructor.
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
     * @param \RetailCrm\Interfaces\AppDataInterface $params
     *
     * @return \RetailCrm\Component\OAuthTokenFetcher
     */
    public function create($params): OAuthTokenFetcher
    {
        return (new OAuthTokenFetcher(
            $this->serializer,
            $this->streamFactory,
            $this->requestFactory,
            $this->uriFactory,
            $this->client
        ))->setAppData($params);
    }
}
