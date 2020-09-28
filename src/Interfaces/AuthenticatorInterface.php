<?php

/**
 * PHP version 7.3
 *
 * @category AuthenticatorInterface
 * @package  RetailCrm\Interfaces
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Interfaces;

use RetailCrm\Model\Request\BaseRequest;

/**
 * Interface AuthenticatorInterface
 *
 * @category AuthenticatorInterface
 * @package  RetailCrm\Interfaces
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
interface AuthenticatorInterface
{
    /**
     * @param \RetailCrm\Model\Request\BaseRequest $request
     */
    public function authenticate(BaseRequest $request): void;

    /**
     * @return string
     */
    public function getAppKey(): string;

    /**
     * @return string
     */
    public function getAppSecret(): string;
}
