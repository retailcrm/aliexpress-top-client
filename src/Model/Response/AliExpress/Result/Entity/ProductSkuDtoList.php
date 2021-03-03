<?php
/**
 * PHP version 7.3
 *
 * @category ProductSkuDtoList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class ProductSkuDtoList
 *
 * @category ProductSkuDtoList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */
class ProductSkuDtoList
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\Entity\ProductSkuDto[] $globalAeopAEProductSku
     *
     * @JMS\Type("array<RetailCrm\Model\Response\AliExpress\Result\Entity\ProductSkuDto>")
     * @JMS\SerializedName("global_aeop_ae_product_sku")
     */
    public $globalAeopAEProductSku;
}
