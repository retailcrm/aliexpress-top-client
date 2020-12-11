<?php
/**
 * PHP version 7.3
 *
 * @category SingleItemResponseDto
 * @package  RetailCrm\Model\Response\AliExpress\Result
 */

namespace RetailCrm\Model\Response\AliExpress\Result;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SingleItemResponseDto
 *
 * @category SingleItemResponseDto
 * @package  RetailCrm\Model\Response\AliExpress\Result
 */
class SingleItemResponseDto
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\ItemExecutionResult $itemExecutionResult
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Result\ItemExecutionResult")
     * @JMS\SerializedName("item_execution_result")
     * @JMS\Groups(groups={"InlineJsonBody"})
     */
    public $itemExecutionResult;

    /**
     * @var string $itemContentId
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("item_content_id")
     */
    public $itemContentId;
}
