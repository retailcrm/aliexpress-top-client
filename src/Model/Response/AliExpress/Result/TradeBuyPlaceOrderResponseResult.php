<?php
/**
 * PHP version 7.3
 *
 * @category TradeBuyPlaceOrderResponseResult
 * @package  RetailCrm\Model\Response\AliExpress\Result
 */

namespace RetailCrm\Model\Response\AliExpress\Result;

use JMS\Serializer\Annotation as JMS;

/**
 * Class TradeBuyPlaceOrderResponseResult
 *
 * @category TradeBuyPlaceOrderResponseResult
 * @package  RetailCrm\Model\Response\AliExpress\Result
 */
class TradeBuyPlaceOrderResponseResult
{
    /**
     * @var string $errorCode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("error_code")
     */
    public $errorCode;

    /**
     * @var string $errorMsg
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("error_msg")
     */
    public $errorMsg;

    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\Entity\NumbersList $orderList
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Result\Entity\NumbersList")
     * @JMS\SerializedName("order_list")
     */
    public $orderList;

    /**
     * @var bool $isSuccess
     *
     * @JMS\Type("bool")
     * @JMS\SerializedName("is_success")
     */
    public $isSuccess;
}
