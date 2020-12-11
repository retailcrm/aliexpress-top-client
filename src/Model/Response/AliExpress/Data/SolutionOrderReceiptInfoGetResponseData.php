<?php
/**
 * PHP version 7.3
 *
 * @category SolutionOrderReceiptInfoGetResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 */

namespace RetailCrm\Model\Response\AliExpress\Data;

use JMS\Serializer\Annotation as JMS;
use RetailCrm\Model\Response\AliExpress\Result\SolutionOrderReceiptInfoGetResponseResult;

/**
 * Class SolutionOrderReceiptInfoGetResponseData
 *
 * @category SolutionOrderReceiptInfoGetResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 */
class SolutionOrderReceiptInfoGetResponseData
{
    /**
     * @var SolutionOrderReceiptInfoGetResponseResult $result
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Result\SolutionOrderReceiptInfoGetResponseResult")
     * @JMS\SerializedName("result")
     */
    public $result;
}
