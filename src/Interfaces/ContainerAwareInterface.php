<?php

/**
 * PHP version 7.3
 *
 * @category ContainerAwareInterface
 * @package  RetailCrm\Interfaces
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Interfaces;

use Psr\Container\ContainerInterface;

/**
 * Interface ContainerAwareInterface
 *
 * @category ContainerAwareInterface
 * @package  RetailCrm\Interfaces
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
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
