<?php
/**
 * PHP version 7.3
 *
 * @category SuccessTrait
 * @package  RetailCrm\Model\Response\AliExpress\Result\Traits
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Traits;

use JMS\Serializer\Annotation as JMS;

/**
 * Trait SuccessTrait
 *
 * @category SuccessTrait
 * @package  RetailCrm\Model\Response\AliExpress\Result\Traits
 */
trait SuccessTrait
{
    /**
     * @var bool $success
     *
     * @JMS\Type("bool")
     * @JMS\SerializedName("success")
     */
    public $success;
}
