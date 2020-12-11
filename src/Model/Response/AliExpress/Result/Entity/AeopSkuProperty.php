<?php
/**
 * PHP version 7.3
 *
 * @category AeopSkuProperty
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AeopSkuProperty
 *
 * @category AeopSkuProperty
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */
class AeopSkuProperty
{
    /**
     * @var int $skuPropertyId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("sku_property_id")
     */
    public $skuPropertyId;

    /**
     * @var string $skuImage
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sku_image")
     */
    public $skuImage;

    /**
     * @var int $propertyValueIdLong
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("property_value_id_long")
     */
    public $propertyValueIdLong;

    /**
     * @var string $propertyValueDefinitionName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("property_value_definition_name")
     */
    public $propertyValueDefinitionName;

    /**
     * @var string $skuPropertyValue
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sku_property_value")
     */
    public $skuPropertyValue;

    /**
     * @var string $skuPropertyName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sku_property_name")
     */
    public $skuPropertyName;
}
