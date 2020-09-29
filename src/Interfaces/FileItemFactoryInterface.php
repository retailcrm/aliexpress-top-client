<?php

/**
 * PHP version 7.3
 *
 * @category FactoryInterface
 * @package  RetailCrm\Interfaces
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Interfaces;

/**
 * Interface FileItemFactoryInterface
 *
 * @category FileItemFactoryInterface
 * @package  RetailCrm\Interfaces
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
interface FileItemFactoryInterface
{
    /**
     * @param string $fileName Name without path
     * @param string $contents
     *
     * @return FileItemInterface
     */
    public function fromString(string $fileName, string $contents): FileItemInterface;

    /**
     * @param string $fileName Name with or without path
     *
     * @return FileItemInterface
     */
    public function fromFile(string $fileName): FileItemInterface;
}
