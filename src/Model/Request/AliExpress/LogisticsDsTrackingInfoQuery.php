<?php
/**
 * PHP version 7.3
 *
 * @category LogisticsDsTrackingInfoQuery
 * @package  RetailCrm\Model\Request\AliExpress
 */

namespace RetailCrm\Model\Request\AliExpress;

use JMS\Serializer\Annotation as JMS;
use RetailCrm\Model\Request\BaseRequest;
use Symfony\Component\Validator\Constraints as Assert;
use RetailCrm\Model\Response\AliExpress\LogisticsDsTrackingInfoQueryResponse;

/**
 * Class LogisticsDsTrackingInfoQuery
 *
 * @category LogisticsDsTrackingInfoQuery
 * @package  RetailCrm\Model\Request\AliExpress
 */
class LogisticsDsTrackingInfoQuery extends BaseRequest
{
    /**
     * @var string $logisticsNo
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("logistics_no")
     * @Assert\NotBlank()
     */
    public $logisticsNo;

    /**
     * @var string $origin
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("origin")
     * @Assert\NotBlank()
     */
    public $origin = 'ESCROW';

    /**
     * @var string $outRef
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("out_ref")
     * @Assert\NotBlank()
     */
    public $outRef;

    /**
     * @var string $serviceName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("service_name")
     * @Assert\NotBlank()
     */
    public $serviceName;

    /**
     * @var string $toArea
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("to_area")
     * @Assert\NotBlank()
     * @Assert\Choice(choices=RetailCrm\Model\Enum\DropshippingAreas::DROPSHIPPING_AREAS)
     */
    public $toArea;

    /**
     * @inheritDoc
     */
    public function getMethod(): string
    {
        return 'aliexpress.logistics.ds.trackinginfo.query';
    }

    /**
     * @inheritDoc
     */
    public function getExpectedResponse(): string
    {
        return LogisticsDsTrackingInfoQueryResponse::class;
    }
}
