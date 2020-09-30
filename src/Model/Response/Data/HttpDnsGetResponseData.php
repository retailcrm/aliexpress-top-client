<?php

/**
 * PHP version 7.3
 *
 * @category HttpDnsGetResponseData
 * @package  RetailCrm\Model\Response\Data
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Model\Response\Data;

use JMS\Serializer\Annotation as JMS;
use RetailCrm\Model\Response\Body\InlineJsonBody\HttpDnsGetResponseResult;

/**
 * Class HttpDnsGetResponseData
 *
 * @category HttpDnsGetResponseData
 * @package  RetailCrm\Model\Response\Data
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class HttpDnsGetResponseData
{
    /**
     * @var HttpDnsGetResponseResult $result
     *
     * @JMS\Type("RetailCrm\Model\Response\Body\InlineJsonBody\HttpDnsGetResponseResult")
     * @JMS\SerializedName("result")
     */
    public $result;
}
