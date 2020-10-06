<?php
/**
 * PHP version 7.3
 *
 * @category TrackingInfoDetailsList
 * @package  RetailCrm\Model\Response\AliExpress\Data\Entity
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Data\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class TrackingInfoDetailsList
 *
 * @category TrackingInfoDetailsList
 * @package  RetailCrm\Model\Response\AliExpress\Data\Entity
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
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
