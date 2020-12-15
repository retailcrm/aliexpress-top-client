<?php

/**
 * PHP version 7.3
 *
 * @category BaseResponse
 * @package  RetailCrm\Model\Response
 */
namespace RetailCrm\Model\Response;

use JMS\Serializer\Annotation as JMS;

/**
 * Class BaseResponse
 *
 * @category BaseResponse
 * @package  RetailCrm\Model\Response
 */
abstract class BaseResponse implements TopResponseInterface
{
    /**
     * @var \RetailCrm\Model\Response\ErrorResponseBody
     *
     * @JMS\Type("RetailCrm\Model\Response\ErrorResponseBody")
     * @JMS\SerializedName("error_response")
     */
    public $errorResponse;

    /**
     * @var string $requestId
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("request_id")
     */
    public $requestId;
}
