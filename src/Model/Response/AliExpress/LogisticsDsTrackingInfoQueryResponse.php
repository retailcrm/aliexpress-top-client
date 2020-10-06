<?php
/**
 * PHP version 7.3
 *
 * @category LogisticsDsTrackingInfoQueryResponse
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
 * Class LogisticsDsTrackingInfoQueryResponse
 *
 * @category LogisticsDsTrackingInfoQueryResponse
 * @package  RetailCrm\Model\Response\AliExpress
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class LogisticsDsTrackingInfoQueryResponse extends BaseResponse
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Data\LogisticsDsTrackingInfoQueryResponseData $responseData
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Data\LogisticsDsTrackingInfoQueryResponseData")
     * @JMS\SerializedName("aliexpress_logistics_ds_trackinginfo_query_response")
     */
    public $responseData;
}
