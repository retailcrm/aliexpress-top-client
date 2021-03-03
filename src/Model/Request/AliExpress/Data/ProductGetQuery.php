<?php
/**
 * PHP version 7.3
 *
 * @category ProductGetQuery
 * @package  RetailCrm\Model\Request\AliExpress\Data
 */

namespace RetailCrm\Model\Request\AliExpress\Data;

use DateTime;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;
use RetailCrm\Component\Validator\Constraints as TopAssert;

/**
 * Class ProductGetQuery
 *
 * @category ProductGetQuery
 * @package  RetailCrm\Model\Request\AliExpress\Data
 */
class ProductGetQuery
{
    /**
     * @var DateTime $gmtCreateEnd
     *
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\SerializedName("gmt_create_end")
     * @TopAssert\Timezone("PST")
     */
    public $gmtCreateEnd;

    /**
     * @var DateTime $gmtCreateStart
     *
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\SerializedName("gmt_create_start")
     * @TopAssert\Timezone("PST")
     */
    public $gmtCreateStart;

    /**
     * @var DateTime $gmtModifiedStart
     *
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\SerializedName("gmt_modified_start")
     * @TopAssert\Timezone("PST")
     */
    public $modifiedDateStart;

    /**
     * @var int $pageSize
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("page_size")
     * @Assert\GreaterThan(0)
     */
    public $pageSize;

    /**
     * @var DateTime $gmtModifiedEnd
     *
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\SerializedName("gmt_modified_end")
     * @TopAssert\Timezone("PST")
     */
    public $gmtModifiedEnd;

    /**
     * @var int $currentPage
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("current_page")
     * @Assert\GreaterThan(0)
     */
    public $currentPage;

    /**
     * @var string $skuCode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sku_code")
     */
    public $skuCode;

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
     * @JMS\SerializedName("group_id")
     */
    public $groupId;

    /**
     * @var string $productStatusType
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("product_status_type")
     * @Assert\Choice({"onSelling", "offline", "auditing", "editingRequired"})
     * @Assert\NotBlank()
     */
    public $productStatusType;

    /**
     * @var string $subject
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("subject")
     */

    public $subject;
    /**
     * @var string $wsDisplay
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("ws_display")
     */

    public $wsDisplay;
    /**
     * @var string $haveNationalQuote
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("have_national_quote")
     */

    public $haveNationalQuote;
    /**
     * @var string $ownerMemberId
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("owner_member_id")
     */
    public $ownerMemberId;

    /**
     * @var int $offlineTime
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("off_line_time")
     */
    public $offlineTime;

    /**
     * @var int[] $exceptedProductIds
     *
     * @JMS\Type("array<int>")
     * @JMS\SerializedName("excepted_product_ids")
     */
    public $exceptedProductIds;
}
