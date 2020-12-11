<?php
/**
 * PHP version 7.3
 *
 * @category TradeBuyPlaceOrderResponse
 * @package  RetailCrm\Model\Response\AliExpress
 */

namespace RetailCrm\Model\Response\AliExpress;

use RetailCrm\Model\Response\BaseResponse;
use JMS\Serializer\Annotation as JMS;

/**
 * Class TradeBuyPlaceOrderResponse
 *
 * @category TradeBuyPlaceOrderResponse
 * @package  RetailCrm\Model\Response\AliExpress
 */
class TradeBuyPlaceOrderResponse extends BaseResponse
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Data\TradeBuyPlaceOrderResponseData $responseData
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Data\TradeBuyPlaceOrderResponseData")
     * @JMS\SerializedName("aliexpress_trade_buy_placeorder_response")
     */
    public $responseData;
}
