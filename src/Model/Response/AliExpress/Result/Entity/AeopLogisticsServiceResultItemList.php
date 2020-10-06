<?php
/**
 * PHP version 7.3
 *
 * @category AeopLogisticsServiceResultItemList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AeopLogisticsServiceResultItemList
 *
 * @category AeopLogisticsServiceResultItemList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class AeopLogisticsServiceResultItemList
{
    /**
     * phpcs:ignore
     * @var \RetailCrm\Model\Response\AliExpress\Result\Entity\AeopLogisticsServiceResultItem[] $aeopLogisticsServiceResult phpcs:ignore
     *
     * @JMS\Type("array<RetailCrm\Model\Response\AliExpress\Result\Entity\AeopLogisticsServiceResultItem>")
     * @JMS\SerializedName("aeop_logistics_service_result")
     */
    public $aeopLogisticsServiceResult;
}
