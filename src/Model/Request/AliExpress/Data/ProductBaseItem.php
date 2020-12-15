<?php
/**
 * PHP version 7.3
 *
 * @category ProductBaseItem
 * @package  RetailCrm\Model\Request\AliExpress\Data
 */

namespace RetailCrm\Model\Request\AliExpress\Data;

use JMS\Serializer\Annotation as JMS;

/**
 * Class ProductBaseItem
 *
 * @category ProductBaseItem
 * @package  RetailCrm\Model\Request\AliExpress\Data
 */
class ProductBaseItem
{
    /**
     * @var int $productCount
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("product_count")
     */
    public $productCount;

    /**
     * @var int $productId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("product_id")
     */
    public $productId;

    /**
     * @var string $skuAttr
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sku_attr")
     */
    public $skuAttr;

    /**
     * @var string $logisticsServiceName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("logistics_service_name")
     */
    public $logisticsServiceName;

    /**
     * @var string $orderMemo
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("order_memo")
     */
    public $orderMemo;
}
