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

use RetailCrm\Component\AppData;
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
        $signer = $this->getContainer()->get(RequestSignerInterface::class);
        $signer->sign($request, $appData);

        self::assertEquals($expectedHash, $request->sign);
    }

    public function signDataProvider(): array
    {
        $appData = $this->getAppData();

        return [
            [
                $this->getTestRequest(Constants::SIGN_TYPE_MD5),
                $appData,
                '4BC79C5FAA1B5E254E95A97E65BACEAB'
            ],
            [
                $this->getTestRequest(Constants::SIGN_TYPE_HMAC),
                $appData,
                '497FA7FCAD98F4F335EFAE2451F8291D'
            ],
            [
                $this->getTestRequest(Constants::SIGN_TYPE_MD5, true),
                $appData,
                '4BC79C5FAA1B5E254E95A97E65BACEAB'
            ],
            [
                $this->getTestRequest(Constants::SIGN_TYPE_HMAC, true),
                $appData,
                '497FA7FCAD98F4F335EFAE2451F8291D'
            ]
        ];
    }
}
