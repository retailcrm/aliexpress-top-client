<?php
/**
 * PHP version 7.3
 *
 * @category OrderProductDtoList
 * @package  RetailCrm\Model\Entity
 */

namespace RetailCrm\Model\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class OrderProductDtoList
 *
 * @category OrderProductDtoList
 * @package  RetailCrm\Model\Entity
 */
class OrderProductDtoList
{
    /**
     * @var \RetailCrm\Model\Entity\OrderProductDto[] $orderProductDto
     *
     * @JMS\Type("array<RetailCrm\Model\Entity\OrderProductDto>")
     * @JMS\SerializedName("order_product_dto")
     */
    public $orderProductDto;
}
