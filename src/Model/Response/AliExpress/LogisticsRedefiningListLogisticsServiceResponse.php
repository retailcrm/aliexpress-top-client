<?php
/**
 * PHP version 7.3
 *
 * @category LogisticsRedefiningListLogisticsServiceResponse
 * @package  RetailCrm\Model\Response\AliExpress
 */

namespace RetailCrm\Model\Response\AliExpress;

use RetailCrm\Model\Response\BaseResponse;
use JMS\Serializer\Annotation as JMS;

/**
 * Class LogisticsRedefiningListLogisticsServiceResponse
 *
 * @category LogisticsRedefiningListLogisticsServiceResponse
 * @package  RetailCrm\Model\Response\AliExpress
 */
class LogisticsRedefiningListLogisticsServiceResponse extends BaseResponse
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Data\LogisticsRedefiningListLogisticsServiceResponseData $responseData
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Data\LogisticsRedefiningListLogisticsServiceResponseData")
     * @JMS\SerializedName("aliexpress_logistics_redefining_listlogisticsservice_response")
     */
    public $responseData;
}
