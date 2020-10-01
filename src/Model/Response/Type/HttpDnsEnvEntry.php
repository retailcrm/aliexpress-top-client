<?php
/**
 * PHP version 7.4
 *
 * @category HttpDnsEnvEntry
 * @package  RetailCrm\Model\Response\Type
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\Type;

use JMS\Serializer\Annotation as JMS;

/**
 * Class HttpDnsEnvEntry
 *
 * @category HttpDnsEnvEntry
 * @package  RetailCrm\Model\Response\Type
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
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
