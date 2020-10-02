<?php
/**
 * PHP version 7.4
 *
 * @category FeedOperationTypes
 * @package  RetailCrm\Model\Enum
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Enum;

/**
 * Class FeedOperationTypes
 *
 * @category FeedOperationTypes
 * @package  RetailCrm\Model\Enum
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class FeedOperationTypes
{
    public const PRODUCT_CREATE = 'PRODUCT_CREATE';
    public const PRODUCT_FULL_UPDATE = 'PRODUCT_FULL_UPDATE';
    public const PRODUCT_STOCKS_UPDATE = 'PRODUCT_STOCKS_UPDATE';
    public const PRODUCT_PRICES_UPDATE = 'PRODUCT_PRICES_UPDATE';
    public const ALLOWED_OPERATION_TYPES = [
        self::PRODUCT_CREATE,
        self::PRODUCT_FULL_UPDATE,
        self::PRODUCT_STOCKS_UPDATE,
        self::PRODUCT_PRICES_UPDATE
    ];
}
