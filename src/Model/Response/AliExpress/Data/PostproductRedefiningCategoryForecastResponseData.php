<?php
/**
 * PHP version 7.3
 *
 * @category PostproductRedefiningCategoryForecastResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 */

namespace RetailCrm\Model\Response\AliExpress\Data;

use JMS\Serializer\Annotation as JMS;
use RetailCrm\Model\Response\AbstractResponseData;

/**
 * Class PostproductRedefiningCategoryForecastResponseData
 *
 * @category PostproductRedefiningCategoryForecastResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 */
class PostproductRedefiningCategoryForecastResponseData extends AbstractResponseData
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\AeopCategoryForecastResultDto $result
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Result\AeopCategoryForecastResultDto")
     * @JMS\SerializedName("result")
     */
    public $result;
}
