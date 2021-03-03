<?php
/**
 * PHP version 7.3
 *
 * @category SolutionProductListGet
 * @package  RetailCrm\Model\Request\AliExpress
 */

namespace RetailCrm\Model\Request\AliExpress;

use JMS\Serializer\Annotation as JMS;
use RetailCrm\Model\Request\BaseRequest;
use RetailCrm\Model\Response\AliExpress\SolutionProductListGetResponse;

/**
 * Class SolutionProductListGet
 *
 * @category SolutionProductListGet
 * @package  RetailCrm\Model\Request\AliExpress
 */
class SolutionProductListGet extends BaseRequest
{
    /**
     * @see https://developers.aliexpress.com/en/doc.htm?docId=42384&docType=2
     *
     * @var \RetailCrm\Model\Request\AliExpress\Data\ProductGetQuery $aeopAEProductListQuery
     *
     * @JMS\Type("RetailCrm\Model\Request\AliExpress\Data\ProductGetQuery")
     * @JMS\SerializedName("aeop_a_e_product_list_query")
     */
    public $aeopAEProductListQuery;

    /**
     * @inheritDoc
     */
    public function getMethod(): string
    {
        return 'aliexpress.solution.product.list.get';
    }

    /**
     * @inheritDoc
     */
    public function getExpectedResponse(): string
    {
        return SolutionProductListGetResponse::class;
    }
}
