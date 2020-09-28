<?php

/**
 * PHP version 7.4
 *
 * @category ClientFactoryTest
 * @package  Component
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace Component;

use PHPUnit\Framework\TestCase;
use RetailCrm\Component\Authenticator\TokenAuthenticator;
use RetailCrm\Component\Environment;
use RetailCrm\Factory\ClientFactory;
use RetailCrm\Factory\ContainerFactory;
use RetailCrm\TopClient\Client;

/**
 * Class ClientFactoryTest
 *
 * @category ClientFactoryTest
 * @package  Component
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ClientFactoryTest extends TestCase
{
    public function testCreateClient()
    {
        $client = ClientFactory::withContainer(
                ContainerFactory::withEnv(Environment::DEV)
                    ->withClient(new \GuzzleHttp\Client())
                    ->create()
            )->setServiceUrl(Client::OVERSEAS_ENDPOINT)
            ->setAuthenticator(new TokenAuthenticator('appKey', 'token'))
            ->create();

        self::assertInstanceOf(Client::class, $client);
    }
}
