<?php

/**
 * PHP version 7.3
 *
 * @category ContainerAwareTrait
 * @package  RetailCrm\Traits
 */

namespace RetailCrm\Traits;

use Psr\Container\ContainerInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Trait ContainerAwareTrait
 *
 * @category ContainerAwareTrait
 * @package  RetailCrm\Traits
 */
trait ContainerAwareTrait
{
    /**
     * @var ContainerInterface $container
     * @Assert\NotNull(message="Container should be provided")
     */
    protected $container;

    /**
     * @param \Psr\Container\ContainerInterface $container
     *
     * @return \RetailCrm\Traits\ContainerAwareTrait
     */
    public function setContainer(ContainerInterface $container): self
    {
        $this->container = $container;
        return $this;
    }

    /**
     * @return \Psr\Container\ContainerInterface
     */
    public function getContainer(): ContainerInterface
    {
        return $this->container;
    }
}
