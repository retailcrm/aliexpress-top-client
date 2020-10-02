<?php
/**
 * PHP version 7.3
 *
 * @category SolutionProductSchemaGetResponseResult
 * @package  RetailCrm\Model\Response\AliExpress\Result
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Result;

use JMS\Serializer\Annotation as JMS;
use RetailCrm\Model\Response\AliExpress\Result\Traits\ErrorTrait;
use RetailCrm\Model\Response\AliExpress\Result\Traits\SuccessTrait;

/**
 * Class SolutionProductSchemaGetResponseResult
 *
 * @category SolutionProductSchemaGetResponseResult
 * @package  RetailCrm\Model\Response\AliExpress\Result
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class SolutionProductSchemaGetResponseResult
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
