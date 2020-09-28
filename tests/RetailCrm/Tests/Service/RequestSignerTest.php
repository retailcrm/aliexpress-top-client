<?php

/**
 * PHP version 7.3
 *
 * @category RequestSigner
 * @package  RetailCrm\Tests\Service
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Tests\Service;

use DateTime;
use RetailCrm\Component\AppData;
use RetailCrm\Component\Authenticator\TokenAuthenticator;
use RetailCrm\Component\Constants;
use RetailCrm\Interfaces\AppDataInterface;
use RetailCrm\Interfaces\RequestSignerInterface;
use RetailCrm\Service\RequestSigner;
use RetailCrm\Test\TestCase;
use RetailCrm\Test\TestSignerRequest;

/**
 * Class RequestSigner
 *
 * @category RequestSigner
 * @package  RetailCrm\Tests\Service
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class RequestSignerTest extends TestCase
{
    /**
     * @dataProvider signDataProvider
     *
     * @param \RetailCrm\Test\TestSignerRequest      $request
     * @param \RetailCrm\Interfaces\AppDataInterface $appData
     * @param string                                 $expectedHash
     */
    public function testSign(TestSignerRequest $request, AppDataInterface $appData, string $expectedHash): void
    {
        /** @var RequestSignerInterface $signer */
        $signer = $this->getContainer()->get(RequestSigner::class);
        $signer->sign($request, $appData);

        self::assertEquals($expectedHash, $request->sign);
    }

    public function signDataProvider(): array
    {
        $appData = AppData::create(AppData::OVERSEAS_ENDPOINT, 'appKey', 'helloworld');

        return [
            [
                $this->getRequestWithSignMethod(Constants::SIGN_TYPE_MD5),
                $appData,
                '4BC79C5FAA1B5E254E95A97E65BACEAB'
            ],
            [
                $this->getRequestWithSignMethod(Constants::SIGN_TYPE_HMAC),
                $appData,
                '497FA7FCAD98F4F335EFAE2451F8291D'
            ]
        ];
    }

    /**
     * @param string $signMethod
     *
     * @return \RetailCrm\Test\TestSignerRequest
     */
    private function getRequestWithSignMethod(string $signMethod): TestSignerRequest
    {
        $request = new TestSignerRequest();
        $request->method = 'aliexpress.solution.order.fulfill';
        $request->appKey = '12345678';
        $request->session = 'test';
        $request->timestamp = DateTime::createFromFormat('Y-m-d H:i:s', '2016-01-01 12:00:00');
        $request->signMethod = $signMethod;
        $request->serviceName = 'SPAIN_LOCAL_CORREOS';
        $request->outRef = '1000006270175804';
        $request->sendType = 'all';
        $request->logisticsNo = 'ES2019COM0000123456';

        return $request;
    }
}
