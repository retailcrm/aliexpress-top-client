<?php
/**
 * PHP version 7.3
 *
 * @category SolutionProductSchemaGetResponseResult
 * @package  RetailCrm\Model\Response\AliExpress\Result
 */

namespace RetailCrm\Model\Response\AliExpress\Result;

use JMS\Serializer\Annotation as JMS;
use RetailCrm\Model\Response\AliExpress\Result\Interfaces\ErrorInterface;
use RetailCrm\Model\Response\AliExpress\Result\Traits\ErrorTrait;
use RetailCrm\Model\Response\AliExpress\Result\Traits\SuccessTrait;

/**
 * Class SolutionProductSchemaGetResponseResult
 *
 * @category SolutionProductSchemaGetResponseResult
 * @package  RetailCrm\Model\Response\AliExpress\Result
 */
class SolutionProductSchemaGetResponseResult implements ErrorInterface
{
    use ErrorTrait;
    use SuccessTrait;

    /**
     * Product Schema in JSON Schema format. Shouldn't be deserialized.
     *
     * @var string $schema
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("schema")
     */
    public $schema;
}
