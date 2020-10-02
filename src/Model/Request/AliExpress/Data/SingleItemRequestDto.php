<?php
/**
 * PHP version 7.3
 *
 * @category SingleItemRequestDto
 * @package  RetailCrm\Model\Request\AliExpress\Data
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Request\AliExpress\Data;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SingleItemRequestDto
 *
 * @category SingleItemRequestDto
 * @package  RetailCrm\Model\Request\AliExpress\Data
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class SingleItemRequestDto
{
    /**
     * @var \RetailCrm\Interfaces\RequestDtoInterface $itemContent
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
