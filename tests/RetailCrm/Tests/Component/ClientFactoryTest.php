<?php

/**
 * PHP version 7.4
 *
 * @category ClientFactoryTest
 * @package  RetailCrm\Tests\Component
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Tests\Component;

use RetailCrm\Component\AppData;
use RetailCrm\Component\Authenticator\TokenAuthenticator;
use RetailCrm\Factory\ClientFactory;
use RetailCrm\Test\TestCase;
use RetailCrm\TopClient\Client;

/**
 * Class ClientFactoryTest
 *
 * @category ClientFactoryTest
 * @package  RetailCrm\Tests\Component
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ClientFactoryTest extends TestCase
{
    public function testCreateClient()
    {
        $client = ClientFactory::withContainer($this->getContainer())
            ->setAppData(AppData::create(AppData::OVERSEAS_ENDPOINT, 'appKey', 'helloworld'))
            ->setAuthenticator(new TokenAuthenticator('appKey', 'token'))
            ->create();

        self::assertInstanceOf(Client::class, $client);
    }
}
