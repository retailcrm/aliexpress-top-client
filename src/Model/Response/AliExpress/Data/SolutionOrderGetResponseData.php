<?php
/**
 * PHP version 7.3
 *
 * @category SolutionOrderGetResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 */

namespace RetailCrm\Model\Response\AliExpress\Data;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SolutionOrderGetResponseData
 *
 * @category SolutionOrderGetResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 */
class SolutionOrderGetResponseData
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\SolutionOrderGetResponseResult $result
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Result\SolutionOrderGetResponseResult")
     * @JMS\SerializedName("result")
     */
    public $result;
}
