<?php
/**
 * PHP version 7.3
 *
 * @category SolutionOrderFulfill
 * @package  RetailCrm\Model\Request\AliExpress
 */

namespace RetailCrm\Model\Request\AliExpress;

use RetailCrm\Model\Request\BaseRequest;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;
use RetailCrm\Model\Response\AliExpress\SolutionOrderFulfillResponse;

/**
 * Class SolutionOrderFulfill
 *
 * @category SolutionOrderFulfill
 * @package  RetailCrm\Model\Request\AliExpress
 */
class SolutionOrderFulfill extends BaseRequest
{
    /**
     * @var string $serviceName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("service_name")
     * @Assert\NotBlank()
     */
    public $serviceName;

    /**
     * @var string $trackingWebsite
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("tracking_website")
     */
    public $trackingWebsite;

    /**
     * @var string $outRef
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("out_ref")
     * @Assert\NotBlank()
     */
    public $outRef;

    /**
     * @var string $sendType
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("send_type")
     * @Assert\NotBlank()
     */
    public $sendType;

    /**
     * @var string $description
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     */
    public $description;

    /**
     * @var string $logisticsNo
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("logistics_no")
     * @Assert\NotBlank()
     */
    public $logisticsNo;

    /**
     * @inheritDoc
     */
    public function getMethod(): string
    {
        return 'aliexpress.solution.order.fulfill';
    }

    /**
     * @inheritDoc
     */
    public function getExpectedResponse(): string
    {
        return SolutionOrderFulfillResponse::class;
    }
}
