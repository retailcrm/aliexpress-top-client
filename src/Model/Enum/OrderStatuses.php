<?php
/**
 * PHP version 7.3
 *
 * @category OrderStatuses
 * @package  RetailCrm\Model\Enum
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Enum;

/**
 * Class OrderStatuses
 *
 * @category OrderStatuses
 * @package  RetailCrm\Model\Enum
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class OrderStatuses
{
    // Waiting for payment from buyer.
    public const PLACE_ORDER_SUCCESS = 'PLACE_ORDER_SUCCESS';

    // Buyer requested cancellation.
    public const IN_CANCEL = 'IN_CANCEL';

    // Waiting for shipment from seller.
    public const WAIT_SELLER_SEND_GOODS = 'WAIT_SELLER_SEND_GOODS';

    // Partial delivery.
    public const SELLER_PART_SEND_GOODS = 'SELLER_PART_SEND_GOODS';

    // Waiting for buyer to receive goods.
    public const WAIT_BUYER_ACCEPT_GOODS = 'WAIT_BUYER_ACCEPT_GOODS';

    // Buyer accepted, funds is in processing.
    public const FUND_PROCESSING = 'FUND_PROCESSING';

    // Order is involved in the dispute.
    public const IN_ISSUE = 'IN_ISSUE';

    // Order is frozen.
    public const IN_FROZEN = 'IN_FROZEN';

    // Waiting for payment amount confirmation from seller.
    public const WAIT_SELLER_EXAMINE_MONEY = 'WAIT_SELLER_EXAMINE_MONEY';

    // Payment will be marked as completed in 24 hours.
    public const RISK_CONTROL = 'RISK_CONTROL';

    // Order is closed, no further actions needed.
    public const FINISH = 'FINISH';

    // List of all order statuses.
    public const STATUSES_LIST = [
        self::PLACE_ORDER_SUCCESS,
        self::IN_CANCEL,
        self::WAIT_SELLER_SEND_GOODS,
        self::SELLER_PART_SEND_GOODS,
        self::WAIT_BUYER_ACCEPT_GOODS,
        self::FUND_PROCESSING,
        self::IN_ISSUE,
        self::IN_FROZEN,
        self::WAIT_SELLER_EXAMINE_MONEY,
        self::RISK_CONTROL,
        self::FINISH
    ];
}
