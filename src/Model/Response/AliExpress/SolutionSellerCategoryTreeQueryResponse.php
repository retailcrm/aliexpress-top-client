<?php
/**
 * PHP version 7.3
 *
 * @category SolutionSellerCategoryTreeQueryResponse
 * @package  RetailCrm\Model\Response\AliExpressSolution
 */

namespace RetailCrm\Model\Response\AliExpress;

use RetailCrm\Model\Response\BaseResponse;
use JMS\Serializer\Annotation as JMS;

/**
 * Class SolutionSellerCategoryTreeQueryResponse
 *
 * @category SolutionSellerCategoryTreeQueryResponse
 * @package  RetailCrm\Model\Response\AliExpressSolution
 */
class SolutionSellerCategoryTreeQueryResponse extends BaseResponse
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Data\SolutionSellerCategoryTreeQueryResponseData $responseData
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Data\SolutionSellerCategoryTreeQueryResponseData")
     * @JMS\SerializedName("aliexpress_solution_seller_category_tree_query_response")
     */
    public $responseData;
}
