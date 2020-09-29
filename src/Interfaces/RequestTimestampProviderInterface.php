<?php

/**
 * PHP version 7.3
 *
 * @category RequestTimestampProviderInterface
 * @package  RetailCrm\Interfaces
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Interfaces;

use RetailCrm\Model\Request\BaseRequest;

/**
 * Interface RequestTimestampProviderInterface
 *
 * @category RequestTimestampProviderInterface
 * @package  RetailCrm\Interfaces
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
interface RequestTimestampProviderInterface
{
    /**
     * Sets current timestamp in GMT +8 timezone in the request
     *
     * @param \RetailCrm\Model\Request\BaseRequest $request
     *
     * @return void
     */
    public function provide(BaseRequest $request): void;
}
