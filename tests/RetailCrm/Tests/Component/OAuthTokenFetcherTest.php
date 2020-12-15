<?php
/**
 * PHP version 7.3
 *
 * @category OAuthTokenFetcherTest
 * @package  RetailCrm\Tests\Component
 */

namespace RetailCrm\Tests\Component;

use RetailCrm\Builder\TopClientBuilder;
use RetailCrm\Test\RequestMatcher;
use RetailCrm\Test\TestCase;

/**
 * Class OAuthTokenFetcherTest
 *
 * @category OAuthTokenFetcherTest
 * @package  RetailCrm\Tests\Component
 */
class OAuthTokenFetcherTest extends TestCase
{
    public function testFetchToken()
    {
        $jsonResponse = <<<'EOF'
{
  "access_token": "accessToken",
  "refresh_token": "refreshToken",
  "w1_valid": 1,
  "refresh_token_valid_time": 1602676186888,
  "w2_valid": 1,
  "user_id": "0000000000",
  "expire_time": 1,
  "r2_valid": 1,
  "locale": "zh_CN",
  "r1_valid": 1,
  "sp": "ae",
  "user_nick": "ru0000000000"
}
EOF;
        $mock = self::getMockClient();
        $mock->on(
            RequestMatcher::createMatcher('oauth.aliexpress.com')
                ->setPath('/token')
                ->setOptionalPostFields([
                    'code' => 'oauthCode',
                    'state' => '{"accountId":5,"token":"login-5f86e5579dad92"}'
                ]),
            $this->responseJson(200, $jsonResponse)
        );
        $tokenFetcher = TopClientBuilder::create()
            ->setContainer($this->getContainer($mock))
            ->setAppData($this->getEnvAppData())
            ->setAuthenticator($this->getEnvTokenAuthenticator())
            ->build()
            ->getTokenFetcher();
        $response = $tokenFetcher->fetchToken('oauthCode', '{"accountId":5,"token":"login-5f86e5579dad92"}');

        self::assertEquals('accessToken', $response->accessToken);
        self::assertEquals('refreshToken', $response->refreshToken);
    }
}
