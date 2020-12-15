<?php
/**
 * PHP version 7.3
 *
 * @category SolutionMerchantProfileGetResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 */

namespace RetailCrm\Model\Response\AliExpress\Data;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SolutionMerchantProfileGetResponseData
 *
 * @category SolutionMerchantProfileGetResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 */
class SolutionMerchantProfileGetResponseData
{
    /**
     * @var string $countryCode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("country_code")
     */
    public $countryCode;

    /**
     * @var bool $productPostingForbidden
     *
     * @JMS\Type("bool")
     * @JMS\SerializedName("product_posting_forbidden")
     */
    public $productPostingForbidden;

    /**
     * @var string $merchantLoginId
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("merchant_login_id")
     */
    public $merchantLoginId;

    /**
     * @var int $shopId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("shop_id")
     */
    public $shopId;

    /**
     * @var string $shopName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("shop_name")
     */
    public $shopName;

    /**
     * @var string $shopType
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("shop_type")
     */
    public $shopType;

    /**
     * @var string $shopUrl
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("shop_url")
     */
    public $shopUrl;
}
