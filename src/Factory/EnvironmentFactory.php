<?php

/**
 * PHP version 7.4
 *
 * @category EnvironmentFactory
 * @package  RetailCrm\Factory
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Factory;

use Devanych\Di\Container;
use Psr\Container\ContainerInterface;
use Psr\Http\Client\ClientInterface;
use RetailCrm\TopClient\Client;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerAwareTrait;
use Symfony\Component\Validator\Validation;
use RetailCrm\Component\Environment;
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
class EnvironmentFactory implements EnvironmentAwareFactoryInterface
{
    public string $env;
    public ClientInterface $httpClient;

    /**
     * @param string $environmentType
     *
     * @return \RetailCrm\Factory\EnvironmentAwareFactoryInterface
     */
    public static function withEnv(string $environmentType = Environment::DEV): EnvironmentAwareFactoryInterface
    {
        $factory = new self();
        $factory->env = $environmentType;

        return $factory;
    }

    /**
     * @param \Psr\Http\Client\ClientInterface $httpClient
     *
     * @return \RetailCrm\Component\Environment
     */
    public function create(ClientInterface $httpClient): Environment
    {
        $this->httpClient = $httpClient;

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

        return new Environment($container);
    }

    /**
     * @param Container $container
     */
    protected function setProdServices(Container $container): void
    {
        $container->set('httpClient', $this->httpClient);
        $container->set('validator', Validation::createValidatorBuilder()->enableAnnotationMapping()->getValidator());
        $container->set('serializer', new Serializer(
            [new ObjectNormalizer()],
            [new XmlEncoder(), new JsonEncoder()]
        ));
        $container->set(ClientFactory::class, function (ContainerInterface $container): ClientFactory {
            $factory = new ClientFactory();
            $factory->setHttpClient($container->get('httpClient'));
            $factory->setSerializer($container->get('serializer'));
            $factory->setValidator($container->get('validator'));

            return $factory;
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
