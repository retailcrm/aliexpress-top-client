<?php
/**
 * PHP version 7.3
 *
 * @category SolutionBatchProductInventoryUpdateResponse
 * @package  RetailCrm\Model\Response\AliExpress
 */

namespace RetailCrm\Model\Response\AliExpress;

use RetailCrm\Model\Response\BaseResponse;
use JMS\Serializer\Annotation as JMS;

/**
 * Class SolutionBatchProductInventoryUpdateResponse
 *
 * @category SolutionBatchProductInventoryUpdateResponse
 * @package  RetailCrm\Model\Response\AliExpress
 */
class SolutionBatchProductInventoryUpdateResponse extends BaseResponse
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Data\SolutionBatchProductInventoryUpdateResponseData $responseData
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Data\SolutionBatchProductInventoryUpdateResponseData")
     * @JMS\SerializedName("aliexpress_solution_batch_product_inventory_update_response")
     */
    public $responseData;
}
