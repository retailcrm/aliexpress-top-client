<?php
/**
 * PHP version 7.3
 *
 * @category FeedOperationTypes
 * @package  RetailCrm\Model\Enum
 */

namespace RetailCrm\Model\Enum;

/**
 * Class FeedOperationTypes
 *
 * @category FeedOperationTypes
 * @package  RetailCrm\Model\Enum
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
