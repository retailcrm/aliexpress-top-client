<?php
/**
 * PHP version 7.3
 *
 * @category SingleItemResponseDtoList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SingleItemResponseDtoList
 *
 * @category SingleItemResponseDtoList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */
class SingleItemResponseDtoList
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\SingleItemResponseDto[] $singleItemResponseDto
     *
     * @JMS\Type("array<RetailCrm\Model\Response\AliExpress\Result\SingleItemResponseDto>")
     * @JMS\SerializedName("single_item_response_dto")
     */
    public $singleItemResponseDto;
}
