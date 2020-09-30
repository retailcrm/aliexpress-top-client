<?php

/**
 * PHP version 7.3
 *
 * @category TopRequestProcessorInterface
 * @package  RetailCrm\Interfaces
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Interfaces;

use Psr\Http\Message\RequestInterface;
use RetailCrm\Model\Request\BaseRequest;

/**
 * Interface TopRequestProcessorInterface
 *
 * @category TopRequestProcessorInterface
 * @package  RetailCrm\Interfaces
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
interface TopRequestProcessorInterface
{
    /**
     * Modifies request in order to prepare it for TOP API (timestamp, signature, etc).
     *
     * @param \RetailCrm\Model\Request\BaseRequest         $request
     * @param \RetailCrm\Interfaces\AppDataInterface       $appData
     *
     * @return void
     * @throws \RetailCrm\Component\Exception\FactoryException
     * @throws \RetailCrm\Component\Exception\ValidationException
     */
    public function process(
        BaseRequest $request,
        AppDataInterface $appData
    ): void;
}
