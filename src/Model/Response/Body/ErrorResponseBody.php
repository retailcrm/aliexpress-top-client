<?php

/**
 * PHP version 7.3
 *
 * @category ErrorResponseBody
 * @package  RetailCrm\Model\Response\Body
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Model\Response\Body;

use JMS\Serializer\Annotation as JMS;

/**
 * Class ErrorResponseBody
 *
 * @category ErrorResponseBody
 * @package  RetailCrm\Model\Response\Body
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ErrorResponseBody
{
    /**
     * @var int $code
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("code")
     */
    public $code;

    /**
     * @var string $msg
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("msg")
     */
    public $msg;

    /**
     * @var string $subCode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sub_code")
     */
    public $subCode;

    /**
     * @var string $requestId
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("request_id")
     */
    public $requestId;
}
