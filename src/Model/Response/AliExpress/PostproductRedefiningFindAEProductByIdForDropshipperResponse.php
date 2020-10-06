<?php
/**
 * PHP version 7.3
 *
 * @category PostproductRedefiningFindAEProductByIdForDropshipperResponse
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
 * Class PostproductRedefiningFindAEProductByIdForDropshipperResponse
 *
 * @category PostproductRedefiningFindAEProductByIdForDropshipperResponse
 * @package  RetailCrm\Model\Response\AliExpress
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class PostproductRedefiningFindAEProductByIdForDropshipperResponse extends BaseResponse
{
    /**
     * phpcs:ignore
     * @var \RetailCrm\Model\Response\AliExpress\Data\PostproductRedefiningFindAEProductByIdForDropshipperResponseData $responseData
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Data\PostproductRedefiningFindAEProductByIdForDropshipperResponseData")
     * @JMS\SerializedName("aliexpress_postproduct_redefining_findaeproductbyidfordropshipper_response")
     */
    public $responseData;
}
