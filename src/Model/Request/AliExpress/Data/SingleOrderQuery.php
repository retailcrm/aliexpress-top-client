<?php
/**
 * PHP version 7.3
 *
 * @category SingleOrderQuery
 * @package  RetailCrm\Model\Request\AliExpress\Data
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Request\AliExpress\Data;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SingleOrderQuery
 *
 * @category SingleOrderQuery
 * @package  RetailCrm\Model\Request\AliExpress\Data
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class SingleOrderQuery
{
    /**
     * @var int $orderId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("order_id")
     */
    public $orderId;
}
