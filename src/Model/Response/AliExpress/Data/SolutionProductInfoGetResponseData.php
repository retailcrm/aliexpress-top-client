<?php
/**
 * PHP version 7.3
 *
 * @category SolutionProductInfoGetResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 */

namespace RetailCrm\Model\Response\AliExpress\Data;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SolutionProductInfoGetResponseData
 *
 * @category SolutionProductInfoGetResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 */
class SolutionProductInfoGetResponseData
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\SolutionProductInfoGetResponseResult $result
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Result\SolutionProductInfoGetResponseResult")
     * @JMS\SerializedName("result")
     */
    public $result;
}
