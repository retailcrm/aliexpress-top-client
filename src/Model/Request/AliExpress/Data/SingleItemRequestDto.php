<?php
/**
 * PHP version 7.3
 *
 * @category SingleItemRequestDto
 * @package  RetailCrm\Model\Request\AliExpress\Data
 */

namespace RetailCrm\Model\Request\AliExpress\Data;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SingleItemRequestDto
 *
 * @category SingleItemRequestDto
 * @package  RetailCrm\Model\Request\AliExpress\Data
 */
class SingleItemRequestDto
{
    /**
     * Any value here will be serialized to JSON before serializing entire model.
     * Only array and RequestDtoInterface are viable here.
     *
     * @var \RetailCrm\Interfaces\RequestDtoInterface|array $itemContent
     *
     * @JMS\Type("RetailCrm\Interfaces\RequestDtoInterface")
     * @JMS\SerializedName("item_content")
     */
    public $itemContent;

    /**
     * @var string $itemContentId
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("item_content_id")
     */
    public $itemContentId;
}
