<?php
/**
 * PHP version 7.3
 *
 * @category LogisticsDsTrackingInfoQueryResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 */

namespace RetailCrm\Model\Response\AliExpress\Data;

use JMS\Serializer\Annotation as JMS;

/**
 * Class LogisticsDsTrackingInfoQueryResponseData
 *
 * @category LogisticsDsTrackingInfoQueryResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 */
class LogisticsDsTrackingInfoQueryResponseData
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Data\Entity\TrackingInfoDetailsList $details
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Data\Entity\TrackingInfoDetailsList")
     * @JMS\SerializedName("details")
     */
    public $details;

    /**
     * @var string $officialWebsite
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("official_website")
     */
    public $officialWebsite;

    /**
     * @var string $officialWebsite
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("error_desc")
     */
    public $errorDesc;

    /**
     * @var bool $resultSuccess
     *
     * @JMS\Type("bool")
     * @JMS\SerializedName("result_success")
     */
    public $resultSuccess;
}
