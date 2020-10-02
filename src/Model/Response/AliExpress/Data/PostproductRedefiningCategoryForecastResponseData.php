<?php
/**
 * PHP version 7.3
 *
 * @category PostproductRedefiningCategoryForecastResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Data;

use JMS\Serializer\Annotation as JMS;
use RetailCrm\Model\Response\AbstractResponseData;

/**
 * Class PostproductRedefiningCategoryForecastResponseData
 *
 * @category PostproductRedefiningCategoryForecastResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
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
