<?php
/**
 * PHP version 7.3
 *
 * @category ProductSkuDto
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class ProductSkuDto
 *
 * @category ProductSkuDto
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */
class ProductSkuDto
{
    /**
     * @var string $skuCode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sku_code")
     */
    public $skuCode;
}
