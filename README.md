[![Build Status](https://img.shields.io/travis/retailcrm/aliexpress-top-client/master.svg?style=for-the-badge)](https://travis-ci.org/rretailcrm/aliexpress-top-client)
[![Covarage](https://img.shields.io/codecov/c/gh/retailcrm/aliexpress-top-client/master.svg?style=for-the-badge)](https://codecov.io/gh/rretailcrm/aliexpress-top-client)
[![Latest stable](https://img.shields.io/packagist/v/retailcrm/aliexpress-top-client.svg?style=for-the-badge)](https://packagist.org/packages/rretailcrm/aliexpress-top-client)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/retailcrm/aliexpress-top-client.svg?style=for-the-badge)](https://packagist.org/packages/rretailcrm/aliexpress-top-client)

# AliExpress TOP API client
API client implementation for AliExpress TOP.

## Usage
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

$appData = new AppData(AppData::OVERSEAS_ENDPOINT, 'appKey', 'appSecret');
$client = ClientBuilder::create()
            ->setContainer(ContainerBuilder::create()->build())
            ->setAppData($appData)
            ->setAuthenticator(new TokenAuthenticator('session token here'))
            ->build();
```

3. Create and fill request data. All requests and responses use the same naming: part of the namespace is the first word in the request name, and everything else is in the request DTO class name. Requests live under `RetailCrm\Model\Request` namespace, and responses can be found in the `RetailCrm\Model\Response` namespace.
Let's use `taobao.httpdns.get` request as an example. It's first word is the `taobao`, so, this request can be found under `RetailCrm\Model\Request\Taobao` namespace, and it's class name is `HttpDnsGetRequest`. You can instantiate it with this code:
```php
use RetailCrm\Model\Request\Taobao\HttpDnsGetRequest;

$request = new HttpDnsGetRequest();
```
4. Send request using `Client::sendRequest` or `Client::sendAuthenticatedRequest` (you can't send authenticated request using client without authenticator). `taobao.httpdns.get` can be sent like this:
```php
/** @var \RetailCrm\Model\Response\Taobao\HttpDnsGetResponse $response */
$response = $client->sendRequest(new HttpDnsGetRequest());
```
This particular request doesn't require authorization, so, it can be sent via `Client::sendRequest` method. For any other requests which require authorization you must use `Client::sendAuthenticatedRequest` method (an example of such request would be `aliexpress.solution.seller.category.tree.query`, which class FQN is `\RetailCrm\Model\Request\AliExpress\SolutionSellerCategoryTreeQuery`).

**Friendly note.** Use response type annotations. Both client methods which returns responses actually returns `ResponseInterface` (not the PSR one). Actual response type will be determined by the request model. Your IDE will not recognize any response options unless you put a proper type annotation for the response variable.
**Another friendly note.**

## Customization
This library uses Container pattern under the hood. You can pass additional dependencies using `ContainerBuilder`. For example:
```php
use Http\Client\Curl\Client;
use Nyholm\Psr7\Factory\Psr17Factory;
use RetailCrm\Component\AppData;
use RetailCrm\Component\Environment;
use RetailCrm\Component\Logger\StdoutLogger;
use RetailCrm\Builder\ClientBuilder;
use RetailCrm\Builder\ContainerBuilder;

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
            ->build();
```
Logger should implement `Psr\Log\LoggerInterface` (PSR-3), HTTP client should implement `Psr\Http\Client\ClientInterface` (PSR-18), HTTP objects must be compliant to PSR-7.

You can use your own container - it must be compliant to PSR-11. This is strongly discouraged because it'll be much easier to just integrate library with your own application, and your own DI system.
