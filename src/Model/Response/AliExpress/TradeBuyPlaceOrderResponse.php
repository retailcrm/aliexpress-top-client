<?php
/**
 * PHP version 7.3
 *
 * @category TradeBuyPlaceOrderResponse
 * @package  RetailCrm\Model\Response\AliExpress
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress;

use RetailCrm\Model\Response\BaseResponse;
use JMS\Serializer\Annotation as JMS;

/**
 * Class TradeBuyPlaceOrderResponse
 *
 * @category TradeBuyPlaceOrderResponse
 * @package  RetailCrm\Model\Response\AliExpress
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
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
