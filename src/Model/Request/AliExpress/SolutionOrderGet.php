<?php
/**
 * PHP version 7.3
 *
 * @category SolutionOrderGet
 * @package  RetailCrm\Model\Request\AliExpress
 */

namespace RetailCrm\Model\Request\AliExpress;

use JMS\Serializer\Annotation as JMS;
use RetailCrm\Model\Request\BaseRequest;
use RetailCrm\Model\Response\AliExpress\SolutionOrderGetResponse;

/**
 * Class SolutionOrderGet
 *
 * @category SolutionOrderGet
 * @package  RetailCrm\Model\Request\AliExpress
 */
class SolutionOrderGet extends BaseRequest
{
    /**
     * Contains request params. This weird naming has been borrowed from developer docs.
     * @see https://developers.aliexpress.com/en/doc.htm?docId=42270&docType=2
     *
     * @var \RetailCrm\Model\Request\AliExpress\Data\OrderQuery $param0
     *
     * @JMS\Type("RetailCrm\Model\Request\AliExpress\Data\OrderQuery")
     * @JMS\SerializedName("param0")
     */
    public $param0;

    /**
     * @inheritDoc
     */
    public function getMethod(): string
    {
        return 'aliexpress.solution.order.get';
    }

    /**
     * @inheritDoc
     */
    public function getExpectedResponse(): string
    {
        return SolutionOrderGetResponse::class;
    }
}
