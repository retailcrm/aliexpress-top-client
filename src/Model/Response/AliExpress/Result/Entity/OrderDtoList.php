<?php
/**
 * PHP version 7.3
 *
 * @category OrderDtoList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class OrderDtoList
 *
 * @category OrderDtoList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
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
