<?php

/**
 * PHP version 7.3
 *
 * @category TimestampProvider
 * @package  RetailCrm\Service
 */
namespace RetailCrm\Service;

use DateTime;
use DateTimeZone;
use RetailCrm\Interfaces\RequestTimestampProviderInterface;
use RetailCrm\Model\Request\BaseRequest;

/**
 * Class TimestampProvider
 *
 * @category TimestampProvider
 * @package  RetailCrm\Service
 */
class RequestTimestampProvider implements RequestTimestampProviderInterface
{
    /**
     * Sets current timestamp in GMT +8 timezone in the request
     *
     * @param \RetailCrm\Model\Request\BaseRequest $request
     *
     * @return void
     */
    public function provide(BaseRequest $request): void
    {
        $request->timestamp = $this->getTimestamp();
    }

    /**
     * @return \DateTime
     */
    private function getTimestamp(): DateTime
    {
        if (function_exists('date_default_timezone_set')
            && function_exists('date_default_timezone_get')
        ) {
            date_default_timezone_set(date_default_timezone_get());
        }

        $timestamp = new DateTime();
        $timestamp->setTimezone(new DateTimeZone('Asia/Shanghai'));

        return $timestamp;
    }
}
