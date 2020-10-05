<?php
/**
 * PHP version 7.3
 *
 * @category ErrorInterface
 * @package  RetailCrm\Model\Response\AliExpress\Result\Interfaces
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Interfaces;

/**
 * Interface ErrorInterface. Should be used with ErrorTrait.
 *
 * @category ErrorInterface
 * @package  RetailCrm\Model\Response\AliExpress\Result\Interfaces
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
interface ErrorInterface
{
    /**
     * @return ?string
     */
    public function getErrorCode(): ?string;

    /**
     * @return ?string
     */
    public function getErrorMessage(): ?string;
}
