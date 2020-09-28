<?php

/**
 * PHP version 7.3
 *
 * @category RequestSignerInterface
 * @package  RetailCrm\Interfaces
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
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
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
interface RequestSignerInterface
{
    /**
     * Signs provided request.
     *
     * @param \RetailCrm\Model\Request\BaseRequest         $request
     * @param \RetailCrm\Interfaces\AuthenticatorInterface $authenticator
     */
    public function sign(BaseRequest $request, AuthenticatorInterface $authenticator): void;
}
