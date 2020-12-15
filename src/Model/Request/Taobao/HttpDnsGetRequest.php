<?php

/**
 * PHP version 7.3
 *
 * @category HttpDnsGetRequest
 * @package  RetailCrm\Model\Request\Taobao
 */
namespace RetailCrm\Model\Request\Taobao;

use RetailCrm\Model\Request\BaseRequest;
use RetailCrm\Model\Response\Taobao\HttpDnsGetResponse;

/**
 * Class HttpDnsGetRequest
 *
 * @category HttpDnsGetRequest
 * @package  RetailCrm\Model\Request\Taobao
 */
class HttpDnsGetRequest extends BaseRequest
{
    /**
     * Returns method name for this request.
     *
     * @return string
     */
    public function getMethod(): string
    {
        return 'taobao.httpdns.get';
    }

    /**
     * Should return response class FQN for this particular request.
     *
     * @return string
     */
    public function getExpectedResponse(): string
    {
        return HttpDnsGetResponse::class;
    }
}
