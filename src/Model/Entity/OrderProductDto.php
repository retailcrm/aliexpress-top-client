<?php
/**
 * PHP version 7.3
 *
 * @category OrderProductDto
 * @package  RetailCrm\Model\Entity
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Entity;

use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Class OrderProductDto
 *
 * @category OrderProductDto
 * @package  RetailCrm\Model\Entity
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class OrderProductDto
{
    /**
     * @var \RetailCrm\Model\Entity\SimpleMoney $totalProductAmount
     *
     * @JMS\Type("RetailCrm\Model\Entity\SimpleMoney")
     * @JMS\SerializedName("total_product_amount")
     */
    public $totalProductAmount;

    /**
     * @var string $sonOrderStatus
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("son_order_status")
     */
    public $sonOrderStatus;

    /**
     * @var string $skuCode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sku_code")
     */
    public $skuCode;

    /**
     * @var string $showStatus
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("show_status")
     */
    public $showStatus;

    /**
     * @var DateTime $sendGoodsTime
     *
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\SerializedName("send_goods_time")
     */
    public $sendGoodsTime;

    /**
     * @var string $sendGoodsOperator
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("send_goods_operator")
     */
    public $sendGoodsOperator;

    /**
     * @var \RetailCrm\Model\Entity\SimpleMoney $productUnitPrice
     *
     * @JMS\Type("RetailCrm\Model\Entity\SimpleMoney")
     * @JMS\SerializedName("product_unit_price")
     */
    public $productUnitPrice;

    /**
     * @var string $productUnit
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("product_unit")
     */
    public $productUnit;

    /**
     * @var string $productStandard
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("product_standard")
     */
    public $productStandard;

    /**
     * @var string $productSnapUrl
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("product_snap_url")
     */
    public $productSnapUrl;

    /**
     * @var string $productName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("product_name")
     */
    public $productName;

    /**
     * @var string $productImgUrl
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("product_img_url")
     */
    public $productImgUrl;

    /**
     * @var int $productId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("product_id")
     */
    public $productId;

    /**
     * @var int $productCount
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("product_count")
     */
    public $productCount;

    /**
     * @var int $orderId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("order_id")
     */
    public $orderId;

    /**
     * @var bool $moneyBack3x
     *
     * @JMS\Type("bool")
     * @JMS\SerializedName("money_back3x")
     */
    public $moneyBack3x;

    /**
     * @var string $memo
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("memo")
     */
    public $memo;

    /**
     * @var string $logisticsType
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("logistics_type")
     */
    public $logisticsType;

    /**
     * @var string $logisticsServiceName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("logistics_service_name")
     */
    public $logisticsServiceName;

    /**
     * @var \RetailCrm\Model\Entity\SimpleMoney $logisticsAmount
     *
     * @JMS\Type("RetailCrm\Model\Entity\SimpleMoney")
     * @JMS\SerializedName("logistics_amount")
     */
    public $logisticsAmount;

    /**
     * @var string $issueStatus
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("issue_status")
     */
    public $issueStatus;

    /**
     * @var string $issueMode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("issue_mode")
     */
    public $issueMode;

    /**
     * @var int $goodsPrepareTime
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("goods_prepare_time")
     */
    public $goodsPrepareTime;

    /**
     * @var string $fundStatus
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("fund_status")
     */
    public $fundStatus;

    /**
     * @var string $freightCommitDay
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("freight_commit_day")
     */
    public $freightCommitDay;

    /**
     * @var string $escrowFeeRate
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("escrow_fee_rate")
     */
    public $escrowFeeRate;

    /**
     * @var string $deliveryTime
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("delivery_time")
     */
    public $deliveryTime;

    /**
     * @var int $childId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("child_id")
     */
    public $childId;

    /**
     * @var bool $canSubmitIssue
     *
     * @JMS\Type("bool")
     * @JMS\SerializedName("can_submit_issue")
     */
    public $canSubmitIssue;

    /**
     * @var string $buyerSignerLastName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("buyer_signer_last_name")
     */
    public $buyerSignerLastName;

    /**
     * @var string $buyerSignerFirstName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("buyer_signer_first_name")
     */
    public $buyerSignerFirstName;

    /**
     * @var string $affilateRateFee
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("afflicate_fee_rate")
     */
    public $afficateRateFee;
}
