<?php
/**
 * PHP version 7.3
 *
 * @category HttpDnsEnvEntry
 * @package  RetailCrm\Model\Response\Type
 */

namespace RetailCrm\Model\Response\Type;

use JMS\Serializer\Annotation as JMS;

/**
 * Class HttpDnsEnvEntry
 *
 * @category HttpDnsEnvEntry
 * @package  RetailCrm\Model\Response\Type
 */
class HttpDnsEnvEntry
{
    /**
     * @var array
     *
     * @JMS\Type("array<string>")
     * @JMS\SerializedName("vip")
     */
    public $vip;

    /**
     * @var string
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("proto")
     */
    public $proto;
}
