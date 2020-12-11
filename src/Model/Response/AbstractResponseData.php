<?php
/**
 * PHP version 7.3
 *
 * @category AbstractResponseData
 * @package  RetailCrm\Model\Response
 */

namespace RetailCrm\Model\Response;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AbstractResponseData
 *
 * @category AbstractResponseData
 * @package  RetailCrm\Model\Response
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
