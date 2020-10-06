<?php
/**
 * PHP version 7.3
 *
 * @category SolutionOrderReceiptInfoGetResponse
 * @package  RetailCrm\Model\Response\AliExpress
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress;

use RetailCrm\Model\Response\AliExpress\Data\SolutionOrderReceiptInfoGetResponseData;
use RetailCrm\Model\Response\BaseResponse;
use JMS\Serializer\Annotation as JMS;

/**
 * Class SolutionOrderReceiptInfoGetResponse
 *
 * @category SolutionOrderReceiptInfoGetResponse
 * @package  RetailCrm\Model\Response\AliExpress
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class SolutionOrderReceiptInfoGetResponse extends BaseResponse
{
    /**
     * @var SolutionOrderReceiptInfoGetResponseData $responseData
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Data\SolutionOrderReceiptInfoGetResponseData")
     * @JMS\SerializedName("aliexpress_solution_order_receiptinfo_get_response")
     */
    public $responseData;
}
