<?php
/**
 * PHP version 7.3
 *
 * @category CategorySuitabilityList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class CategorySuitabilityList
 *
 * @category CategorySuitabilityList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */
class CategorySuitabilityList
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\CategorySuitabilityDto[] $json
     *
     * @JMS\Type("array<RetailCrm\Model\Response\AliExpress\Result\CategorySuitabilityDto>")
     * @JMS\SerializedName("json")
     * @JMS\Groups({"InlineJsonBody", "InlineJsonBodyNullIfInvalid"})
     */
    public $json;
}
