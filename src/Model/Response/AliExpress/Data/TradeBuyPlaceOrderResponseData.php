<?php
/**
 * PHP version 7.3
 *
 * @category TradeBuyPlaceOrderResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Data;

use JMS\Serializer\Annotation as JMS;

/**
 * Class TradeBuyPlaceOrderResponseData
 *
 * @category TradeBuyPlaceOrderResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
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
