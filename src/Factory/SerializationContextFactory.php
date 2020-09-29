<?php

/**
 * PHP version 7.3
 *
 * @category SerializationContextFactory
 * @package  RetailCrm\Factory
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Factory;

use JMS\Serializer\ContextFactory\SerializationContextFactoryInterface;
use JMS\Serializer\SerializationContext;

/**
 * Class SerializationContextFactory
 *
 * @category SerializationContextFactory
 * @package  RetailCrm\Factory
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class SerializationContextFactory implements SerializationContextFactoryInterface
{
    /**
     * @return \JMS\Serializer\SerializationContext
     */
    public function createSerializationContext(): SerializationContext
    {
        return SerializationContext::create()->setSerializeNull(false);
    }
}
