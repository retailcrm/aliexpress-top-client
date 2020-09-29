<?php

/**
 * PHP version 7.3
 *
 * @category ServiceLocator
 * @package  RetailCrm\Component
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Component;

use RetailCrm\Factory\FileItemFactory;
use RetailCrm\Interfaces\ContainerAwareInterface;
use RetailCrm\Interfaces\FileItemFactoryInterface;
use RetailCrm\Traits\ContainerAwareTrait;

/**
 * Class ServiceLocator
 *
 * @category ServiceLocator
 * @package  RetailCrm\Component
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ServiceLocator implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * @return \RetailCrm\Interfaces\FileItemFactoryInterface
     */
    public function getFileItemFactory(): FileItemFactoryInterface
    {
        return $this->getContainer()->get(FileItemFactory::class);
    }
}
