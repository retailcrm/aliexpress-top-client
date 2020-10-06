<?php
/**
 * PHP version 7.3
 *
 * @category SolutionOrderReceiptInfoGetResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Data;

use JMS\Serializer\Annotation as JMS;
use RetailCrm\Model\Response\AliExpress\Result\SolutionOrderReceiptInfoGetResponseResult;

/**
 * Class SolutionOrderReceiptInfoGetResponseData
 *
 * @category SolutionOrderReceiptInfoGetResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class SolutionOrderReceiptInfoGetResponseData
{
    /**
     * @var SolutionOrderReceiptInfoGetResponseResult $result
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Result\SolutionOrderReceiptInfoGetResponseResult")
     * @JMS\SerializedName("result")
     */
    public $result;
}
