<?php

/**
 * PHP version 7.3
 *
 * @category RequestTimestampProviderInterface
 * @package  RetailCrm\Interfaces
 */

namespace RetailCrm\Interfaces;

use RetailCrm\Model\Request\BaseRequest;

/**
 * Interface RequestTimestampProviderInterface
 *
 * @category RequestTimestampProviderInterface
 * @package  RetailCrm\Interfaces
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
