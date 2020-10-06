<?php
/**
 * PHP version 7.3
 *
 * @category LogisticsRedefiningListLogisticsService
 * @package  RetailCrm\Model\Request\AliExpress
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Request\AliExpress;

use RetailCrm\Model\Request\BaseRequest;
use RetailCrm\Model\Response\AliExpress\LogisticsRedefiningListLogisticsServiceResponse;

/**
 * Class LogisticsRedefiningListLogisticsService
 *
 * @category LogisticsRedefiningListLogisticsService
 * @package  RetailCrm\Model\Request\AliExpress
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class LogisticsRedefiningListLogisticsService extends BaseRequest
{
    /**
     * @inheritDoc
     */
    public function getMethod(): string
    {
        return 'aliexpress.logistics.redefining.listlogisticsservice';
    }

    /**
     * @inheritDoc
     */
    public function getExpectedResponse(): string
    {
        return LogisticsRedefiningListLogisticsServiceResponse::class;
    }
}
