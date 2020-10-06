<?php
/**
 * PHP version 7.3
 *
 * @category AeopLogisticsServiceResultItem
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AeopLogisticsServiceResultItem
 *
 * @category AeopLogisticsServiceResultItem
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class AeopLogisticsServiceResultItem
{
    /**
     * @var int $recommendOrder
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("recommend_order")
     */
    public $recommendOrder;

    /**
     * @var string $trackingNoRegex
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("tracking_no_regex")
     */
    public $trackingNoRegex;

    /**
     * @var int $minProcessDay
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("min_process_day")
     */
    public $minProcessDay;

    /**
     * @var string $logisticsCompany
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("logistics_company")
     */
    public $logisticsCompany;

    /**
     * @var int $maxProcessDay
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("max_process_day")
     */
    public $maxProcessDay;

    /**
     * @var string $displayName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("display_name")
     */
    public $displayName;

    /**
     * @var string $service_name
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("service_name")
     */
    public $serviceName;
}
