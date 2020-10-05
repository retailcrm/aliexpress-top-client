<?php
/**
 * PHP version 7.3
 *
 * @category OrderProductDtoList
 * @package  RetailCrm\Model\Entity
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class OrderProductDtoList
 *
 * @category OrderProductDtoList
 * @package  RetailCrm\Model\Entity
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
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
