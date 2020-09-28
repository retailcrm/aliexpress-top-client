<?php

/**
 * PHP version 7.3
 *
 * @category ContainerException
 * @package  RetailCrm\Component\DependencyInjection\Exception
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Component\DependencyInjection\Exception;

use Psr\Container\ContainerExceptionInterface;
use LogicException;

/**
 * Class ContainerException
 *
 * @category ContainerException
 * @package  RetailCrm\Component\DependencyInjection\Exception
 * @author   Evgeniy Zyubin <mail@devanych.ru>
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ContainerException extends LogicException implements ContainerExceptionInterface
{
}
