<?php
/**
 * PHP version 7.3
 *
 * @category AeopNationalQuoteConfigurationItem
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AeopNationalQuoteConfigurationItem
 *
 * @category AeopNationalQuoteConfigurationItem
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */
class AeopNationalQuoteConfigurationItem
{
    /**
     * @var string $shipToCountry
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("shiptoCountry")
     */
    public $shipToCountry;

    /**
     * @var string $percentage
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("percentage")
     */
    public $percentage;
}
