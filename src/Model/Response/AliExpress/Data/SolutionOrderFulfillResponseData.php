<?php
/**
 * PHP version 7.3
 *
 * @category SolutionOrderFulfillResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 */

namespace RetailCrm\Model\Response\AliExpress\Data;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SolutionOrderFulfillResponseData
 *
 * @category SolutionOrderFulfillResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 */
class SolutionOrderFulfillResponseData
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\SuccessResult $result
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Result\SuccessResult")
     * @JMS\SerializedName("result")
     */
    public $result;
}
