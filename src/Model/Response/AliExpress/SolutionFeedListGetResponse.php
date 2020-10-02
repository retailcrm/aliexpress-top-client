<?php
/**
 * PHP version 7.3
 *
 * @category SolutionFeedListGetResponse
 * @package  RetailCrm\Model\Response\AliExpress
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress;

use RetailCrm\Model\Response\BaseResponse;
use JMS\Serializer\Annotation as JMS;

/**
 * Class SolutionFeedListGetResponse
 *
 * @category SolutionFeedListGetResponse
 * @package  RetailCrm\Model\Response\AliExpress
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class SolutionFeedListGetResponse extends BaseResponse
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Data\SolutionFeedListGetResponseData $responseData
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Data\SolutionFeedListGetResponseData")
     * @JMS\SerializedName("aliexpress_solution_feed_list_get_response")
     */
    public $responseData;
}
