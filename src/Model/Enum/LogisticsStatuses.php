<?php
/**
 * PHP version 7.3
 *
 * @category LogisticsStatuses
 * @package  RetailCrm\Model\Enum
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Enum;

/**
 * Class LogisticsStatuses
 *
 * @category LogisticsStatuses
 * @package  RetailCrm\Model\Enum
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class LogisticsStatuses
{
    // Waiting for seller to ship
    public const WAIT_SELLER_SEND_GOODS = 'WAIT_SELLER_SEND_GOODS';

    // Partial delivery by seller
    public const SELLER_SEND_PART_GOODS = 'SELLER_SEND_PART_GOODS';

    // Seller sent goods.
    public const SELLER_SEND_GOODS = 'SELLER_SEND_GOODS';

    // Buyer has confirmed receipt
    public const BUYER_ACCEPT_GOODS = 'BUYER_ACCEPT_GOODS';

    // No logistics transfer
    public const NO_LOGISTICS = 'NO_LOGISTICS';

    // All logistics statuses
    public const LOGISTICS_STATUSES = [
        self::WAIT_SELLER_SEND_GOODS,
        self::SELLER_SEND_PART_GOODS,
        self::SELLER_SEND_GOODS,
        self::BUYER_ACCEPT_GOODS,
        self::NO_LOGISTICS
    ];
}
