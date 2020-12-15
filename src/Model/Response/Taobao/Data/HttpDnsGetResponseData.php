<?php

/**
 * PHP version 7.3
 *
 * @category HttpDnsGetResponseData
 * @package  RetailCrm\Model\Response\Taobao\Data
 */
namespace RetailCrm\Model\Response\Taobao\Data;

use JMS\Serializer\Annotation as JMS;
use RetailCrm\Model\Response\AbstractResponseData;
use RetailCrm\Model\Response\Taobao\Result\HttpDnsGetResponseResult;

/**
 * Class HttpDnsGetResponseData
 *
 * @category HttpDnsGetResponseData
 * @package  RetailCrm\Model\Response\Taobao\Data
 */
class HttpDnsGetResponseData extends AbstractResponseData
{
    /**
     * @var HttpDnsGetResponseResult $result
     *
     * @JMS\Type("RetailCrm\Model\Response\Taobao\Result\HttpDnsGetResponseResult")
     * @JMS\SerializedName("result")
     * @JMS\Groups(groups={"InlineJsonBody"})
     */
    public $result;
}
