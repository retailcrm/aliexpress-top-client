<?php
/**
 * PHP version 7.3
 *
 * @category PostproductRedefiningCategoryForecastResponse
 * @package  RetailCrm\Model\Response\AliExpress
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress;

use RetailCrm\Model\Response\AliExpress\Data\PostproductRedefiningCategoryForecastResponseData;
use RetailCrm\Model\Response\BaseResponse;

use JMS\Serializer\Annotation as JMS;

/**
 * Class PostproductRedefiningCategoryForecastResponse
 *
 * @category PostproductRedefiningCategoryForecastResponse
 * @package  RetailCrm\Model\Response\AliExpress
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class PostproductRedefiningCategoryForecastResponse extends BaseResponse
{
    /**
     * @var PostproductRedefiningCategoryForecastResponseData $responseData
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Data\PostproductRedefiningCategoryForecastResponseData")
     * @JMS\SerializedName("aliexpress_postproduct_redefining_categoryforecast_response")
     */
    public $responseData;
}
