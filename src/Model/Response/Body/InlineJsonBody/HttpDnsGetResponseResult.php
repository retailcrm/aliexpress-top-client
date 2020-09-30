<?php

/**
 * PHP version 7.3
 *
 * @category HttpDnsGetResponseResult
 * @package  RetailCrm\Model\Response\Body\InlineJsonBody
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Model\Response\Body\InlineJsonBody;

use JMS\Serializer\Annotation as JMS;

/**
 * Class HttpDnsGetResponseResult
 *
 * @category HttpDnsGetResponseResult
 * @package  RetailCrm\Model\Response\Body\InlineJsonBody
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class HttpDnsGetResponseResult
{
    /**
     * @var array $env
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("env")
     */
    public $env;
}
