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
     * Generate sign for provided request data.
     *
     * @param array                                  $request
     * @param \RetailCrm\Interfaces\AppDataInterface $appData
     * @param string                                 $signMethod
     *
     * @return string
     * @throws \RetailCrm\Component\Exception\NotImplementedException
     */
    public function generateSign(array $request, AppDataInterface $appData, string $signMethod): string;
}
