<?php

/**
 * PHP version 7.3
 *
 * @category ContainerAwareTrait
 * @package  RetailCrm\Traits
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Traits;

use Psr\Container\ContainerInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Trait ContainerAwareTrait
 *
 * @category ContainerAwareTrait
 * @package  RetailCrm\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
trait ContainerAwareTrait
{
    /**
     * @var ContainerInterface $container
     * @Assert\NotNull(message="Container should be provided")
     */
    protected $container;

    /**
     * @param \Psr\Container\ContainerInterface $container
     *
     * @return \RetailCrm\Traits\ContainerAwareTrait
     */
    public function setContainer(ContainerInterface $container): self
    {
        $this->container = $container;
        return $this;
    }

    /**
     * @return \Psr\Container\ContainerInterface
     */
    public function getContainer(): ContainerInterface
    {
        return $this->container;
    }
}
