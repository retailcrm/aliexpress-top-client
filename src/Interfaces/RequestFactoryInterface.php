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

use Psr\Http\Message\RequestInterface;
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
     * @param string                                       $endpoint
     * @param \RetailCrm\Model\Request\BaseRequest         $request
     * @param \RetailCrm\Interfaces\AppDataInterface       $appData
     * @param \RetailCrm\Interfaces\AuthenticatorInterface $authenticator
     *
     * @return RequestInterface
     */
    public function fromModel(
        string $endpoint,
        BaseRequest $request,
        AppDataInterface $appData,
        AuthenticatorInterface $authenticator
    ): RequestInterface;
}
