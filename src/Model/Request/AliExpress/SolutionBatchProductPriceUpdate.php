<?php
/**
 * PHP version 7.3
 *
 * @category SolutionBatchProductPriceUpdate
 * @package  RetailCrm\Model\Request\AliExpress
 */

namespace RetailCrm\Model\Request\AliExpress;

use JMS\Serializer\Annotation as JMS;
use RetailCrm\Model\Request\BaseRequest;
use RetailCrm\Model\Response\AliExpress\SolutionBatchProductPriceUpdateResponse;

/**
 * Class SolutionBatchProductPriceUpdate
 *
 * @category SolutionBatchProductPriceUpdate
 * @package  RetailCrm\Model\Request\AliExpress
 */
class SolutionBatchProductPriceUpdate extends BaseRequest
{
    /**
     * @see https://developers.aliexpress.com/en/doc.htm?docId=45140&docType=2&ocId=45140
     *
     * @var \RetailCrm\Model\Request\AliExpress\Data\MultipleProductUpdateListQuery $mutipleProductUpdateList
     *
     * @JMS\Type("RetailCrm\Model\Request\AliExpress\Data\MultipleProductUpdateListQuery")
     * @JMS\SerializedName("mutiple_product_update_list")
     */
    public $mutipleProductUpdateList;

    /**
     * @inheritDoc
     */
    public function getMethod(): string
    {
        return 'aliexpress.solution.batch.product.price.update';
    }

    /**
     * @inheritDoc
     */
    public function getExpectedResponse(): string
    {
        return SolutionBatchProductPriceUpdateResponse::class;
    }
}
