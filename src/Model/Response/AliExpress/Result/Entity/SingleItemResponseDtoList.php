<?php
/**
 * PHP version 7.4
 *
 * @category SingleItemResponseDtoList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SingleItemResponseDtoList
 *
 * @category SingleItemResponseDtoList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
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
