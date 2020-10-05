<?php
/**
 * PHP version 7.3
 *
 * @category FundsStatuses
 * @package  RetailCrm\Model\Enum
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Enum;

/**
 * Class FundsStatuses
 *
 * @category FundsStatuses
 * @package  RetailCrm\Model\Enum
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class FundsStatuses
{
    public const NOT_PAY = 'NOT_PAY';
    public const PAY_SUCCESS = 'PAY_SUCCESS';
    public const WAIT_SELLER_CHECK = 'WAIT_SELLER_CHECK';
    public const FUNDS_STATUSES = [self::NOT_PAY, self::PAY_SUCCESS, self::WAIT_SELLER_CHECK];
}
