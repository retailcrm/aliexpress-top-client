<?php
/**
 * PHP version 7.3
 *
 * @category AuthorizationUriBuilderTest
 * @package  RetailCrm\Tests\Builder
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Tests\Builder;

use RetailCrm\Builder\AuthorizationUriBuilder;
use RetailCrm\Test\TestCase;

/**
 * Class AuthorizationUriBuilderTest
 *
 * @category AuthorizationUriBuilderTest
 * @package  RetailCrm\Tests\Builder
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class AuthorizationUriBuilderTest extends TestCase
{
    public function testBuild()
    {
        $appData = $this->getEnvAppData();
        $builder = new AuthorizationUriBuilder($appData->getAppKey(), $appData->getRedirectUri(), 'state');
        $result = $builder->build();

        self::assertNotFalse(strpos($result, $appData->getAppKey()));
        self::assertNotFalse(strpos($result, urlencode($appData->getRedirectUri())));
        self::assertNotFalse(strpos($result, urlencode('state')));
    }
}
