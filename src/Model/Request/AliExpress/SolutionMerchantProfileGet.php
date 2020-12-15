<?php
/**
 * PHP version 7.3
 *
 * @category SolutionMerchantProfileGet
 * @package  RetailCrm\Model\Request\AliExpress
 */

namespace RetailCrm\Model\Request\AliExpress;

use RetailCrm\Model\Request\BaseRequest;
use RetailCrm\Model\Response\AliExpress\SolutionMerchantProfileGetResponse;

/**
 * Class SolutionMerchantProfileGet
 *
 * @category SolutionMerchantProfileGet
 * @package  RetailCrm\Model\Request\AliExpress
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
