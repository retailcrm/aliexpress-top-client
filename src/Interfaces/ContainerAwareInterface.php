<?php

/**
 * PHP version 7.3
 *
 * @category ContainerAwareInterface
 * @package  RetailCrm\Interfaces
 */

namespace RetailCrm\Interfaces;

use Psr\Container\ContainerInterface;

/**
 * Interface ContainerAwareInterface
 *
 * @category ContainerAwareInterface
 * @package  RetailCrm\Interfaces
 */
interface ContainerAwareInterface
{
    /**
     * @param \Psr\Container\ContainerInterface $container
     *
     * @return mixed
     */
    public function setContainer(ContainerInterface $container);

    /**
     * @return \Psr\Container\ContainerInterface
     */
    public function getContainer(): ContainerInterface;
}
