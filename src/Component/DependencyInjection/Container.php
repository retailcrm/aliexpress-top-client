<?php

/**
 * PHP version 7.3
 *
 * @category Container
 * @package  RetailCrm\Component\DependencyInjection
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Component\DependencyInjection;

use Closure;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use ReflectionClass;
use ReflectionException;
use RetailCrm\Component\DependencyInjection\Exception\ContainerException;
use RetailCrm\Component\DependencyInjection\Exception\NotFoundException;
use Throwable;

/**
 * Class Container
 * This implementation took an inspiration from devanych/di-container. It's almost the same, but for PHP 7.3.
 *
 * @category Container
 * @package  RetailCrm\Component\DependencyInjection
 * @author   Evgeniy Zyubin <mail@devanych.ru>
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
final class Container implements ContainerInterface
{
    /**
     * @var array $instances
     */
    private $instances = [];

    /**
     * @var array $definitions
     */
    private $definitions = [];

    /**
     * Container constructor.
     *
     * @param array $definitions
     */
    public function __construct(array $definitions = [])
    {
        $this->setGroup($definitions);
    }

    /**
     * Sets definition to the container.
     *
     * @param string $id
     * @param mixed  $definition
     */
    public function set(string $id, $definition): void
    {
        if ($this->instantiated($id)) {
            unset($this->instances[$id]);
        }

        $this->definitions[$id] = $definition;
    }

    /**
     * Sets group of definitions at once.
     *
     * @param array<string, mixed> $definitions
     */
    public function setGroup(array $definitions): void
    {
        foreach ($definitions as $id => $definition) {
            self::isString($id);
            $this->set($id, $definition);
        }
    }

    /**
     * Finds an entry of the container by its identifier and returns it.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @return mixed Entry.
     * @throws ContainerExceptionInterface Error while retrieving the entry.
     *
     * @throws NotFoundExceptionInterface  No entry was found for **this** identifier.
     */
    public function get($id)
    {
        self::isString($id);

        if ($this->instantiated($id)) {
            return $this->instances[$id];
        }

        $this->instances[$id] = $this->createInstance($id);

        return $this->instances[$id];
    }

    /**
     * Returns true if the container can return an entry for the given identifier.
     * Returns false otherwise.
     *
     * `has($id)` returning true does not mean that `get($id)` will not throw an exception.
     * It does however mean that `get($id)` will not throw a `NotFoundExceptionInterface`.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @return bool
     */
    public function has($id): bool
    {
        return (is_string($id) && array_key_exists($id, $this->definitions));
    }

    /**
     * Create instance by definition from the container by ID.
     *
     * @param  string $id
     * @return mixed
     * @throws NotFoundException
     * @throws ContainerException
     */
    private function createInstance(string $id)
    {
        if (!$this->has($id)) {
            if (self::isClassName($id)) {
                return $this->createObject($id);
            }

            throw new NotFoundException(sprintf('`%s` is not set in container and is not a class name.', $id));
        }

        if (self::isClassName($this->definitions[$id])) {
            return $this->createObject($this->definitions[$id]);
        }

        if ($this->definitions[$id] instanceof Closure) {
            return $this->definitions[$id]($this);
        }

        return $this->definitions[$id];
    }

    /**
     * Create object by class name.
     *
     * @param  string $className
     * @return object
     * @throws ContainerException If unable to create object.
     */
    private function createObject(string $className): object
    {
        try {
            $reflection = new ReflectionClass($className);
        } catch (ReflectionException $e) {
            throw new ContainerException(sprintf('Unable to create object `%s`.', $className), 0, $e);
        }

        if (in_array(FactoryInterface::class, $reflection->getInterfaceNames(), true)) {
            try {
                /*** @var FactoryInterface $factory */
                $factory = $this->getObjectFromReflection($reflection);
                return $factory->create($this);
            } catch (ContainerException $e) {
                throw $e;
            } catch (Throwable $e) {
                throw new ContainerException(sprintf('Unable to create object `%s`.', $className), 0, $e);
            }
        }

        return $this->getObjectFromReflection($reflection);
    }

    /**
     * Create object from reflection.
     *
     * If the object has dependencies in the constructor, it tries to create them too.
     *
     * @param  ReflectionClass $reflection
     * @return object
     * @throws ContainerException If unable to create object.
     */
    private function getObjectFromReflection(ReflectionClass $reflection): object
    {
        if (($constructor = $reflection->getConstructor()) === null) {
            return $reflection->newInstance();
        }

        $arguments = [];

        foreach ($constructor->getParameters() as $parameter) {
            if ($type = $parameter->getType()) {
                $typeName = $type->getName();

                if (!$type->isBuiltin() && ($this->has($typeName) || self::isClassName($typeName))) {
                    $arguments[] = $this->get($typeName);
                    continue;
                }

                if ($typeName === 'array' && $type->isBuiltin() && !$parameter->isDefaultValueAvailable()) {
                    $arguments[] = [];
                    continue;
                }
            }

            if ($parameter->isDefaultValueAvailable()) {
                try {
                    $arguments[] = $parameter->getDefaultValue();
                    continue;
                } catch (ReflectionException $e) {
                    throw new ContainerException(
                        sprintf(
                            'Unable to create object `%s`. Unable to get default value of constructor parameter: `%s`.',
                            $reflection->getName(),
                            $parameter->getName()
                        )
                    );
                }
            }

            throw new ContainerException(
                sprintf(
                    'Unable to create object `%s`. Unable to process a constructor parameter: `%s`.',
                    $reflection->getName(),
                    $parameter->getName()
                )
            );
        }

        return $reflection->newInstanceArgs($arguments);
    }

    /**
     * Returns true if definition was instantiated, false otherwise.
     *
     * @param string $id
     *
     * @return bool
     */
    private function instantiated(string $id): bool
    {
        return array_key_exists($id, $this->instances);
    }

    /**
     * Returns true if provided parameter is class name, false otherwise.
     *
     * @param mixed $className
     *
     * @return bool
     */
    private static function isClassName($className): bool
    {
        return (is_string($className) && class_exists($className));
    }

    /**
     * Validate provided ID
     *
     * @param  mixed $id
     * @throws NotFoundException
     */
    private static function isString($id): void
    {
        if (!is_string($id)) {
            throw new NotFoundException(sprintf('Invalid id. Expects string, `%s` provided.', gettype($id)));
        }
    }
}
