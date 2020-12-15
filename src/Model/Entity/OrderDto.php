<?php
/**
 * PHP version 7.3
 *
 * @category OrderDto
 * @package  RetailCrm\Model\Entity
 */

namespace RetailCrm\Model\Entity;

use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Class OrderDto
 *
 * @category OrderDto
 * @package  RetailCrm\Model\Entity
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class OrderDto
{
    /**
     * @var int $timeoutLeftTime
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("timeout_left_time")
     */
    public $timeoutLeftTime;

    /**
     * @var string $sellerSignerFullName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("seller_signer_fullname")
     */
    public $sellerSignerFullName;

    /**
     * @var string $sellerOperatorLoginId
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("seller_operator_login_id")
     */
    public $sellerOperatorLoginId;

    /**
     * @var string $sellerLoginId
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("seller_login_id")
     */
    public $sellerLoginId;

    /**
     * @var \RetailCrm\Model\Entity\OrderProductDtoList $productList
     *
     * @JMS\Type("RetailCrm\Model\Entity\OrderProductDtoList")
     * @JMS\SerializedName("product_list")
     */
    public $productList;

    /**
     * @var bool $phone
     *
     * @JMS\Type("bool")
     * @JMS\SerializedName("phone")
     */
    public $phone;

    /**
     * @var string $paymentType
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("payment_type")
     */
    public $paymentType;

    /**
     * @var \RetailCrm\Model\Entity\SimpleMoney $payAmount
     *
     * @JMS\Type("RetailCrm\Model\Entity\SimpleMoney")
     * @JMS\SerializedName("pay_amount")
     */
    public $payAmount;

    /**
     * @var string $orderStatus
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("order_status")
     */
    public $orderStatus;

    /**
     * @var int $orderId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("order_id")
     */
    public $orderId;

    /**
     * @var string $orderDetailUrl
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("order_detail_url")
     */
    public $orderDetailUrl;

    /**
     * @var string $logisticsStatus
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("logistics_status")
     */
    public $logisticsStatus;

    /**
     * @var string $logisticsEscrowFeeRate
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("logisitcs_escrow_fee_rate")
     */
    public $logisticsEscrowFeeRate;

    /**
     * @var \RetailCrm\Model\Entity\SimpleMoney $loanAmount
     *
     * @JMS\Type("RetailCrm\Model\Entity\SimpleMoney")
     * @JMS\SerializedName("loan_amount")
     */
    public $loanAmount;

    /**
     * @var string $leftSendGoodsMin
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("left_send_good_min")
     */
    public $leftSendGoodsMin;

    /**
     * @var string $leftSendGoodsHour
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("left_send_good_hour")
     */
    public $leftSendGoodsHour;

    /**
     * @var string $leftSendGoodsDay
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("left_send_good_day")
     */
    public $leftSendGoodsDay;

    /**
     * @var string $issueStatus
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("issue_status")
     */
    public $issueStatus;

    /**
     * @var bool $hasRequestLoan
     *
     * @JMS\Type("bool")
     * @JMS\SerializedName("has_request_loan")
     */
    public $hasRequestLoan;

    /**
     * @var DateTime $gmtUpdate
     *
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\SerializedName("gmt_update")
     */
    public $gmtUpdate;

    /**
     * @var DateTime $gmtSendGoodsTime
     *
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\SerializedName("gmt_send_goods_time")
     */
    public $gmtSendGoodsTime;

    /**
     * @var DateTime $gmtPayTime
     *
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\SerializedName("gmt_pay_time")
     */
    public $gmtPayTime;

    /**
     * @var DateTime $gmtCreate
     *
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\SerializedName("gmt_create")
     */
    public $gmtCreate;

    /**
     * @var string $fundStatus
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("fund_status")
     */
    public $fundStatus;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("frozen_status")
     */
    public $frozenStatus;

    /**
     * @var int $escrowFeeRate
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("escrow_fee_rate")
     */
    public $escrowFeeRate;

    /**
     * @var \RetailCrm\Model\Entity\SimpleMoney $escrowFee
     *
     * @JMS\Type("RetailCrm\Model\Entity\SimpleMoney")
     * @JMS\SerializedName("escrow_fee")
     */
    public $escrowFee;

    /**
     * @var string $endReason
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("end_reason")
     */
    public $endReason;

    /**
     * @var string $buyerSignerFullName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("buyer_signer_fullname")
     */
    public $buyerSignerFullName;

    /**
     * @var string $buyerLoginId
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("buyer_login_id")
     */
    public $buyerLoginId;

    /**
     * @var string $bizType
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("biz_type")
     */
    public $bizType;

    /**
     * @var string $offlinePickupType
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("offline_pickup_type")
     */
    public $offlinePickupType;
}
