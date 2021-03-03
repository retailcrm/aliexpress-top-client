<?php
/**
 * PHP version 7.3
 *
 * @category ItemDisplayDto
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Class ItemDisplayDto
 *
 * @category ItemDisplayDto
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */
class ItemDisplayDto
{
    /**
     * @var DateTime $wsOfflineDate
     *
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\SerializedName("ws_offline_date")
     */
    public $wsOfflineDate;

    /**
     * @var DateTime $gmtModified
     *
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\SerializedName("gmt_modified")
     */
    public $gmtModified;

    /**
     * @var DateTime $gmtCreate
     *
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\SerializedName("gmt_create")
     */
    public $gmtCreate;

    /**
     * @var DateTime $couponStartDate
     *
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\SerializedName("coupon_start_date")
     */
    public $couponStartDate;

    /**
     * @var DateTime $couponEndDate
     *
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\SerializedName("coupon_end_date")
     */
    public $couponEndDate;

    /**
     * @var string $wsDisplay
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("ws_display")
     */
    public $wsDisplay;

    /**
     * @var string $subject
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("subject")
     */
    public $subject;

    /**
     * @var string $src
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("src")
     */
    public $src;

    /**
     * @var string $productMinPrice
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("product_min_price")
     */
    public $productMinPrice;

    /**
     * @var string $productMaxPrice
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("product_max_price")
     */
    public $productMaxPrice;

    /**
     * @var string $ownerMemberSeq
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("owner_member_seq")
     */
    public $ownerMemberSeq;

    /**
     * @var string $ownerMemberId
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("owner_member_id")
     */
    public $ownerMemberId;

    /**
     * @var string $imageUrls
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("image_u_r_ls")
     */
    public $imageUrls;

    /**
     * @var string $currencyCode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("currency_code")
     */
    public $currencyCode;

    /**
     * @var int $productId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("product_id")
     */
    public $productId;

    /**
     * @var int $groupId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("group")
     */
    public $groupId;

    /**
     * @var int $freightTemplateId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("freight_template_id")
     */
    public $freightTemplateId;
}
