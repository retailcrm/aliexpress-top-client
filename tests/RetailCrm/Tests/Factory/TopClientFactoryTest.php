<?php

/**
 * PHP version 7.3
 *
 * @category TopClientFactoryTest
 * @package  RetailCrm\Tests\Factory
 */
namespace RetailCrm\Tests\Factory;

use RetailCrm\Component\AppData;
use RetailCrm\Component\Exception\ValidationException;
use RetailCrm\Factory\TopClientFactory;
use RetailCrm\Test\TestCase;

/**
 * Class TopClientFactoryTest
 *
 * @category TopClientFactoryTest
 * @package  RetailCrm\Tests\Factory
 */
class TopClientFactoryTest extends TestCase
{
    public function testCreateClient(): void
    {
        $client = TopClientFactory::createClient(
            AppData::OVERSEAS_ENDPOINT,
            'appKey',
            'appSecret',
            'token'
        );

        self::assertNotEmpty($client);
    }

    public function testCreateClientException(): void
    {
        $this->expectException(ValidationException::class);
        TopClientFactory::createClient('https://example.com', 'appKey', 'appSecret');
    }
}
