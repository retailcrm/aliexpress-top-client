<?php
/**
 * PHP version 7.3
 *
 * @category AeopLogisticsServiceResultItemList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AeopLogisticsServiceResultItemList
 *
 * @category AeopLogisticsServiceResultItemList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
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
