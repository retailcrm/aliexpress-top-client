<?php

/**
 * PHP version 7.3
 *
 * @category SerializerAwareTrait
 * @package  RetailCrm\Traits
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Traits;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Trait SerializerAwareTrait
 *
 * @category SerializerAwareTrait
 * @package  RetailCrm\Traits
 * @author   Joel Wurtz <joel.wurtz@gmail.com>
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
trait SerializerAwareTrait
{
    /**
     * @var SerializerInterface $serializer
     * @Assert\NotNull(message="Serializer should be provided")
     */
    protected $serializer;

    /**
     * @param \Symfony\Component\Serializer\SerializerInterface $serializer
     */
    public function setSerializer(SerializerInterface $serializer): void
    {
        $this->serializer = $serializer;
    }
}
