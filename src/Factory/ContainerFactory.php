<?php

/**
 * PHP version 7.3
 *
 * @category EnvironmentFactory
 * @package  RetailCrm\Factory
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Factory;

use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Client\ClientInterface;
use RetailCrm\Component\Constants;
use RetailCrm\Component\DependencyInjection\Container;
use RetailCrm\Component\Environment;
use RetailCrm\Component\ServiceLocator;
use RetailCrm\Interfaces\FactoryInterface;
use RetailCrm\Service\RequestDataFilter;
use RetailCrm\Service\RequestSigner;
use Shieldon\Psr17\StreamFactory;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\TraceableValidator;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class EnvironmentFactory
 *
 * @category EnvironmentFactory
 * @package  RetailCrm\Factory
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ContainerFactory implements FactoryInterface
{
    /**
     * @var string $env
     */
    public $env;

    /**
     * @var \Psr\Http\Client\ClientInterface $httpClient
     */
    public $httpClient;

    /**
     * @param string $environmentType
     *
     * @return ContainerFactory
     */
    public static function withEnv(string $environmentType = Environment::DEV): ContainerFactory
    {
        $factory = new self();
        $factory->env = $environmentType;

        return $factory;
    }

    /**
     * @param \Psr\Http\Client\ClientInterface $httpClient
     *
     * @return \RetailCrm\Factory\ContainerFactory
     */
    public function withClient(ClientInterface $httpClient): ContainerFactory
    {
        $this->httpClient = $httpClient;
        return $this;
    }

    /**
     * @return \Psr\Container\ContainerInterface
     */
    public function create(): ContainerInterface
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
