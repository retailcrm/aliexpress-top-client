<?php

/**
 * PHP version 7.3
 *
 * @category RequestSigner
 * @package  RetailCrm\Tests\Service
 */
namespace RetailCrm\Tests\Service;

use RetailCrm\Component\AppData;
use RetailCrm\Component\Constants;
use RetailCrm\Interfaces\AppDataInterface;
use RetailCrm\Interfaces\RequestSignerInterface;
use RetailCrm\Interfaces\TopRequestFactoryInterface;
use RetailCrm\Model\Enum\AvailableSignMethods;
use RetailCrm\Test\TestCase;
use RetailCrm\Test\TestSignerRequest;

/**
 * Class RequestSigner
 *
 * @category RequestSigner
 * @package  RetailCrm\Tests\Service
 */
class RequestSignerTest extends TestCase
{
    /**
     * @dataProvider signDataProvider
     *
     * @param array                                  $request
     * @param \RetailCrm\Interfaces\AppDataInterface $appData
     * @param string                                 $expectedHash
     *
     * @throws \RetailCrm\Component\Exception\NotImplementedException
     */
    public function testSign(array $request, AppDataInterface $appData, string $expectedHash): void
    {
        /** @var RequestSignerInterface $signer */
        $signer = $this->getContainer()->get(RequestSignerInterface::class);

        self::assertEquals($expectedHash, $signer->generateSign($request, $appData, $request['sign_method']));
    }

    public function signDataProvider(): array
    {
        /** @var TopRequestFactoryInterface $factory */
        $factory = $this->getContainer()->get(TopRequestFactoryInterface::class);
        $appData = $this->getAppData();

        return [
            [
                $factory->getRequestArray($this->getTestRequest(AvailableSignMethods::MD5)),
                $appData,
                '4BC79C5FAA1B5E254E95A97E65BACEAB'
            ],
            [
                $factory->getRequestArray($this->getTestRequest(AvailableSignMethods::HMAC_MD5)),
                $appData,
                '497FA7FCAD98F4F335EFAE2451F8291D'
            ],
            [
                $factory->getRequestArray($this->getTestRequest(AvailableSignMethods::MD5, true)),
                $appData,
                '4BC79C5FAA1B5E254E95A97E65BACEAB'
            ],
            [
                $factory->getRequestArray($this->getTestRequest(AvailableSignMethods::HMAC_MD5, true)),
                $appData,
                '497FA7FCAD98F4F335EFAE2451F8291D'
            ]
        ];
    }
}
