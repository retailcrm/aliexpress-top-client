<?php
/**
 * PHP version 7.3
 *
 * @category TradeBuyPlaceOrderResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 */

namespace RetailCrm\Model\Response\AliExpress\Data;

use JMS\Serializer\Annotation as JMS;

/**
 * Class TradeBuyPlaceOrderResponseData
 *
 * @category TradeBuyPlaceOrderResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 */
class TradeBuyPlaceOrderResponseData
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\TradeBuyPlaceOrderResponseResult $result
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Result\TradeBuyPlaceOrderResponseResult")
     * @JMS\SerializedName("result")
     */
    public $result;
}
