<?php

/**
 * PHP version 7.3
 *
 * @category TopClientFactory
 * @package  RetailCrm\Factory
 */
namespace RetailCrm\Factory;

use RetailCrm\Builder\ContainerBuilder;
use RetailCrm\Builder\TopClientBuilder;
use RetailCrm\Component\AppData;
use RetailCrm\Component\Authenticator\TokenAuthenticator;
use RetailCrm\TopClient\TopClient;

/**
 * Class TopClientFactory
 *
 * @category TopClientFactory
 * @package  RetailCrm\Factory
 */
class TopClientFactory
{
    /**
     * Create new TopClient
     *
     * @param string $serviceUrl
     * @param string $appKey
     * @param string $appSecret
     * @param string $token
     *
     * @return \RetailCrm\TopClient\TopClient
     * @throws \RetailCrm\Component\Exception\ValidationException
     */
    public static function createClient(
        string $serviceUrl,
        string $appKey,
        string $appSecret,
        string $token = ''
    ): TopClient {
        $appData = new AppData($serviceUrl, $appKey, $appSecret);
        $builder = TopClientBuilder::create()
            ->setContainer(ContainerBuilder::create()->build())
            ->setAppData($appData);

        if ('' !== $token) {
            $builder->setAuthenticator(new TokenAuthenticator($token));
        }

        return $builder->build();
    }
}
