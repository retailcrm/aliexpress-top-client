<?php
/**
 * PHP version 7.3
 *
 * @category TradeBuyPlaceOrder
 * @package  RetailCrm\Model\Request\AliExpress
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Request\AliExpress;

use JMS\Serializer\Annotation as JMS;
use RetailCrm\Model\Request\BaseRequest;
use RetailCrm\Model\Response\AliExpress\TradeBuyPlaceOrderResponse;
use RetailCrm\Model\Request\AliExpress\Data\PlaceOrderRequest4OpenApiDto;

/**
 * Class TradeBuyPlaceOrder
 *
 * @category TradeBuyPlaceOrder
 * @package  RetailCrm\Model\Request\AliExpress
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 * @SuppressWarnings(PHPMD.LongVariable)
 */
class TradeBuyPlaceOrder extends BaseRequest
{
    /**
     * @var PlaceOrderRequest4OpenApiDto $paramPlaceOrderRequest4OpenApiDTO
     *
     * @JMS\Type("RetailCrm\Model\Request\AliExpress\Data\PlaceOrderRequest4OpenApiDto")
     * @JMS\SerializedName("param_place_order_request4_open_api_d_t_o")
     */
    public $paramPlaceOrderRequest4OpenApiDTO;

    /**
     * @inheritDoc
     */
    public function getMethod(): string
    {
        return 'aliexpress.trade.buy.placeorder';
    }

    /**
     * @inheritDoc
     */
    public function getExpectedResponse(): string
    {
        return TradeBuyPlaceOrderResponse::class;
    }
}
