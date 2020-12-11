<?php
/**
 * PHP version 7.3
 *
 * @category ItemExecutionResult
 * @package  RetailCrm\Model\Response\AliExpress\Result
 */

namespace RetailCrm\Model\Response\AliExpress\Result;

use JMS\Serializer\Annotation as JMS;
use RetailCrm\Model\Response\AliExpress\Result\Traits\SuccessTrait;

/**
 * Class ItemExecutionResult
 *
 * @category ItemExecutionResult
 * @package  RetailCrm\Model\Response\AliExpress\Result
 */
class ItemExecutionResult
{
    use SuccessTrait;

    /**
     * @var int $productId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("productId")
     */
    public $productId;
}
