<?php

namespace RetailCrm\Test;

use Psr\Container\ContainerInterface;
use RetailCrm\Component\Environment;
use RetailCrm\Factory\ContainerFactory;

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

    public function getContainer($recreate = false): ContainerInterface
    {
        if (null === $this->container || $recreate) {
            $this->container = ContainerFactory::withEnv(Environment::TEST)
                ->withClient(new \GuzzleHttp\Client())
                ->create();
        }

        return $this->container;
    }
}
