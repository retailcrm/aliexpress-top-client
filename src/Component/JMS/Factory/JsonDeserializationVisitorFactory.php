<?php
/**
 * PHP version 7.3
 *
 * @category JsonDeserializationVisitorFactory
 * @package  RetailCrm\Component\JMS\Factory
 */

namespace RetailCrm\Component\JMS\Factory;

use RetailCrm\Component\JMS\Visitor\Deserialization\JsonDeserializationVisitor;
use JMS\Serializer\Visitor\DeserializationVisitorInterface;
use JMS\Serializer\Visitor\Factory\DeserializationVisitorFactory;

/**
 * Class JsonDeserializationVisitorFactory
 *
 * @category JsonDeserializationVisitorFactory
 * @package  RetailCrm\Component\JMS\Factory
 */
class JsonDeserializationVisitorFactory implements DeserializationVisitorFactory
{
    /**
     * @var int
     */
    private $options = 0;

    /**
     * @var int
     */
    private $depth = 512;

    /**
     * @return \JMS\Serializer\Visitor\DeserializationVisitorInterface
     */
    public function getVisitor(): DeserializationVisitorInterface
    {
        return new JsonDeserializationVisitor($this->options, $this->depth);
    }

    /**
     * @param int $options
     *
     * @return $this
     */
    public function setOptions(int $options): self
    {
        $this->options = $options;
        return $this;
    }

    /**
     * @param int $depth
     *
     * @return $this
     */
    public function setDepth(int $depth): self
    {
        $this->depth = $depth;
        return $this;
    }
}
