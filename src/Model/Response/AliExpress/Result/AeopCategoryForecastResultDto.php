<?php
/**
 * PHP version 7.3
 *
 * @category AeopCategoryForecastResultDto
 * @package  RetailCrm\Model\Response\AliExpress\Result
 */

namespace RetailCrm\Model\Response\AliExpress\Result;

use JMS\Serializer\Annotation as JMS;
use RetailCrm\Model\Response\AliExpress\Result\Interfaces\ErrorInterface;
use RetailCrm\Model\Response\AliExpress\Result\Traits\ErrorTrait;
use RetailCrm\Model\Response\AliExpress\Result\Traits\SuccessTrait;

/**
 * Class AeopCategoryForecastResultDto
 *
 * @category AeopCategoryForecastResultDto
 * @package  RetailCrm\Model\Response\AliExpress\Result
 */
class AeopCategoryForecastResultDto implements ErrorInterface
{
    use ErrorTrait;
    use SuccessTrait;

    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\Entity\CategorySuitabilityList $categorySuitabilityList
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Result\Entity\CategorySuitabilityList")
     * @JMS\SerializedName("category_suitability_list")
     */
    public $categorySuitabilityList;

    /**
     * @var string $timeStamp
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("time_stamp")
     */
    public $timeStamp;
}
