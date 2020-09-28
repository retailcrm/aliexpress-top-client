<?php

/**
 * PHP version 7.3
 *
 * @category RequestFactoryInterface
 * @package  RetailCrm\Interfaces
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Interfaces;

use RetailCrm\Model\Request\BaseRequest;

/**
 * Interface RequestFactoryInterface
 *
 * @category RequestFactoryInterface
 * @package  RetailCrm\Interfaces
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
interface RequestFactoryInterface
{
    /**
     * @param \RetailCrm\Model\Request\BaseRequest   $request
     * @param \RetailCrm\Interfaces\AppDataInterface $appData
     *
     * @return mixed
     */
    public function fromModel(BaseRequest $request, AppDataInterface $appData);
}
