<?php
/**
 * PHP version 7.3
 *
 * @category SingleItemResponseDto
 * @package  RetailCrm\Model\Response\AliExpress\Result
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Result;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SingleItemResponseDto
 *
 * @category SingleItemResponseDto
 * @package  RetailCrm\Model\Response\AliExpress\Result
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
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
