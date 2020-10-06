<?php
/**
 * PHP version 7.3
 *
 * @category ProductBaseItem
 * @package  RetailCrm\Model\Request\AliExpress\Data
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Request\AliExpress\Data;

use JMS\Serializer\Annotation as JMS;

/**
 * Class ProductBaseItem
 *
 * @category ProductBaseItem
 * @package  RetailCrm\Model\Request\AliExpress\Data
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
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
