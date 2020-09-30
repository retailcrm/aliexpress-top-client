<?php

/**
 * PHP version 7.3
 *
 * @category HttpDnsGetResponse
 * @package  RetailCrm\Model\Response
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Model\Response;

use JMS\Serializer\Annotation as JMS;

/**
 * Class HttpDnsGetResponse
 *
 * @category HttpDnsGetResponse
 * @package  RetailCrm\Model\Response
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class HttpDnsGetResponse extends BaseResponse
{
    /**
     * @var \RetailCrm\Model\Response\Data\HttpDnsGetResponseData $responseData
     *
     * @JMS\Type("RetailCrm\Model\Response\Data\HttpDnsGetResponseData")
     * @JMS\SerializedName("httpdns_get_response")
     */
    public $responseData;
}
