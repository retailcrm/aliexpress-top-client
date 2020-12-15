<?php
/**
 * PHP version 7.3
 *
 * @category SolutionOrderReceiptInfoGet
 * @package  RetailCrm\Model\Request\AliExpress
 */

namespace RetailCrm\Model\Request\AliExpress;

use RetailCrm\Model\Request\BaseRequest;
use JMS\Serializer\Annotation as JMS;
use RetailCrm\Model\Response\AliExpress\SolutionOrderReceiptInfoGetResponse;

/**
 * Class SolutionOrderReceiptInfoGet
 *
 * @category SolutionOrderReceiptInfoGet
 * @package  RetailCrm\Model\Request\AliExpress
 */
class SolutionOrderReceiptInfoGet extends BaseRequest
{
    /**
     * @var \RetailCrm\Model\Request\AliExpress\Data\SingleOrderQuery $param1
     *
     * @JMS\Type("RetailCrm\Model\Request\AliExpress\Data\SingleOrderQuery")
     * @JMS\SerializedName("param1")
     */
    public $param1;

    /**
     * @inheritDoc
     */
    public function getMethod(): string
    {
        return 'aliexpress.solution.order.receiptinfo.get';
    }

    /**
     * @inheritDoc
     */
    public function getExpectedResponse(): string
    {
        return SolutionOrderReceiptInfoGetResponse::class;
    }
}
