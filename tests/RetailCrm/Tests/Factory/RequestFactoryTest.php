<?php

/**
 * PHP version 7.3
 *
 * @category RequestFactoryTest
 * @package  RetailCrm\Tests\Factory
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Tests\Factory;

use Psr\Http\Message\RequestInterface;
use RetailCrm\Component\Constants;
use RetailCrm\Factory\RequestFactory;
use RetailCrm\Component\AppData;
use RetailCrm\Test\TestCase;

/**
 * Class RequestFactoryTest
 *
 * @category RequestFactoryTest
 * @package  RetailCrm\Tests\Factory
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class RequestFactoryTest extends TestCase
{
    public function testFromModelGet(): void
    {
        /** @var RequestFactory $factory */
        $factory = $this->getContainer()->get(RequestFactory::class);
        $request = $factory->fromModel(
            AppData::OVERSEAS_ENDPOINT,
            $this->getTestRequest(Constants::SIGN_TYPE_HMAC),
            $this->getAppData(),
            $this->getAuthenticator()
        );
        $uri = $request->getUri();
        $contents = $request->getBody()->getContents();

        self::assertEmpty($contents);
        self::assertNotEmpty($uri->getQuery());
        self::assertNotFalse(stripos($uri->getQuery(), 'SPAIN_LOCAL_CORREOS'));
    }

    public function testFromModelPost(): void
    {
        /** @var RequestFactory $factory */
        $factory = $this->getContainer()->get(RequestFactory::class);
        $request = $factory->fromModel(
            AppData::OVERSEAS_ENDPOINT,
            $this->getTestRequest(Constants::SIGN_TYPE_HMAC, true, true),
            $this->getAppData(),
            $this->getAuthenticator()
        );
        $uri = $request->getUri();
        $contents = $request->getBody()->getContents();

        self::assertEmpty($uri->getQuery());
        self::assertNotFalse(stripos($contents, 'The quick brown fox jumps over the lazy dog'));
        self::assertNotFalse(stripos($contents, '{"modelContent":"contentData"}'));
    }
}
