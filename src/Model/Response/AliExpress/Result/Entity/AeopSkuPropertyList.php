<?php
/**
 * PHP version 7.3
 *
 * @category AeopSkuPropertyList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AeopSkuPropertyList
 *
 * @category AeopSkuPropertyList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class AeopSkuPropertyList
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\Entity\AeopSkuProperty[] $aeopSkuProperty
     *
     * @JMS\Type("array<RetailCrm\Model\Response\AliExpress\Result\Entity\AeopSkuProperty>")
     * @JMS\SerializedName("aeop_sku_property")
     */
    public $aeopSkuProperty;
}
