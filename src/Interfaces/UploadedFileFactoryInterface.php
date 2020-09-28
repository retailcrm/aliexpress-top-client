<?php

/**
 * PHP version 7.3
 *
 * @category UploadedFileFactoryInterface
 * @package  RetailCrm\Interfaces
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Interfaces;

use Psr\Http\Message\UploadedFileInterface;

/**
 * Interface UploadedFileFactoryInterface
 *
 * @category UploadedFileFactoryInterface
 * @package  RetailCrm\Interfaces
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
interface UploadedFileFactoryInterface
{
    /**
     * @param string $fileName
     *
     * @return \Psr\Http\Message\UploadedFileInterface
     */
    public function create(string $fileName): UploadedFileInterface;
}
