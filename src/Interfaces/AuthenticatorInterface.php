<?php

/**
 * PHP version 7.3
 *
 * @category AuthenticatorInterface
 * @package  RetailCrm\Interfaces
 */

namespace RetailCrm\Interfaces;

use RetailCrm\Model\Request\BaseRequest;

/**
 * Interface AuthenticatorInterface
 *
 * @category AuthenticatorInterface
 * @package  RetailCrm\Interfaces
 */
interface AuthenticatorInterface
{
    /**
     * Authenticate provided request
     *
     * @param \RetailCrm\Model\Request\BaseRequest $request
     */
    public function authenticate(BaseRequest $request): void;
}
