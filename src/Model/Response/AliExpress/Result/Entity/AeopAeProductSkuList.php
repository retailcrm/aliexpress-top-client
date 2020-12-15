<?php
/**
 * PHP version 7.3
 *
 * @category AeopAeProductSkuList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AeopAeProductSkuList
 *
 * @category AeopAeProductSkuList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */
class AeopAeProductSkuList
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\Entity\AeopAeProductSku[] $aeopAeProductSku
     *
     * @JMS\Type("array<RetailCrm\Model\Response\AliExpress\Result\Entity\AeopAeProductSku>")
     * @JMS\SerializedName("aeop_ae_product_sku")
     */
    public $aeopAeProductSku;
}
