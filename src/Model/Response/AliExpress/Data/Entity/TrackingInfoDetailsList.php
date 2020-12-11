<?php
/**
 * PHP version 7.3
 *
 * @category TrackingInfoDetailsList
 * @package  RetailCrm\Model\Response\AliExpress\Data\Entity
 */

namespace RetailCrm\Model\Response\AliExpress\Data\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class TrackingInfoDetailsList
 *
 * @category TrackingInfoDetailsList
 * @package  RetailCrm\Model\Response\AliExpress\Data\Entity
 */
class TrackingInfoDetailsList
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Data\Entity\TrackingInfoDetails[] $details
     *
     * @JMS\Type("array<RetailCrm\Model\Response\AliExpress\Data\Entity\TrackingInfoDetails>")
     * @JMS\SerializedName("details")
     */
    public $details;
}
