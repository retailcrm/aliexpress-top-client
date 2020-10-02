<?php
/**
 * PHP version 7.4
 *
 * @category CategorySuitabilityList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class CategorySuitabilityList
 *
 * @category CategorySuitabilityList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
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
