<?php

/**
 * PHP version 7.3
 *
 * @category ParametrizedFactoryInterface
 * @package  RetailCrm\Interfaces
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Interfaces;

/**
 * Interface ParametrizedFactoryInterface
 *
 * @category ParametrizedFactoryInterface
 * @package  RetailCrm\Interfaces
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
interface ParametrizedFactoryInterface
{
    /**
     * @param mixed $params
     *
     * @return object
     */
    public function create($params);
}
