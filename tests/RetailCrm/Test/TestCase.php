<?php

namespace RetailCrm\Test;

use DateTime;
use Psr\Container\ContainerInterface;
use RetailCrm\Component\AppData;
use RetailCrm\Component\Authenticator\TokenAuthenticator;
use RetailCrm\Component\Environment;
use RetailCrm\Factory\ContainerFactory;
use RetailCrm\Factory\FileItemFactory;
use RetailCrm\Interfaces\AppDataInterface;
use RetailCrm\Interfaces\AuthenticatorInterface;

/**
 * Class TestCase
 *
 * @category TestCase
 * @package  ${NAMESPACE}
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class TestCase extends \PHPUnit\Framework\TestCase
{
    private $container;

    /**
     * @param bool $recreate
     *
     * @return \Psr\Container\ContainerInterface
     */
    protected function getContainer($recreate = false): ContainerInterface
    {
        if (null === $this->container || $recreate) {
            $this->container = ContainerFactory::withEnv(Environment::TEST)
                ->withClient(new \GuzzleHttp\Client())
                ->create();
        }

        return $this->container;
    }

    /**
     * @return \RetailCrm\Interfaces\AppDataInterface
     */
    protected function getAppData(): AppDataInterface
    {
        return AppData::create(AppData::OVERSEAS_ENDPOINT, 'appKey', 'helloworld');
    }

    /**
     * @param string $appKey
     * @param string $token
     *
     * @return \RetailCrm\Interfaces\AuthenticatorInterface
     */
    protected function getAuthenticator(string $appKey = 'appKey', string $token = 'token'): AuthenticatorInterface
    {
        return new TokenAuthenticator($appKey, $token);
    }

    /**
     * @param string $signMethod
     *
     * @param bool   $withFile
     *
     * @return \RetailCrm\Test\TestSignerRequest
     */
    protected function getTestRequest(string $signMethod, bool $withFile = false): TestSignerRequest
    {
        $request = new TestSignerRequest();
        $request->method = 'aliexpress.solution.order.fulfill';
        $request->appKey = '12345678';
        $request->session = 'test';
        $request->timestamp = DateTime::createFromFormat('Y-m-d H:i:s', '2016-01-01 12:00:00');
        $request->signMethod = $signMethod;
        $request->serviceName = 'SPAIN_LOCAL_CORREOS';
        $request->outRef = '1000006270175804';
        $request->sendType = 'all';
        $request->logisticsNo = 'ES2019COM0000123456';

        if ($withFile) {
            /** @var FileItemFactory $factory */
            $factory = $this->getContainer()->get(FileItemFactory::class);
            $request->document = $factory->fromString(
                'file.txt',
                'The quick brown fox jumps over the lazy dog'
            );
        }

        return $request;
    }
}
