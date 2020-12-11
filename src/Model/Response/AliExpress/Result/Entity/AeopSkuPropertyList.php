<?php
/**
 * PHP version 7.3
 *
 * @category AeopSkuPropertyList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AeopSkuPropertyList
 *
 * @category AeopSkuPropertyList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */
class AeopSkuPropertyList
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\Entity\AeopSkuProperty[] $aeopSkuProperty
     *
     * @JMS\Type("array<RetailCrm\Model\Response\AliExpress\Result\Entity\AeopSkuProperty>")
     * @JMS\SerializedName("aeop_sku_property")
     */
    public $aeopSkuProperty;
}
