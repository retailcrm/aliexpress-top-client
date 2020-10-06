<?php
/**
 * PHP version 7.3
 *
 * @category AeopAeProductProperty
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AeopAeProductProperty
 *
 * @category AeopAeProductProperty
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class AeopAeProductProperty
{
    /**
     * @var string $attrValueUnit
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("attr_value_unit")
     */
    public $attrValueUnit;

    /**
     * @var string $attrValueStart
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("attr_value_start")
     */
    public $attrValueStart;

    /**
     * @var int $attrValueId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("attr_value_id")
     */
    public $attrValueId;

    /**
     * @var int $attrValueId
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("attr_value_end")
     */
    public $attrValueEnd;

    /**
     * @var int $attrValue
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("attr_value")
     */
    public $attrValue;

    /**
     * @var int $attrNameId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("attr_name_id")
     */
    public $attrNameId;

    /**
     * @var string $attrName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("attr_name")
     */
    public $attrName;
}
