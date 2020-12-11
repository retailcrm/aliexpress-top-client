<?php
/**
 * PHP version 7.3
 *
 * @category SolutionOrderFulfillResponse
 * @package  RetailCrm\Model\Response\AliExpress
 */

namespace RetailCrm\Model\Response\AliExpress;

use RetailCrm\Model\Response\AliExpress\Data\SolutionOrderFulfillResponseData;
use RetailCrm\Model\Response\BaseResponse;
use JMS\Serializer\Annotation as JMS;

/**
 * Class SolutionOrderFulfillResponse
 *
 * @category SolutionOrderFulfillResponse
 * @package  RetailCrm\Model\Response\AliExpress
 */
class SolutionOrderFulfillResponse extends BaseResponse
{
    /**
     * @var SolutionOrderFulfillResponseData $responseData
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Data\SolutionOrderFulfillResponseData")
     * @JMS\SerializedName("aliexpress_solution_order_fulfill_response")
     */
    public $responseData;
}
