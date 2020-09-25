<?php

/**
 * PHP version 7.4
 *
 * @category EnvironmentAwareFactoryInterface
 * @package  RetailCrm\Factory
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Factory;

use Psr\Http\Client\ClientInterface;
use RetailCrm\Component\Environment;

/**
 * Interface EnvironmentAwareFactoryInterface
 *
 * @category EnvironmentAwareFactoryInterface
 * @package  RetailCrm\Factory
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
interface EnvironmentAwareFactoryInterface
{
    /**
     * @param string $environmentType
     *
     * @return \RetailCrm\Factory\EnvironmentAwareFactoryInterface
     */
    public static function withEnv(string $environmentType = Environment::DEV): EnvironmentAwareFactoryInterface;

    /**
     * @return \RetailCrm\Component\Environment
     */
    public function create(ClientInterface $httpClient): Environment;
}
