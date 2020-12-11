<?php
/**
 * PHP version 7.3
 *
 * @category SolutionProductSchemaGetResponse
 * @package  RetailCrm\Model\Response\AliExpress
 */

namespace RetailCrm\Model\Response\AliExpress;

use RetailCrm\Model\Response\AliExpress\Data\SolutionProductSchemaGetResponseData;
use RetailCrm\Model\Response\BaseResponse;
use JMS\Serializer\Annotation as JMS;

/**
 * Class SolutionProductSchemaGetResponse
 *
 * @category SolutionProductSchemaGetResponse
 * @package  RetailCrm\Model\Response\AliExpress
 */
class SolutionProductSchemaGetResponse extends BaseResponse
{
    /**
     * @var SolutionProductSchemaGetResponseData $responseData
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Data\SolutionProductSchemaGetResponseData")
     * @JMS\SerializedName("aliexpress_solution_product_schema_get_response")
     */
    public $responseData;
}
