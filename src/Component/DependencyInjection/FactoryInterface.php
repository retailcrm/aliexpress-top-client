<?php

/**
 * PHP version 7.3
 *
 * @category FactoryInterface
 * @package  RetailCrm\Component\DependencyInjection
 */
namespace RetailCrm\Component\DependencyInjection;

use Psr\Container\ContainerInterface;

/**
 * Interface FactoryInterface
 *
 * @category FactoryInterface
 * @package  RetailCrm\Component\DependencyInjection
 * @author   Evgeniy Zyubin <mail@devanych.ru>
 */
interface FactoryInterface
{
    /**
     * @param \Psr\Container\ContainerInterface $container
     *
     * @return object
     */
    public function create(ContainerInterface $container): object;
}
