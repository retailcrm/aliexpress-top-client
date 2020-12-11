<?php
/**
 * PHP version 7.3
 *
 * @category AeopNationalQuoteConfiguration
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AeopNationalQuoteConfiguration
 *
 * @category AeopNationalQuoteConfiguration
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */
class AeopNationalQuoteConfiguration
{
    /**
     * @var string $configurationType
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("configuration_type")
     */
    public $configurationType;

    /**
     * @var AeopNationalQuoteConfigurationItem[] $configurationData
     *
     * @JMS\Type("array<RetailCrm\Model\Response\AliExpress\Result\Entity\AeopNationalQuoteConfigurationItem>")
     * @JMS\SerializedName("configuration_data")
     * @JMS\Groups({"InlineJsonBody", "InlineJsonBodyNullIfInvalid"})
     */
    public $configurationData;
}
