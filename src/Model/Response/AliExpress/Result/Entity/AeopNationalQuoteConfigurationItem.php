<?php
/**
 * PHP version 7.3
 *
 * @category AeopNationalQuoteConfigurationItem
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AeopNationalQuoteConfigurationItem
 *
 * @category AeopNationalQuoteConfigurationItem
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
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
