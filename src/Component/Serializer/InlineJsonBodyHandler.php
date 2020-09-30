<?php

/**
 * PHP version 7.3
 *
 * @category InlineJsonBodyHandler
 * @package  RetailCrm\Component\Serializer
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Component\Serializer;

use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\Metadata\PropertyMetadata;
use JMS\Serializer\Metadata\StaticPropertyMetadata;
use JMS\Serializer\Visitor\DeserializationVisitorInterface;
use JMS\Serializer\Visitor\SerializationVisitorInterface;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use ReflectionClass;

/**
 * Class InlineJsonBodyHandler
 *
 * @category InlineJsonBodyHandler
 * @package  RetailCrm\Component\Serializer
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 * @todo Doesn't work as expected.
 */
class InlineJsonBodyHandler implements SubscribingHandlerInterface
{
    /**
     * @param \JMS\Serializer\Visitor\SerializationVisitorInterface $visitor
     * @param mixed                                                 $item
     * @param array                                                 $type
     * @param \JMS\Serializer\Context                               $context
     *
     * @return false|string
     * @throws \JsonException
     * @throws \ReflectionException
     */
    public function serialize(SerializationVisitorInterface $visitor, $item, array $type, Context $context)
    {
        $typeName = $type['name'];
        $classMetadata = $context->getMetadataFactory()->getMetadataForClass($typeName);
        $reflection = new ReflectionClass($type['name']);

        $visitor->startVisitingObject($classMetadata, $item, ['name' => $typeName]);

        foreach ($reflection->getProperties() as $property) {
            if ($property->isStatic()) {
                continue;
            }

            if (!$property->isPublic()) {
                $property->setAccessible(true);
            }

            $value = $property->getValue($item);
            $metadata = new StaticPropertyMetadata($type['name'], $property->getName(), $value);

            $visitor->visitProperty($metadata, $value);
        }

        return json_encode(
            $visitor->endVisitingObject($classMetadata, $item, ['name' => $typeName]),
            JSON_THROW_ON_ERROR
        );
    }

    /**
     * @param \JMS\Serializer\Visitor\DeserializationVisitorInterface $visitor
     * @param string                                                  $json
     * @param array                                                   $type
     * @param \JMS\Serializer\Context                                 $context
     *
     * @return object
     * @throws \JsonException
     * @throws \ReflectionException
     */
    public function deserialize(DeserializationVisitorInterface $visitor, $json, array $type, Context $context)
    {
        $typeName = $type['name'];
        $instance = new $type['name'];
        $classMetadata = $context->getMetadataFactory()->getMetadataForClass($typeName);
        $reflection = new ReflectionClass($type['name']);
        $jsonData = json_decode($json, true, 512, JSON_THROW_ON_ERROR);

        $visitor->startVisitingObject($classMetadata, $instance, ['name' => $typeName]);

        foreach ($reflection->getProperties() as $property) {
            if ($property->isStatic()) {
                continue;
            }

            if (!$property->isPublic()) {
                $property->setAccessible(true);
            }

            $metadata = new PropertyMetadata($type['name'], $property->getName());
            $property->setValue($instance, $visitor->visitProperty($metadata, $jsonData));
        }

        $result = $visitor->endVisitingObject($classMetadata, $instance, ['name' => $typeName]);

        return $visitor->getResult($result);
    }

    /**
     * @return array
     */
    public static function getSubscribingMethods()
    {
        $methods = [];

        foreach (self::getInlineJsonBodyModels() as $type) {
            $methods[] = [
                'direction' => GraphNavigatorInterface::DIRECTION_SERIALIZATION,
                'format' => 'json',
                'type' => $type,
                'method' => 'serialize',
            ];
            $methods[] = [
                'direction' => GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => $type,
                'method' => 'deserialize',
            ];
            $methods[] = [
                'direction' => GraphNavigatorInterface::DIRECTION_SERIALIZATION,
                'format' => 'xml',
                'type' => $type,
                'method' => 'serialize',
            ];
            $methods[] = [
                'direction' => GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
                'format' => 'xml',
                'type' => $type,
                'method' => 'deserialize',
            ];
        }

        return $methods;
    }

    /**
     * @return array
     * @todo That's horrifying. Maybe find better solution?
     */
    private static function getInlineJsonBodyModels(): array
    {
        $items = [];
        $rootDir = realpath(dirname(__DIR__) . '/..');
        $directory = new RecursiveDirectoryIterator(
            __DIR__ . '/../../Model/Response/Body/InlineJsonBody',
            RecursiveDirectoryIterator::SKIP_DOTS
        );
        $fileIterator = new RecursiveIteratorIterator($directory, RecursiveIteratorIterator::LEAVES_ONLY);

        /** @var \SplFileObject $file */
        foreach ($fileIterator as $file) {
            if ('php' !== $file->getExtension()) {
                continue;
            }

            $items[] = self::pathToClasspath($rootDir, $file->getPath(), $file->getFilename());
        }

        return $items;
    }

    /**
     * @param string $root
     * @param string $path
     * @param string $fileName
     *
     * @return string
     */
    private static function pathToClasspath(string $root, string $path, string $fileName): string
    {
        return 'RetailCrm\\' .
            str_replace(
                DIRECTORY_SEPARATOR,
                '\\',
                str_replace(
                    $root . DIRECTORY_SEPARATOR,
                    '',
                    realpath($path)
                )
            ) . '\\' . trim(substr($fileName, 0, -4));
    }
}
