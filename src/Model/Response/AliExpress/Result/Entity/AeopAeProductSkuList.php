<?php
/**
 * PHP version 7.3
 *
 * @category AeopAeProductSkuList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AeopAeProductSkuList
 *
 * @category AeopAeProductSkuList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class AeopAeProductSkuList
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\Entity\AeopAeProductSku[] $aeopAeProductSku
     *
     * @JMS\Type("array<RetailCrm\Model\Response\AliExpress\Result\Entity\AeopAeProductSku>")
     * @JMS\SerializedName("aeop_ae_product_sku")
     */
    public $aeopAeProductSku;
}
