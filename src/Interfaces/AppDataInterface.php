<?php

/**
 * PHP version 7.3
 *
 * @category AppDataInterface
 * @package  RetailCrm\Interfaces
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Interfaces;

/**
 * Interface AppDataInterface
 *
 * @category AppDataInterface
 * @package  RetailCrm\Interfaces
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
interface AppDataInterface
{
    /**
     * @return string
     */
    public function getServiceUrl(): string;

    /**
     * @return string
     */
    public function getAppKey(): string;

    /**
     * @return string
     */
    public function getAppSecret(): string;
}
