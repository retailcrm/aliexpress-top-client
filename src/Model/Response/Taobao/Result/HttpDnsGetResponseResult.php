<?php

/**
 * PHP version 7.3
 *
 * @category HttpDnsGetResponseResult
 * @package  RetailCrm\Model\Response\Taobao\Result
 */
namespace RetailCrm\Model\Response\Taobao\Result;

use JMS\Serializer\Annotation as JMS;

/**
 * Class HttpDnsGetResponseResult
 *
 * @category HttpDnsGetResponseResult
 * @package  RetailCrm\Model\Response\Taobao\Result
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
