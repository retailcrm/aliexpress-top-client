<?php
/**
 * PHP version 7.3
 *
 * @category SolutionOrderGetResponse
 * @package  RetailCrm\Model\Response\AliExpress
 */

namespace RetailCrm\Model\Response\AliExpress;

use RetailCrm\Model\Response\BaseResponse;
use JMS\Serializer\Annotation as JMS;

/**
 * Class SolutionOrderGetResponse
 *
 * @category SolutionOrderGetResponse
 * @package  RetailCrm\Model\Response\AliExpress
 */
class SolutionOrderGetResponse extends BaseResponse
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Data\SolutionOrderGetResponseData $responseData
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Data\SolutionOrderGetResponseData")
     * @JMS\SerializedName("aliexpress_solution_order_get_response")
     */
    public $responseData;
}
