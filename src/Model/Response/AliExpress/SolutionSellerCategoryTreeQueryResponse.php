<?php
/**
 * PHP version 7.3
 *
 * @category SolutionSellerCategoryTreeQueryResponse
 * @package  RetailCrm\Model\Response\AliExpressSolution
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress;

use RetailCrm\Model\Response\BaseResponse;
use JMS\Serializer\Annotation as JMS;

/**
 * Class SolutionSellerCategoryTreeQueryResponse
 *
 * @category SolutionSellerCategoryTreeQueryResponse
 * @package  RetailCrm\Model\Response\AliExpressSolution
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
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
