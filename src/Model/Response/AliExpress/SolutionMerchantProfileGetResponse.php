<?php
/**
 * PHP version 7.3
 *
 * @category SolutionMerchantProfileGetResponse
 * @package  RetailCrm\Model\Response\AliExpress
 */

namespace RetailCrm\Model\Response\AliExpress;

use RetailCrm\Model\Response\BaseResponse;
use JMS\Serializer\Annotation as JMS;

/**
 * Class SolutionMerchantProfileGetResponse
 *
 * @category SolutionMerchantProfileGetResponse
 * @package  RetailCrm\Model\Response\AliExpress
 */
class SolutionMerchantProfileGetResponse extends BaseResponse
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Data\SolutionMerchantProfileGetResponseData $responseData
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Data\SolutionMerchantProfileGetResponseData")
     * @JMS\SerializedName("aliexpress_solution_merchant_profile_get_response")
     */
    public $responseData;
}
