<?php
/**
 * PHP version 7.3
 *
 * @category SolutionProductInfoGetResponse
 * @package  RetailCrm\Model\Response\AliExpress
 */

namespace RetailCrm\Model\Response\AliExpress;

use RetailCrm\Model\Response\BaseResponse;
use JMS\Serializer\Annotation as JMS;

/**
 * Class SolutionProductInfoGetResponse
 *
 * @category SolutionProductInfoGetResponse
 * @package  RetailCrm\Model\Response\AliExpress
 */
class SolutionProductInfoGetResponse extends BaseResponse
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Data\SolutionProductInfoGetResponseData $responseData
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Data\SolutionProductInfoGetResponseData")
     * @JMS\SerializedName("aliexpress_solution_product_info_get_response")
     */
    public $responseData;
}
