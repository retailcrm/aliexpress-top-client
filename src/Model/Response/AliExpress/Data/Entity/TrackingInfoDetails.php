<?php
/**
 * PHP version 7.3
 *
 * @category TrackingInfoDetails
 * @package  RetailCrm\Model\Response\AliExpress\Data\Entity
 */

namespace RetailCrm\Model\Response\AliExpress\Data\Entity;

use DateTime;
use JMS\Serializer\Annotation as JMS;

/**
 * Class TrackingInfoDetails
 *
 * @category TrackingInfoDetails
 * @package  RetailCrm\Model\Response\AliExpress\Data\Entity
 */
class TrackingInfoDetails
{
    /**
     * @var string $eventDesc
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("event_desc")
     */
    public $eventDesc;

    /**
     * @var string $signedName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("signed_name")
     */
    public $signedName;

    /**
     * @var string $status
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("status")
     */
    public $status;

    /**
     * @var string $address
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("address")
     */
    public $address;

    /**
     * @var DateTime $eventDate
     *
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\SerializedName("event_date")
     */
    public $eventDate;
}
