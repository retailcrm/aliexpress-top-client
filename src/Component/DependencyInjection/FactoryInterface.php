<?php

/**
 * PHP version 7.3
 *
 * @category FactoryInterface
 * @package  RetailCrm\Component\DependencyInjection
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Component\DependencyInjection;

use Psr\Container\ContainerInterface;

/**
 * Interface FactoryInterface
 *
 * @category FactoryInterface
 * @package  RetailCrm\Component\DependencyInjection
 * @author   Evgeniy Zyubin <mail@devanych.ru>
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
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
