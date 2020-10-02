<?php
/**
 * PHP version 7.3
 *
 * @category AbstractResponseData
 * @package  RetailCrm\Model\Response
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AbstractResponseData
 *
 * @category AbstractResponseData
 * @package  RetailCrm\Model\Response
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
abstract class AbstractResponseData
{
    /**
     * @var string $requestId
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("request_id")
     */
    public $requestId;
}
