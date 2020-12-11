<?php
/**
 * PHP version 7.3
 *
 * @category SkuStocksUpdateItemDto
 * @package  RetailCrm\Model\Request\AliExpress\Data
 */

namespace RetailCrm\Model\Request\AliExpress\Data;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SkuStocksUpdateItemDto
 *
 * @category SkuStocksUpdateItemDto
 * @package  RetailCrm\Model\Request\AliExpress\Data
 */
class SkuStocksUpdateItemDto
{
    /**
     * @var string $skuCode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sku_code")
     */
    public $skuCode;

    /**
     * @var int $inventory
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("inventory")
     */
    public $inventory;
}
