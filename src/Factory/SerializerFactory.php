<?php

/**
 * PHP version 7.3
 *
 * @category SerializerFactory
 * @package  RetailCrm\Factory
 */
namespace RetailCrm\Factory;

use JMS\Serializer\Annotation\PostDeserialize;
use JMS\Serializer\EventDispatcher\EventDispatcher;
use JMS\Serializer\EventDispatcher\ObjectEvent;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use JMS\Serializer\Visitor\Factory\JsonSerializationVisitorFactory;
use Psr\Container\ContainerInterface;
use RetailCrm\Component\Constants;
use RetailCrm\Component\JMS\EventSubscriber\TimezoneDeserializeSubscriber;
use RetailCrm\Component\JMS\Factory\JsonDeserializationVisitorFactory;
use RetailCrm\Interfaces\FactoryInterface;
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;
use JMS\Serializer\Expression\ExpressionEvaluator;

/**
 * Class SerializerFactory
 *
 * @category SerializerFactory
 * @package  RetailCrm\Factory
 */
class SerializerFactory implements FactoryInterface
{
    /**
     * @var \Psr\Container\ContainerInterface $container
     */
    private $container;

    /**
     * SerializerFactory constructor.
     *
     * @param \Psr\Container\ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param \Psr\Container\ContainerInterface $container
     *
     * @return \RetailCrm\Factory\SerializerFactory
     */
    public static function withContainer(ContainerInterface $container): FactoryInterface
    {
        return new self($container);
    }

    /**
     * @return \JMS\Serializer\Serializer
     */
    public function create(): Serializer
    {
        $container = $this->container;

        return SerializerBuilder::create()
            ->configureHandlers(function (HandlerRegistry $registry) use ($container) {
                $returnNull = function ($visitor, $obj, array $type) {
                    return null;
                };
                $returnSame = function ($visitor, $obj, array $type) {
                    return $obj;
                };
                $serializeJson = function ($visitor, $obj, array $type) use ($container) {
                    /** @var SerializerInterface $serializer */
                    $serializer = $container->get(Constants::SERIALIZER);
                    return $serializer->serialize($obj, 'json');
                };

                $registry->registerHandler(
                    GraphNavigatorInterface::DIRECTION_SERIALIZATION,
                    'RequestDtoInterface',
                    'json',
                    $serializeJson
                );
                $registry->registerHandler(
                    GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
                    'RequestDtoInterface',
                    'json',
                    $returnNull
                );
                $registry->registerHandler(
                    GraphNavigatorInterface::DIRECTION_SERIALIZATION,
                    'FileItemInterface',
                    'json',
                    $returnSame
                );
                $registry->registerHandler(
                    GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
                    'FileItemInterface',
                    'json',
                    $returnNull
                );
            })->addDefaultHandlers()
            ->configureListeners(function (EventDispatcher $dispatcher) {
                $dispatcher->addSubscriber(new TimezoneDeserializeSubscriber());
            })
            ->setSerializationVisitor('json', new JsonSerializationVisitorFactory())
            ->setDeserializationVisitor('json', new JsonDeserializationVisitorFactory())
            ->setSerializationContextFactory(new SerializationContextFactory())
            ->setExpressionEvaluator(new ExpressionEvaluator(new ExpressionLanguage()))
            ->build();
    }
}
