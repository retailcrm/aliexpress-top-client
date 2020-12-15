<?php
/**
 * PHP version 7.3
 *
 * @category SingleOrderQuery
 * @package  RetailCrm\Model\Request\AliExpress\Data
 */

namespace RetailCrm\Model\Request\AliExpress\Data;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SingleOrderQuery
 *
 * @category SingleOrderQuery
 * @package  RetailCrm\Model\Request\AliExpress\Data
 */
class SingleOrderQuery
{
    /**
     * @var int $orderId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("order_id")
     */
    public $orderId;
}
