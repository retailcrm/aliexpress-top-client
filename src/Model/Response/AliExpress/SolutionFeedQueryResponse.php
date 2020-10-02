<?php
/**
 * PHP version 7.4
 *
 * @category SolutionFeedQueryResponse
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
 * Class SolutionFeedQueryResponse
 *
 * @category SolutionFeedQueryResponse
 * @package  RetailCrm\Model\Response\AliExpress
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class SolutionFeedQueryResponse extends BaseResponse
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Data\SolutionFeedQueryResponseData $responseData
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Data\SolutionFeedQueryResponseData")
     * @JMS\SerializedName("aliexpress_solution_feed_query_response")
     */
    public $responseData;
}
