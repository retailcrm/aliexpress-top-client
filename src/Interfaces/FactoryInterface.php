<?php

/**
 * PHP version 7.3
 *
 * @category FactoryInterface
 * @package  RetailCrm\Interfaces
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Interfaces;

/**
 * Interface FactoryInterface
 *
 * @category FactoryInterface
 * @package  RetailCrm\Interfaces
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
interface FactoryInterface
{
    /**
     * @return object
     */
    public function create();
}
