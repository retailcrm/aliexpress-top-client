<?php

/**
 * PHP version 7.3
 *
 * @category TopRequestFactoryTest
 * @package  RetailCrm\Tests\Factory
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Tests\Factory;

use RetailCrm\Component\Constants;
use RetailCrm\Factory\TopRequestFactory;
use RetailCrm\Interfaces\TopRequestFactoryInterface;
use RetailCrm\Model\Enum\AvailableSignMethods;
use RetailCrm\Test\TestCase;

/**
 * Class TopRequestFactoryTest
 *
 * @category TopRequestFactoryTest
 * @package  RetailCrm\Tests\Factory
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class TopRequestFactoryTest extends TestCase
{
    public function testFromModelGet(): void
    {
        /** @var TopRequestFactory $factory */
        $factory = $this->getContainer()->get(TopRequestFactoryInterface::class);
        $request = $factory->fromModel(
            $this->getTestRequest(AvailableSignMethods::HMAC_MD5),
            $this->getAppData()
        );
        $uri = $request->getUri();
        $contents = self::getStreamData($request->getBody());

        self::assertEmpty($contents);
        self::assertNotEmpty($uri->getQuery());
        self::assertFalse(stripos($uri->getQuery(), 'simplify'), $uri->getQuery());
        self::assertNotFalse(stripos($uri->getQuery(), 'SPAIN_LOCAL_CORREOS'));
    }

    public function testFromModelPost(): void
    {
        /** @var TopRequestFactory $factory */
        $factory = $this->getContainer()->get(TopRequestFactoryInterface::class);
        $request = $factory->fromModel(
            $this->getTestRequest(AvailableSignMethods::HMAC_MD5, true, true),
            $this->getAppData()
        );
        $uri = $request->getUri();
        $contents = self::getStreamData($request->getBody());

        self::assertEmpty($uri->getQuery());
        self::assertNotFalse(stripos($contents, 'The quick brown fox jumps over the lazy dog'));
        self::assertNotFalse(stripos($contents, '{"modelContent":"contentData"}'));
    }
}
