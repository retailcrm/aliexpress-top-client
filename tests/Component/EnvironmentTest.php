<?php

/**
 * PHP version 7.4
 *
 * @category EnvironmentTest
 * @package  Component
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace Component;

use GuzzleHttp\Client as HttpClient;
use PHPUnit\Framework\TestCase;
use RetailCrm\Factory\EnvironmentFactory;
use RetailCrm\TopClient\Client;

/**
 * Class EnvironmentTest
 *
 * @category EnvironmentTest
 * @package  Component
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class EnvironmentTest extends TestCase
{
    public function testCreateClient()
    {
        $client = EnvironmentFactory::withEnv()
            ->create(new HttpClient())
            ->createClient(Client::OVERSEAS_ENDPOINT);

        self::assertInstanceOf(Client::class, $client);
    }
}
