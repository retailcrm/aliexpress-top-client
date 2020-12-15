<?php
/**
 * PHP version 7.3
 *
 * @category AeopAeProductPropertyList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AeopAeProductPropertyList
 *
 * @category AeopAeProductPropertyList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */
class AeopAeProductPropertyList
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\Entity\AeopAeProductProperty[] $aeopAeProductProperty
     *
     * @JMS\Type("array<RetailCrm\Model\Response\AliExpress\Result\Entity\AeopAeProductProperty>")
     * @JMS\SerializedName("aeop_ae_product_property")
     */
    public $aeopAeProductProperty;
}
