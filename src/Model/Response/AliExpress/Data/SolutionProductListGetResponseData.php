<?php
/**
 * PHP version 7.3
 *
 * @category SolutionProductListGetResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 */

namespace RetailCrm\Model\Response\AliExpress\Data;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SolutionProductListGetResponseData
 *
 * @category SolutionProductListGetResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 */
class SolutionProductListGetResponseData
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\SolutionProductListGetResponseResult $result
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Result\SolutionProductListGetResponseResult")
     * @JMS\SerializedName("result")
     */
    public $result;
}
