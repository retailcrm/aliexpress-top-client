<?php
/**
 * PHP version 7.3
 *
 * @category FundsStatuses
 * @package  RetailCrm\Model\Enum
 */

namespace RetailCrm\Model\Enum;

/**
 * Class FundsStatuses
 *
 * @category FundsStatuses
 * @package  RetailCrm\Model\Enum
 */
class FundsStatuses
{
    public const NOT_PAY = 'NOT_PAY';
    public const PAY_SUCCESS = 'PAY_SUCCESS';
    public const WAIT_SELLER_CHECK = 'WAIT_SELLER_CHECK';
    public const FUNDS_STATUSES = [self::NOT_PAY, self::PAY_SUCCESS, self::WAIT_SELLER_CHECK];
}
