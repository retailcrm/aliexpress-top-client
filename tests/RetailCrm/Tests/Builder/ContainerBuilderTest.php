<?php

/**
 * PHP version 7.3
 *
 * @category ContainerBuilderTest
 * @package  RetailCrm\Tests\Builder
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Tests\Builder;

use Http\Mock\Client;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;
use Psr\Log\NullLogger;
use RetailCrm\Builder\ContainerBuilder;
use RetailCrm\Component\Constants;
use RetailCrm\Component\Environment;
use RetailCrm\Component\Logger\StdoutLogger;
use RetailCrm\Test\TestCase;

/**
 * Class ContainerBuilderTest
 *
 * @category ContainerBuilderTest
 * @package  RetailCrm\Tests\Builder
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ContainerBuilderTest extends TestCase
{
    public function testBuildWithDiscovery(): void
    {
        $container = ContainerBuilder::create()->build();

        self::assertNotNull($container->get(Constants::HTTP_CLIENT));
        self::assertInstanceOf(NullLogger::class, $container->get(Constants::LOGGER));
        self::assertNotNull($container->get(StreamFactoryInterface::class));
        self::assertNotNull($container->get(RequestFactoryInterface::class));
        self::assertNotNull($container->get(UriFactoryInterface::class));
    }

    public function testBuildWithDefinitions(): void
    {
        $client = new Client();
        $logger = new StdoutLogger();
        $factory = new Psr17Factory();
        $container = ContainerBuilder::create()
            ->setEnv(Environment::TEST)
            ->setClient($client)
            ->setLogger($logger)
            ->setStreamFactory($factory)
            ->setRequestFactory($factory)
            ->setUriFactory($factory)
            ->build();

        self::assertEquals($client, $container->get(Constants::HTTP_CLIENT));
        self::assertEquals($logger, $container->get(Constants::LOGGER));
        self::assertEquals($factory, $container->get(StreamFactoryInterface::class));
        self::assertEquals($factory, $container->get(RequestFactoryInterface::class));
        self::assertEquals($factory, $container->get(UriFactoryInterface::class));
    }
}
