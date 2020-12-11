<?php

/**
 * PHP version 7.4
 *
 * @category ClientBuilderTest
 * @package  RetailCrm\Tests\Builder
 */
namespace RetailCrm\Tests\Builder;

use RetailCrm\Component\AppData;
use RetailCrm\Component\ServiceLocator;
use RetailCrm\Builder\TopClientBuilder;
use RetailCrm\Test\TestCase;
use RetailCrm\TopClient\TopClient;

/**
 * Class ClientBuilderTest
 *
 * @category ClientBuilderTest
 * @package  RetailCrm\Tests\Builder
 */
class ClientBuilderTest extends TestCase
{
    public function testCreateClient()
    {
        $client = TopClientBuilder::create()
            ->setContainer($this->getContainer())
            ->setAppData(new AppData(AppData::OVERSEAS_ENDPOINT, 'appKey', 'helloworld'))
            ->build();

        self::assertInstanceOf(TopClient::class, $client);
        self::assertInstanceOf(ServiceLocator::class, $client->getServiceLocator());
    }
}
