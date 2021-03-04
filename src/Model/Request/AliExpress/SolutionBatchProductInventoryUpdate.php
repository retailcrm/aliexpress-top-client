<?php
/**
 * PHP version 7.3
 *
 * @category SolutionBatchProductInventoryUpdate
 * @package  RetailCrm\Model\Request\AliExpress
 */

namespace RetailCrm\Model\Request\AliExpress;

use JMS\Serializer\Annotation as JMS;
use RetailCrm\Model\Request\BaseRequest;
use RetailCrm\Model\Response\AliExpress\SolutionBatchProductInventoryUpdateResponse;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class SolutionBatchProductInventoryUpdate
 *
 * @category SolutionBatchProductInventoryUpdate
 * @package  RetailCrm\Model\Request\AliExpress
 */
class SolutionBatchProductInventoryUpdate extends BaseRequest
{
    /**
     * @see https://developers.aliexpress.com/en/doc.htm?docId=45135&docType=2&ocId=45140
     *
     * @var \RetailCrm\Model\Request\AliExpress\Data\MultipleProductInventoriesUpdateListQuery $mutipleProductUpdateList
     *
     * @JMS\Type("RetailCrm\Model\Request\AliExpress\Data\MultipleProductInventoriesUpdateListQuery")
     * @JMS\SerializedName("mutiple_product_update_list")
     * @Assert\NotNull()
     */
    public $mutipleProductUpdateList;

    /**
     * @inheritDoc
     */
    public function getMethod(): string
    {
        return 'aliexpress.solution.batch.product.inventory.update';
    }

    /**
     * @inheritDoc
     */
    public function getExpectedResponse(): string
    {
        return SolutionBatchProductInventoryUpdateResponse::class;
    }
}
