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
use RetailCrm\Model\Enum\AvailableSignMethods;
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
                $this->getTestRequest(AvailableSignMethods::MD5),
                $appData,
                '468BF7C95925C187D0DFD7D042072EB4'
            ],
            [
                $this->getTestRequest(AvailableSignMethods::HMAC_MD5),
                $appData,
                '5EF5C76D5C158BFFA9F35BAAA712A879'
            ],
            [
                $this->getTestRequest(AvailableSignMethods::MD5, true),
                $appData,
                '468BF7C95925C187D0DFD7D042072EB4'
            ],
            [
                $this->getTestRequest(AvailableSignMethods::HMAC_MD5, true),
                $appData,
                '5EF5C76D5C158BFFA9F35BAAA712A879'
            ]
        ];
    }
}
