<?php

/**
 * PHP version 7.3
 *
 * @category HttpDnsGetResponseResult
 * @package  RetailCrm\Model\Response\Taobao\Result
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Model\Response\Taobao\Result;

use JMS\Serializer\Annotation as JMS;

/**
 * Class HttpDnsGetResponseResult
 *
 * @category HttpDnsGetResponseResult
 * @package  RetailCrm\Model\Response\Taobao\Result
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class HttpDnsGetResponseResult
{
    /**
     * @var array<string, \RetailCrm\Model\Response\Type\HttpDnsEnvEntry> $env
     *
     * @JMS\Type("array<string,array<string, RetailCrm\Model\Response\Type\HttpDnsEnvEntry>>")
     * @JMS\SerializedName("env")
     */
    public $env;
}
