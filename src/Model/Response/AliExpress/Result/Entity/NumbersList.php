<?php
/**
 * PHP version 7.3
 *
 * @category NumbersList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class NumbersList
 *
 * @category NumbersList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */
class NumbersList
{
    /**
     * @var int[] $number
     *
     * @JMS\Type("array<int>")
     * @JMS\SerializedName("number")
     */
    public $number;
}
