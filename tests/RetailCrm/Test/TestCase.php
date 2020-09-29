<?php

namespace RetailCrm\Test;

use DateTime;
use Psr\Container\ContainerInterface;
use RetailCrm\Builder\ContainerBuilder;
use RetailCrm\Component\AppData;
use RetailCrm\Component\Authenticator\TokenAuthenticator;
use RetailCrm\Component\Environment;
use RetailCrm\Component\Logger\StdoutLogger;
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
abstract class TestCase extends \PHPUnit\Framework\TestCase
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
            $this->container = ContainerBuilder::create()
                ->setEnv(Environment::TEST)
                ->setClient(new \GuzzleHttp\Client())
                ->setLogger(new StdoutLogger())
                ->build();
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
     * @param bool $withFile
     * @param bool $withDto
     *
     * @return \RetailCrm\Test\TestSignerRequest
     */
    protected function getTestRequest(string $signMethod, bool $withFile = false, bool $withDto = false): TestSignerRequest
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

        if ($withDto) {
            $request->dto = new TestDto();
        }

        return $request;
    }
}
