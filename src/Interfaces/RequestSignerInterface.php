<?php

/**
 * PHP version 7.3
 *
 * @category RequestSignerInterface
 * @package  RetailCrm\Interfaces
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Interfaces;

use RetailCrm\Model\Request\BaseRequest;

/**
 * Interface RequestSignerInterface
 *
 * @category RequestSignerInterface
 * @package  RetailCrm\Interfaces
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
interface RequestSignerInterface
{
    /**
     * Signs provided request.
     *
     * @param \RetailCrm\Model\Request\BaseRequest   $request
     * @param \RetailCrm\Interfaces\AppDataInterface $appData
     */
    public function sign(BaseRequest $request, AppDataInterface $appData): void;
}
