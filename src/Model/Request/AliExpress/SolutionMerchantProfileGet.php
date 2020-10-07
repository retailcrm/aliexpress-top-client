<?php
/**
 * PHP version 7.3
 *
 * @category SolutionMerchantProfileGet
 * @package  RetailCrm\Model\Request\AliExpress
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Request\AliExpress;

use RetailCrm\Model\Request\BaseRequest;
use RetailCrm\Model\Response\AliExpress\SolutionMerchantProfileGetResponse;

/**
 * Class SolutionMerchantProfileGet
 *
 * @category SolutionMerchantProfileGet
 * @package  RetailCrm\Model\Request\AliExpress
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class SolutionMerchantProfileGet extends BaseRequest
{
    /**
     * @inheritDoc
     */
    public function getMethod(): string
    {
        return 'aliexpress.solution.merchant.profile.get';
    }

    /**
     * @inheritDoc
     */
    public function getExpectedResponse(): string
    {
        return SolutionMerchantProfileGetResponse::class;
    }
}
