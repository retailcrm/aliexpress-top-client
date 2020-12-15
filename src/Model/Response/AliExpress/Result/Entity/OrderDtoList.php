<?php
/**
 * PHP version 7.3
 *
 * @category OrderDtoList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class OrderDtoList
 *
 * @category OrderDtoList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */
class OrderDtoList
{
    /**
     * @var \RetailCrm\Model\Entity\OrderDto[] $orderDto
     *
     * @JMS\Type("array<RetailCrm\Model\Entity\OrderDto>")
     * @JMS\SerializedName("order_dto")
     */
    public $orderDto;
}
