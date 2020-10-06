<?php
/**
 * PHP version 7.3
 *
 * @category LogisticsRedefiningListLogisticsServiceResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Data;

use JMS\Serializer\Annotation as JMS;

/**
 * Class LogisticsRedefiningListLogisticsServiceResponseData
 *
 * @category LogisticsRedefiningListLogisticsServiceResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class LogisticsRedefiningListLogisticsServiceResponseData
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\Entity\AeopLogisticsServiceResultItemList $resultList
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Result\Entity\AeopLogisticsServiceResultItemList")
     * @JMS\SerializedName("result_list")
     */
    public $resultList;

    /**
     * @var string $errorDesc
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("error_desc")
     */
    public $errorDesc;

    /**
     * @var bool $resultSuccess
     *
     * @JMS\Type("bool")
     * @JMS\SerializedName("result_success")
     */
    public $resultSuccess;
}
