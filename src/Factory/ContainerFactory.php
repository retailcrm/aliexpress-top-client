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
use JMS\Serializer\Serializer;
use RetailCrm\Component\Constants;
use RetailCrm\Service\RequestSigner;
use Shieldon\Psr17\StreamFactory;
use Shieldon\Psr17\UploadedFileFactory as BaseFactory;
use JMS\Serializer\SerializerBuilder;
use Psr\Container\ContainerInterface;
use Psr\Http\Client\ClientInterface;
use RetailCrm\Component\DependencyInjection\Container;
use RetailCrm\Component\Environment;
use RetailCrm\Interfaces\FactoryInterface;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\TraceableValidator;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use JMS\Serializer\Handler\HandlerRegistry;

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
        $container->set(Constants::SERIALIZER, $this->getSerializer());
        $container->set(UploadedFileFactory::class, new UploadedFileFactory(new BaseFactory(), new StreamFactory()));
        $container->set(RequestSigner::class, function (ContainerInterface $container) {
            return new RequestSigner($container->get(Constants::SERIALIZER));
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
     * @return \JMS\Serializer\Serializer
     */
    protected function getSerializer(): Serializer
    {
        return SerializerBuilder::create()
            ->configureHandlers(function(HandlerRegistry $registry) {
                $returnNull = function($visitor, $obj, array $type) {
                    return null;
                };

                $registry->registerHandler(
                    GraphNavigatorInterface::DIRECTION_SERIALIZATION,
                    'UploadedFileInterface',
                    'json',
                    $returnNull
                );
                $registry->registerHandler(
                    GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
                    'UploadedFileInterface',
                    'json',
                    $returnNull
                );
                $registry->registerHandler(
                    GraphNavigatorInterface::DIRECTION_SERIALIZATION,
                    'UploadedFileInterface',
                    'xml',
                    $returnNull
                );
                $registry->registerHandler(
                    GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
                    'UploadedFileInterface',
                    'xml',
                    $returnNull
                );
            })->addDefaultHandlers()
            ->build();
    }
}
