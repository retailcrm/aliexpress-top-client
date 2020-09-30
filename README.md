[![Build Status](https://img.shields.io/travis/retailcrm/aliexpress-top-client/master.svg?style=for-the-badge)](https://travis-ci.org/rretailcrm/aliexpress-top-client)
[![Covarage](https://img.shields.io/codecov/c/gh/retailcrm/aliexpress-top-client/master.svg?style=for-the-badge)](https://codecov.io/gh/rretailcrm/aliexpress-top-client)
[![Latest stable](https://img.shields.io/packagist/v/retailcrm/aliexpress-top-client.svg?style=for-the-badge)](https://packagist.org/packages/rretailcrm/aliexpress-top-client)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/retailcrm/aliexpress-top-client.svg?style=for-the-badge)](https://packagist.org/packages/rretailcrm/aliexpress-top-client)

# AliExpress TOP API client
API client implementation for AliExpress TOP.

# Usage
1. This library uses `php-http/httplug` under the hood. If you don't want to bother with details, just install library and it's dependencies through Composer:
```sh
composer require php-http/curl-client nyholm/psr7 php-http/message retailcrm/aliexpress-top-client
```
Details about those third-party libraries and why you need to install them can be found [here](http://docs.php-http.org/en/latest/httplug/users.html).

2. Instantiate client like that:
```php
use RetailCrm\Component\AppData;
use RetailCrm\Builder\ClientBuilder;
use RetailCrm\Builder\ContainerBuilder;
use RetailCrm\Component\Authenticator\TokenAuthenticator;

$authenticator = new TokenAuthenticator('appKey', 'token');
$appData = new AppData(AppData::OVERSEAS_ENDPOINT, 'appKey', 'appSecret');
$client = ClientBuilder::create()
            ->setContainer(ContainerBuilder::create()->build())
            ->setAppData($appData)
            ->setAuthenticator($authenticator)
            ->build();
```

# Details
This library uses Container pattern under the hood. You can pass additional dependencies using `ContainerBuilder`. For example:
```php
use Http\Client\Curl\Client;
use Nyholm\Psr7\Factory\Psr17Factory;
use RetailCrm\Component\AppData;
use RetailCrm\Component\Environment;
use RetailCrm\Component\Logger\StdoutLogger;
use RetailCrm\Builder\ClientBuilder;
use RetailCrm\Builder\ContainerBuilder;
use RetailCrm\Component\Authenticator\TokenAuthenticator;

$client = new Client();
$logger = new StdoutLogger();
$factory = new Psr17Factory();
$authenticator = new TokenAuthenticator('appKey', 'token');
$appData = new AppData(AppData::OVERSEAS_ENDPOINT, 'appKey', 'appSecret');
$container = ContainerBuilder::create()
            ->setEnv(Environment::TEST)
            ->setClient($client)
            ->setLogger($logger)
            ->setStreamFactory($factory)
            ->setRequestFactory($factory)
            ->setUriFactory($factory)
            ->build();
$client = ClientBuilder::create()
            ->setContainer($container)
            ->setAppData($appData)
            ->setAuthenticator($authenticator)
            ->build();
```
Logger should implement `Psr\Log\LoggerInterface` (PSR-3), HTTP client should implement `Psr\Http\Client\ClientInterface` (PSR-18), HTTP objects must be compliant to PSR-7.
