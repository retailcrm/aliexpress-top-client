<?php
/**
 * PHP version 7.3
 *
 * @category SolutionBatchProductPriceUpdateResponse
 * @package  RetailCrm\Model\Response\AliExpress
 */

namespace RetailCrm\Model\Response\AliExpress;

use RetailCrm\Model\Response\BaseResponse;
use JMS\Serializer\Annotation as JMS;

/**
 * Class SolutionBatchProductPriceUpdateResponse
 *
 * @category SolutionBatchProductPriceUpdateResponse
 * @package  RetailCrm\Model\Response\AliExpress
 */
class SolutionBatchProductPriceUpdateResponse extends BaseResponse
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Data\SolutionBatchProductPriceUpdateResponseData $responseData
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Data\SolutionBatchProductPriceUpdateResponseData")
     * @JMS\SerializedName("aliexpress_solution_batch_product_price_update_response")
     */
    public $responseData;
}
