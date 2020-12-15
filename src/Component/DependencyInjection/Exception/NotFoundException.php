<?php

/**
 * PHP version 7.3
 *
 * @category NotFoundException
 * @package  RetailCrm\Component\DependencyInjection\Exception
 */
namespace RetailCrm\Component\DependencyInjection\Exception;

use Psr\Container\NotFoundExceptionInterface;
use InvalidArgumentException;

/**
 * Class NotFoundException
 *
 * @category NotFoundException
 * @package  RetailCrm\Component\DependencyInjection\Exception
 * @author   Evgeniy Zyubin <mail@devanych.ru>
 */
class NotFoundException extends InvalidArgumentException implements NotFoundExceptionInterface
{
}
