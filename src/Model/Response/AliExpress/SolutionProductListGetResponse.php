<?php
/**
 * PHP version 7.3
 *
 * @category SolutionProductListGetResponse
 * @package  RetailCrm\Model\Response\AliExpress
 */

namespace RetailCrm\Model\Response\AliExpress;

use RetailCrm\Model\Response\BaseResponse;
use JMS\Serializer\Annotation as JMS;

/**
 * Class SolutionProductListGetResponse
 *
 * @category SolutionProductListGetResponse
 * @package  RetailCrm\Model\Response\AliExpress
 */
class SolutionProductListGetResponse extends BaseResponse
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Data\SolutionProductListGetResponseData $responseData
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Data\SolutionProductListGetResponseData")
     * @JMS\SerializedName("aliexpress_solution_product_list_get_response")
     */
    public $responseData;
}
