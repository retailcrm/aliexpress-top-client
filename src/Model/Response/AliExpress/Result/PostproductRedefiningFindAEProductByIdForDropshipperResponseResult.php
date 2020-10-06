<?php
/**
 * PHP version 7.3
 *
 * @category PostproductRedefiningFindAEProductByIdForDropshipperResponseResult
 * @package  RetailCrm\Model\Response\AliExpress\Result
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Result;

use JMS\Serializer\Annotation as JMS;
use RetailCrm\Model\Response\AliExpress\Result\Entity\AeopNationalQuoteConfiguration;
use RetailCrm\Model\Response\AliExpress\Result\Interfaces\ErrorInterface;
use RetailCrm\Model\Response\AliExpress\Result\Traits\ErrorTrait;

/**
 * Class PostproductRedefiningFindAEProductByIdForDropshipperResponseResult
 *
 * @category PostproductRedefiningFindAEProductByIdForDropshipperResponseResult
 * @package  RetailCrm\Model\Response\AliExpress\Result
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class PostproductRedefiningFindAEProductByIdForDropshipperResponseResult implements ErrorInterface
{
    use ErrorTrait;

    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\Entity\AeopAeProductSkuList $aeopAeProductSkus
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Result\Entity\AeopAeProductSkuList")
     * @JMS\SerializedName("aeop_ae_product_s_k_us")
     */
    public $aeopAeProductSkus;

    /**
     * @var string $detail
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("detail")
     */
    public $detail;

    /**
     * @var bool $isSuccess
     *
     * @JMS\Type("bool")
     * @JMS\SerializedName("is_success")
     */
    public $isSuccess;

    /**
     * @var int $productUnit
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("product_unit")
     */
    public $productUnit;

    /**
     * @var string $wsOfflineDate
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("ws_offline_date")
     */
    public $wsOfflineDate;

    /**
     * @var string $wsDisplay
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("ws_display")
     */
    public $wsDisplay;

    /**
     * @var int $categoryId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("category_id")
     */
    public $categoryId;

    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\Entity\AeopAeMultimedia $aeopAeMultimedia
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Result\Entity\AeopAeMultimedia")
     * @JMS\SerializedName("aeop_a_e_multimedia")
     */
    public $aeopAeMultimedia;

    /**
     * @var string $ownerMemberId
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("owner_member_id")
     */
    public $ownerMemberId;

    /**
     * @var string $productStatusType
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("product_status_type")
     */
    public $productStatusType;

    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\Entity\AeopAeProductPropertyList $aeopAeProductPropertys
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Result\Entity\AeopAeProductPropertyList")
     * @JMS\SerializedName("aeop_ae_product_propertys")
     */
    public $aeopAeProductPropertys;

    /**
     * @var string $grossWeight
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("gross_weight")
     */
    public $grossWeight;

    /**
     * @var int $deliveryTime
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("delivery_time")
     */
    public $deliveryTime;

    /**
     * @var int $wsValidNum
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("ws_valid_num")
     */
    public $wsValidNum;

    /**
     * @var string $gmtModified
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("gmt_modified")
     */
    public $gmtModified;

    /**
     * @var bool $packageType
     *
     * @JMS\Type("bool")
     * @JMS\SerializedName("package_type")
     */
    public $packageType;

    /**
     * @var AeopNationalQuoteConfiguration $aeopNationalQuoteConfiguration
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Result\Entity\AeopNationalQuoteConfiguration")
     * @JMS\SerializedName("aeop_national_quote_configuration")
     */
    public $aeopNationalQuoteConfiguration;

    /**
     * @var string $subject
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("subject")
     */
    public $subject;

    /**
     * @var int $baseUnit
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("base_unit")
     */
    public $baseUnit;

    /**
     * @var int $packageLength
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("package_length")
     */
    public $packageLength;

    /**
     * @var string $mobileDetail
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("mobile_detail")
     */
    public $mobileDetail;

    /**
     * @var int $packageHeight
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("package_height")
     */
    public $packageHeight;

    /**
     * @var int $packageWidth
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("package_width")
     */
    public $packageWidth;

    /**
     * @var string $currencyCode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("currency_code")
     */
    public $currencyCode;

    /**
     * @var string $gmtCreate
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("gmt_create")
     */
    public $gmtCreate;

    /**
     * @var string $imageURLs
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("image_u_r_ls")
     */
    public $imageURLs;

    /**
     * @var int $productId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("product_id")
     */
    public $productId;

    /**
     * @var string $productPrice
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("product_price")
     */
    public $productPrice;

    /**
     * @var string $itemOfferSiteSalePrice
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("item_offer_site_sale_price")
     */
    public $itemOfferSiteSalePrice;

    /**
     * @var int $totalAvailableStock
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("total_available_stock")
     */
    public $totalAvailableStock;

    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\Entity\AeopStoreInfo $storeInfo
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Result\Entity\AeopStoreInfo")
     * @JMS\SerializedName("store_info")
     */
    public $storeInfo;

    /**
     * @var int $evaluationCount
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("evaluation_count")
     */
    public $evaluationCount;

    /**
     * @var string $evaluationCount
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("avg_evaluation_rating")
     */
    public $avgEvaluationRating;

    /**
     * @var int $orderCount
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("order_count")
     */
    public $orderCount;
}
