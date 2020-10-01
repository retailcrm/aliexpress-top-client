<?php
/**
 * PHP version 7.4
 *
 * @category SellerCategoryTreeQueryResponse
 * @package  RetailCrm\Model\Response\AliExpressSolution
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpressSolution;

use RetailCrm\Model\Response\BaseResponse;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SellerCategoryTreeQueryResponse
 *
 * @category SellerCategoryTreeQueryResponse
 * @package  RetailCrm\Model\Response\AliExpressSolution
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class SellerCategoryTreeQueryResponse extends BaseResponse
{
    /**
     * @var \RetailCrm\Model\Response\AliExpressSolution\Data\SellerCategoryTreeQueryResponseData $responseData
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpressSolution\Data\SellerCategoryTreeQueryResponseData")
     * @JMS\SerializedName("aliexpress_solution_seller_category_tree_query_response")
     */
    public $responseData;
}
