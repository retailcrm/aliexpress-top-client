<?php
/**
 * PHP version 7.3
 *
 * @category AeopAeProductSku
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AeopAeProductSku
 *
 * @category AeopAeProductSku
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class AeopAeProductSku
{
    /**
     * @var bool $skuStock
     *
     * @JMS\Type("bool")
     * @JMS\SerializedName("sku_stock")
     */
    public $skuStock;

    /**
     * @var string $skuPrice
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sku_price")
     */
    public $skuPrice;

    /**
     * @var string $skuCode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sku_code")
     */
    public $skuCode;

    /**
     * @var int $ipmSkuStock
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("ipm_sku_stock")
     */
    public $ipmSkuStock;

    /**
     * @var string $id
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("id")
     */
    public $id;

    /**
     * @var string $currencyCode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("currency_code")
     */
    public $currencyCode;

    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\Entity\AeopSkuPropertyList $aeopSkuPropertys
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Result\Entity\AeopSkuPropertyList")
     * @JMS\SerializedName("aeop_s_k_u_propertys")
     */
    public $aeopSkuPropertys;

    /**
     * @var string $barcode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("barcode")
     */
    public $barcode;

    /**
     * @var string $offerSalePrice
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("offer_sale_price")
     */
    public $offerSalePrice;

    /**
     * @var string $offerBulkSalePrice
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("offer_bulk_sale_price")
     */
    public $offerBulkSalePrice;

    /**
     * @var int $skuBulkOrder
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("sku_bulk_order")
     */
    public $skuBulkOrder;

    /**
     * @var int $skuAvailableStock
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("s_k_u_available_stock")
     */
    public $skuAvailableStock;
}
