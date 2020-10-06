<?php
/**
 * PHP version 7.3
 *
 * @category AeopAeProductPropertyList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AeopAeProductPropertyList
 *
 * @category AeopAeProductPropertyList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
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
