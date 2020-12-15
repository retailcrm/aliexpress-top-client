<?php
/**
 * PHP version 7.3
 *
 * @category SkuPricesUpdateItemDto
 * @package  RetailCrm\Model\Request\AliExpress\Data
 */

namespace RetailCrm\Model\Request\AliExpress\Data;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SkuPricesUpdateItemDto
 *
 * @category SkuPricesUpdateItemDto
 * @package  RetailCrm\Model\Request\AliExpress\Data
 */
class SkuPricesUpdateItemDto
{
    /**
     * @var string $skuCode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sku_code")
     */
    public $skuCode;

    /**
     * @var float $price
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("price")
     */
    public $price;

    /**
     * @var float $discountPrice
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("discount_price")
     */
    public $discountPrice;
}
