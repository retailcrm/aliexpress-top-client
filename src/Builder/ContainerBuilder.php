<?php

/**
 * PHP version 7.3
 *
 * @category ContainerBuilder
 * @package  RetailCrm\Builder
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Builder;

use Psr\Container\ContainerInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;
use RetailCrm\Component\Constants;
use RetailCrm\Component\DependencyInjection\Container;
use RetailCrm\Component\Environment;
use RetailCrm\Component\ServiceLocator;
use RetailCrm\Factory\FileItemFactory;
use RetailCrm\Factory\RequestFactory;
use RetailCrm\Factory\SerializerFactory;
use RetailCrm\Interfaces\BuilderInterface;
use RetailCrm\Service\RequestDataFilter;
use RetailCrm\Service\RequestSigner;
use Shieldon\Psr17\StreamFactory;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\TraceableValidator;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class ContainerBuilder
 *
 * @category ContainerBuilder
 * @package  RetailCrm\Builder
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ContainerBuilder implements BuilderInterface
{
    /**
     * @var string $env
     */
    private $env;

    /**
     * @var \Psr\Http\Client\ClientInterface $httpClient
     */
    private $httpClient;

    /**
     * @var \Psr\Log\LoggerInterface $logger
     */
    private $logger;

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
        $this->env = $environmentType;
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
     * @return \Psr\Container\ContainerInterface
     */
    public function build(): ContainerInterface
    {
        $container = new Container();

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
            throw new \RuntimeException(sprintf('Invalid environment type: %s', $this->env));
        }

        return $container;
    }

    /**
     * @param Container $container
     */
    protected function setProdServices(Container $container): void
    {
        $container->set(Constants::HTTP_CLIENT, $this->httpClient);
        $container->set(Constants::LOGGER, $this->logger ?: new NullLogger());
        $container->set(
            Constants::VALIDATOR,
            Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator()
        );
        $container->set(Constants::SERIALIZER, function (ContainerInterface $container) {
            return SerializerFactory::withContainer($container)->create();
        });
        $container->set(FileItemFactory::class, new FileItemFactory(new StreamFactory()));
        $container->set(RequestDataFilter::class, new RequestDataFilter());
        $container->set(RequestSigner::class, function (ContainerInterface $container) {
            return new RequestSigner(
                $container->get(Constants::SERIALIZER),
                $container->get(RequestDataFilter::class)
            );
        });
        $container->set(RequestFactory::class, function (ContainerInterface $container) {
            return new RequestFactory(
                $container->get(RequestSigner::class),
                $container->get(RequestDataFilter::class),
                $container->get(Constants::SERIALIZER)
            );
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
}
