<?php
/**
 * PHP version 7.3
 *
 * @category MultipleProductUpdateListQuery
 * @package  RetailCrm\Model\Request\AliExpress\Data
 */

namespace RetailCrm\Model\Request\AliExpress\Data;

use JMS\Serializer\Annotation as JMS;

/**
 * Class MultipleProductUpdateListQuery
 *
 * @category MultipleProductUpdateListQuery
 * @package  RetailCrm\Model\Request\AliExpress\Data
 */
class MultipleProductUpdateListQuery
{
    /**
     * @var int $productId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("product_id")
     */
    public $productId;

    /**
     * @var \RetailCrm\Model\Request\AliExpress\Data\SkuPricesUpdateItemDto[] $multipleSkuUpdateList
     *
     * @JMS\Type("array<RetailCrm\Model\Request\AliExpress\Data\SkuPricesUpdateItemDto>")
     * @JMS\SerializedName("multiple_sku_update_list")
     */
    public $multipleSkuUpdateList;
}
