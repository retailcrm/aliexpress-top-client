<?php

namespace RetailCrm\Test;

use DateTime;
use Http\Client\Curl\Client as CurlClient;
use Http\Discovery\Psr17FactoryDiscovery;
use Http\Mock\Client as MockClient;
use InvalidArgumentException;
use Nyholm\Psr7\Factory\Psr17Factory;
use Psr\Container\ContainerInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use RetailCrm\Builder\ContainerBuilder;
use RetailCrm\Component\AppData;
use RetailCrm\Component\Authenticator\TokenAuthenticator;
use RetailCrm\Component\Constants;
use RetailCrm\Component\Environment;
use RetailCrm\Component\Logger\StdoutLogger;
use RetailCrm\Factory\FileItemFactory;
use RetailCrm\Interfaces\AppDataInterface;
use RetailCrm\Interfaces\AuthenticatorInterface;
use RetailCrm\Interfaces\FileItemFactoryInterface;

/**
 * Class TestCase
 *
 * @category TestCase
 * @package  ${NAMESPACE}
 */
abstract class TestCase extends \PHPUnit\Framework\TestCase
{
    private $container;

    /**
     * @param \Psr\Http\Client\ClientInterface|null $client
     * @param bool                                  $recreate
     *
     * @return \Psr\Container\ContainerInterface
     */
    protected function getContainer(?ClientInterface $client = null, $recreate = false): ContainerInterface
    {
        if (null === $this->container || null !== $client || $recreate) {
            $factory = new Psr17Factory();
            $this->container = ContainerBuilder::create()
                ->setEnv(Environment::TEST)
                ->setClient(is_null($client) ? self::getMockClient() : $client)
                ->setStreamFactory($factory)
                ->setRequestFactory($factory)
                ->setUriFactory($factory)
                ->build();
        }

        return $this->container;
    }

    /**
     * @return \RetailCrm\Interfaces\AppDataInterface
     */
    protected function getEnvAppData(): AppDataInterface
    {
        return $this->getAppData(
            self::getenv('ENDPOINT', AppData::OVERSEAS_ENDPOINT),
            self::getEnvAppKey(),
            self::getenv('APP_SECRET', 'helloworld'),
            self::getenv('REDIRECT_URI', 'https://example.com'),
        );
    }

    /**
     * @param string $endpoint
     * @param string $appKey
     * @param string $appSecret
     *
     * @param string $redirectUri
     *
     * @return \RetailCrm\Interfaces\AppDataInterface
     */
    protected function getAppData(
        string $endpoint = AppData::OVERSEAS_ENDPOINT,
        string $appKey = 'appKey',
        string $appSecret = 'helloworld',
        string $redirectUri = 'https://example.com'
    ): AppDataInterface{
        return new AppData($endpoint, $appKey, $appSecret, $redirectUri);
    }

    protected function getEnvTokenAuthenticator(): AuthenticatorInterface
    {
        return $this->getTokenAuthenticator(self::getEnvToken());
    }

    /**
     * @param string $token
     *
     * @return \RetailCrm\Interfaces\AuthenticatorInterface
     */
    protected function getTokenAuthenticator(string $token): AuthenticatorInterface
    {
        return new TokenAuthenticator($token);
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
            $factory = $this->getContainer()->get(FileItemFactoryInterface::class);
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

    /**
     * @param int                                    $code
     * @param object|array|string $response
     *
     * @return \Psr\Http\Message\ResponseInterface
     * @throws InvalidArgumentException
     */
    protected function responseJson(int $code, $response): ResponseInterface
    {
        /** @var \JMS\Serializer\SerializerInterface $serializer */
        $serializer = $this->getContainer()->get(Constants::SERIALIZER);
        $responseFactory = Psr17FactoryDiscovery::findResponseFactory();
        $streamFactory = Psr17FactoryDiscovery::findStreamFactory();
        $data = null;

        switch (gettype($response)) {
            case 'string':
                $data = $streamFactory->createStream($response);
                break;
            case 'array':
            case 'object':
                $data = $streamFactory->createStream($serializer->serialize($response, 'json'));
                break;
            default:
                throw new InvalidArgumentException(sprintf(
                    'Expected string, object, or array, got "%s"',
                    gettype($response)
                ));
        }

        return $responseFactory->createResponse($code)
            ->withHeader('Content-Type', 'application/json')
            ->withBody($data);
    }

    /**
     * @return string
     */
    protected static function getEnvAppKey(): string
    {
        return self::getenv('APP_KEY', 'appKey');
    }

    /**
     * @return string
     */
    protected static function getEnvToken(): string
    {
        return self::getenv('SESSION', 'test');
    }

    /**
     * @param string $variable
     * @param mixed  $default
     *
     * @return mixed|null
     */
    protected static function getenv(string $variable, $default = null)
    {
        if (!array_key_exists($variable, $_ENV)) {
            return $default;
        }

        return $_ENV[$variable];
    }

    /**
     * @return \Http\Mock\Client
     */
    protected static function getMockClient(): MockClient
    {
        $client = new MockClient();
        $client->setDefaultException(new MatcherException());
        return $client;
    }

    /**
     * @return \Psr\Http\Client\ClientInterface
     */
    protected static function getCurlClient(): ClientInterface
    {
        return new CurlClient();
    }

    /**
     * @param \Psr\Http\Message\StreamInterface $stream
     *
     * @return string
     */
    protected static function getStreamData(StreamInterface $stream): string
    {
        $data = '';

        if ($stream->isSeekable()) {
            $data = $stream->__toString();
            $stream->seek(0);
        } else {
            $data = $stream->getContents();
        }

        return $data;
    }
}
