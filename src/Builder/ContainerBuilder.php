<?php

/**
 * PHP version 7.3
 *
 * @category ContainerBuilder
 * @package  RetailCrm\Builder
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Builder;

use Cache\Adapter\PHPArray\ArrayCachePool;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use RetailCrm\Component\Constants;
use RetailCrm\Component\DependencyInjection\Container;
use RetailCrm\Component\Environment;
use RetailCrm\Component\ServiceLocator;
use RetailCrm\Factory\FileItemFactory;
use RetailCrm\Factory\OAuthTokenFetcherFactory;
use RetailCrm\Factory\ProductSchemaStorageFactory;
use RetailCrm\Factory\SerializerFactory;
use RetailCrm\Factory\TopRequestFactory;
use RetailCrm\Interfaces\BuilderInterface;
use RetailCrm\Interfaces\FileItemFactoryInterface;
use RetailCrm\Interfaces\RequestSignerInterface;
use RetailCrm\Interfaces\RequestTimestampProviderInterface;
use RetailCrm\Interfaces\TopRequestFactoryInterface;
use RetailCrm\Service\RequestDataFilter;
use RetailCrm\Service\RequestSigner;
use RetailCrm\Service\RequestTimestampProvider;
use RuntimeException;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\TraceableValidator;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class ContainerBuilder
 *
 * @category ContainerBuilder
 * @package  RetailCrm\Builder
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * ContainerBuilder should be like that.
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class ContainerBuilder implements BuilderInterface
{
    /**
     * @var string $env
     */
    private $env = Environment::DEV;

    /**
     * @var \Psr\Http\Client\ClientInterface $httpClient
     */
    private $httpClient;

    /**
     * @var \Psr\Log\LoggerInterface $logger
     */
    private $logger;

    /**
     * @var StreamFactoryInterface $streamFactory
     */
    private $streamFactory;

    /**
     * @var RequestFactoryInterface $requestFactory
     */
    private $requestFactory;

    /**
     * @var UriFactoryInterface $uriFactory
     */
    private $uriFactory;

    /** @var CacheItemPoolInterface $cache */
    private $cache;

    /**
     * @return static
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * @param string $environmentType
     *
     * @return ContainerBuilder
     */
    public function setEnv(string $environmentType = Environment::DEV): self
    {
        $this->env = strtoupper($environmentType);
        return $this;
    }

    /**
     * @param \Psr\Http\Client\ClientInterface $httpClient
     *
     * @return \RetailCrm\Builder\ContainerBuilder
     */
    public function setClient(ClientInterface $httpClient): ContainerBuilder
    {
        $this->httpClient = $httpClient;
        return $this;
    }

    /**
     * @param \Psr\Log\LoggerInterface $logger
     *
     * @return ContainerBuilder
     */
    public function setLogger(LoggerInterface $logger): ContainerBuilder
    {
        $this->logger = $logger;
        return $this;
    }

    /**
     * @param \Psr\Http\Message\StreamFactoryInterface $streamFactory
     *
     * @return ContainerBuilder
     */
    public function setStreamFactory(StreamFactoryInterface $streamFactory): ContainerBuilder
    {
        $this->streamFactory = $streamFactory;
        return $this;
    }

    /**
     * @param \Psr\Http\Message\RequestFactoryInterface $requestFactory
     *
     * @return ContainerBuilder
     */
    public function setRequestFactory(RequestFactoryInterface $requestFactory): ContainerBuilder
    {
        $this->requestFactory = $requestFactory;
        return $this;
    }

    /**
     * @param \Psr\Http\Message\UriFactoryInterface $uriFactory
     *
     * @return ContainerBuilder
     */
    public function setUriFactory(UriFactoryInterface $uriFactory): ContainerBuilder
    {
        $this->uriFactory = $uriFactory;
        return $this;
    }

    /**
     * @param \Psr\Cache\CacheItemPoolInterface $cache
     *
     * @return ContainerBuilder
     */
    public function setCache(CacheItemPoolInterface $cache): ContainerBuilder
    {
        $this->cache = $cache;
        return $this;
    }

    /**
     * @return \Psr\Container\ContainerInterface
     */
    public function build(): ContainerInterface
    {
        $container = new Container();
        $container->set(Environment::class, new Environment($this->env));

        switch ($this->env) {
            case Environment::PROD:
                $this->setProdServices($container);
                break;
            case Environment::DEV:
            case Environment::TEST:
                $this->setProdServices($container);
                $this->setDevServices($container);
                break;
            default:
                throw new RuntimeException(sprintf('Invalid environment type: %s', $this->env));
        }

        return $container;
    }

    /**
     * @param Container $container
     */
    protected function setProdServices(Container $container): void
    {
        $container->set(Constants::HTTP_CLIENT, $this->getHttpClient());
        $container->set(Constants::LOGGER, $this->getLogger());
        $container->set(Constants::CACHE, $this->getCache());
        $container->set(StreamFactoryInterface::class, $this->getStreamFactory());
        $container->set(RequestFactoryInterface::class, $this->getRequestFactory());
        $container->set(UriFactoryInterface::class, $this->getUriFactory());
        $container->set(RequestTimestampProviderInterface::class, new RequestTimestampProvider());
        $container->set(
            Constants::VALIDATOR,
            Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator()
        );
        $container->set(Constants::SERIALIZER, function (ContainerInterface $container) {
            return SerializerFactory::withContainer($container)->create();
        });
        $container->set(OAuthTokenFetcherFactory::class, function (ContainerInterface $container) {
            return new OAuthTokenFetcherFactory(
                $container->get(Constants::SERIALIZER),
                $container->get(StreamFactoryInterface::class),
                $container->get(RequestFactoryInterface::class),
                $container->get(UriFactoryInterface::class),
                $container->get(Constants::HTTP_CLIENT)
            );
        });
        $container->set(FileItemFactoryInterface::class, function (ContainerInterface $container) {
            return new FileItemFactory($container->get(StreamFactoryInterface::class));
        });
        $container->set(ProductSchemaStorageFactory::class, function (ContainerInterface $container) {
            return new ProductSchemaStorageFactory($container->get(Constants::CACHE));
        });
        $container->set(RequestDataFilter::class, new RequestDataFilter());
        $container->set(RequestSignerInterface::class, function (ContainerInterface $container) {
            return new RequestSigner($container->get(RequestDataFilter::class));
        });
        $container->set(TopRequestFactoryInterface::class, function (ContainerInterface $container) {
            return (new TopRequestFactory())
                ->setFilter($container->get(RequestDataFilter::class))
                ->setSerializer($container->get(Constants::SERIALIZER))
                ->setStreamFactory($container->get(StreamFactoryInterface::class))
                ->setRequestFactory($container->get(RequestFactoryInterface::class))
                ->setUriFactory($container->get(UriFactoryInterface::class))
                ->setSigner($container->get(RequestSignerInterface::class))
                ->setTimestampProvider($container->get(RequestTimestampProviderInterface::class));
        });
        $container->set(ServiceLocator::class, function (ContainerInterface $container) {
            $locator = new ServiceLocator();
            $locator->setContainer($container);

            return $locator;
        });
    }

    /**
     * @param Container $container
     */
    protected function setDevServices(Container $container): void
    {
        $validator = $container->get('validator');

        if ($validator instanceof ValidatorInterface) {
            $container->set('validator', new TraceableValidator($validator));
        }
    }

    /**
     * @return \Psr\Http\Client\ClientInterface
     */
    protected function getHttpClient(): ClientInterface
    {
        return $this->httpClient instanceof ClientInterface ? $this->httpClient : Psr18ClientDiscovery::find();
    }

    /**
     * @return \Psr\Log\LoggerInterface
     */
    protected function getLogger(): LoggerInterface
    {
        return $this->logger instanceof LoggerInterface ? $this->logger : new NullLogger();
    }

    /**
     * @return \Psr\Http\Message\StreamFactoryInterface
     */
    protected function getStreamFactory(): StreamFactoryInterface
    {
        return $this->streamFactory instanceof StreamFactoryInterface
            ? $this->streamFactory
            : Psr17FactoryDiscovery::findStreamFactory();
    }

    /**
     * @return \Psr\Http\Message\RequestFactoryInterface
     */
    protected function getRequestFactory(): RequestFactoryInterface
    {
        return $this->requestFactory instanceof RequestFactoryInterface
            ? $this->requestFactory
            : Psr17FactoryDiscovery::findRequestFactory();
    }

    /**
     * @return \Psr\Http\Message\UriFactoryInterface
     */
    protected function getUriFactory(): UriFactoryInterface
    {
        return $this->uriFactory instanceof UriFactoryInterface
            ? $this->uriFactory
            : Psr17FactoryDiscovery::findUriFactory();
    }

    /**
     * @return \Psr\Cache\CacheItemPoolInterface
     */
    protected function getCache(): CacheItemPoolInterface
    {
        return $this->cache instanceof CacheItemPoolInterface ? $this->cache : new ArrayCachePool();
    }
}
