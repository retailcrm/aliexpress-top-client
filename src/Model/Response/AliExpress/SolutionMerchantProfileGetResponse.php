<?php
/**
 * PHP version 7.3
 *
 * @category SolutionMerchantProfileGetResponse
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
 * Class SolutionMerchantProfileGetResponse
 *
 * @category SolutionMerchantProfileGetResponse
 * @package  RetailCrm\Model\Response\AliExpress
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class SolutionMerchantProfileGetResponse extends BaseResponse
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Data\SolutionMerchantProfileGetResponseData $responseData
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Data\SolutionMerchantProfileGetResponseData")
     * @JMS\SerializedName("aliexpress_solution_merchant_profile_get_response")
     */
    public $responseData;
}
