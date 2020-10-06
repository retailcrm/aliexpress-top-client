<?php
/**
 * PHP version 7.3
 *
 * @category AeopStoreInfo
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AeopStoreInfo
 *
 * @category AeopStoreInfo
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class AeopStoreInfo
{
    /**
     * @var string $communicationRating
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("communication_rating")
     */
    public $communicationRating;

    /**
     * @var string $itemAsDescripedRating
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("item_as_descriped_rating")
     */
    public $itemAsDescripedRating;

    /**
     * @var string $shippingSpeedRating
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("shipping_speed_rating")
     */
    public $shippingSpeedRating;

    /**
     * @var int $storeId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("store_id")
     */
    public $storeId;

    /**
     * @var string $storeName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("store_name")
     */
    public $storeName;
}
