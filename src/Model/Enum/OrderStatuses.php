<?php
/**
 * PHP version 7.3
 *
 * @category OrderStatuses
 * @package  RetailCrm\Model\Enum
 */

namespace RetailCrm\Model\Enum;

/**
 * Class OrderStatuses
 *
 * @category OrderStatuses
 * @package  RetailCrm\Model\Enum
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
    public const PAYMENT_PROCESSING = 'PAYMENT_PROCESSING';

    // Order is involved in the dispute.
    public const IN_ISSUE = 'IN_ISSUE';

    // Order is frozen.
    public const IN_FROZEN = 'IN_FROZEN';

    // Waiting for payment amount confirmation from seller.
    public const WAIT_SELLER_EXAMINE_MONEY = 'WAIT_SELLER_EXAMINE_MONEY';

    // Payment was successful, but order is in risk control now.
    public const RISK_CONTROL = 'RISK_CONTROL';

    // Risk control resulted in hold, buyer should approve the payment.
    public const RISK_CONTROL_HOLD = 'RISK_CONTROL_HOLD';

    // Order is closed, no further actions needed.
    public const FINISH = 'FINISH';

    // Order is closed and now stored in the archive.
    public const ARCHIVE = 'ARCHIVE';

    // List of all order statuses.
    public const STATUSES_LIST = [
        self::PLACE_ORDER_SUCCESS,
        self::IN_CANCEL,
        self::WAIT_SELLER_SEND_GOODS,
        self::SELLER_PART_SEND_GOODS,
        self::WAIT_BUYER_ACCEPT_GOODS,
        self::PAYMENT_PROCESSING,
        self::IN_ISSUE,
        self::IN_FROZEN,
        self::WAIT_SELLER_EXAMINE_MONEY,
        self::RISK_CONTROL,
        self::RISK_CONTROL_HOLD,
        self::FINISH,
        self::ARCHIVE
    ];
}
