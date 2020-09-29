<?php

/**
 * PHP version 7.3
 *
 * @category FileItemInterface
 * @package  RetailCrm\Interfaces
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Interfaces;

use Psr\Http\Message\StreamInterface;

/**
 * Interface FileItemInterface
 *
 * @category FileItemInterface
 * @package  RetailCrm\Interfaces
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
interface FileItemInterface
{
    /**
     * @return string
     */
    public function getFileName(): string;

    /**
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getStream(): StreamInterface;
}
