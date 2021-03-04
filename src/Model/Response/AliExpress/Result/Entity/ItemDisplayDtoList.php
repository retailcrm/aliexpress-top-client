<?php
/**
 * PHP version 7.3
 *
 * @category ItemDisplayDtoList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class ItemDisplayDtoList
 *
 * @category ItemDisplayDtoList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */
class ItemDisplayDtoList
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\Entity\ItemDisplayDto[] $itemDisplayDto
     *
     * @JMS\Type("array<RetailCrm\Model\Response\AliExpress\Result\Entity\ItemDisplayDto>")
     * @JMS\SerializedName("item_display_dto")
     */
    public $itemDisplayDto;
}
