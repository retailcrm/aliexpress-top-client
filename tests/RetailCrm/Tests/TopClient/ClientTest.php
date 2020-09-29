<?php

/**
 * PHP version 7.3
 *
 * @category ClientTest
 * @package  RetailCrm\Tests\TopClient
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Tests\TopClient;

use RetailCrm\Builder\ClientBuilder;
use RetailCrm\Component\AppData;
use RetailCrm\Component\Authenticator\TokenAuthenticator;
use RetailCrm\Component\Exception\ValidationException;
use RetailCrm\Model\Request\HttpDnsGetRequest;
use RetailCrm\Test\TestCase;

/**
 * Class ClientTest
 *
 * @category ClientTest
 * @package  RetailCrm\Tests\TopClient
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ClientTest extends TestCase
{
    public function testClientRequest()
    {
        self::markTestSkipped('Not implemented yet');
        
        $client = ClientBuilder::create()
            ->setContainer($this->getContainer())
            ->setAppData(new AppData(AppData::OVERSEAS_ENDPOINT, 'appKey', 'appSecret'))
            ->setAuthenticator(new TokenAuthenticator('appKey', 'token'))
            ->build();

        $client->sendRequest(new HttpDnsGetRequest());
    }
}
