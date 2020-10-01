<?php
/**
 * PHP version 7.4
 *
 * @category AeopCategoryForecastResultDto
 * @package  RetailCrm\Model\Response\AliExpress\Result
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Result;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AeopCategoryForecastResultDto
 *
 * @category AeopCategoryForecastResultDto
 * @package  RetailCrm\Model\Response\AliExpress\Result
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class AeopCategoryForecastResultDto
{
    /**
     * @var string $errorMessage
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("error_message")
     */
    public $errorMessage;

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

    /**
     * @var string $errorCode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("error_code")
     */
    public $errorCode;

    /**
     * @var bool $success
     *
     * @JMS\Type("bool")
     * @JMS\SerializedName("success")
     */
    public $success;
}
