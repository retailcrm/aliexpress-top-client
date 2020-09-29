<?php

/**
 * PHP version 7.3
 *
 * @category TestRequest
 * @package  RetailCrm\Test
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Test;

use JMS\Serializer\Annotation as JMS;
use RetailCrm\Interfaces\FileItemInterface;
use RetailCrm\Model\Request\BaseRequest;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class TestRequest
 *
 * @category TestRequest
 * @package  RetailCrm\Test
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class TestSignerRequest extends BaseRequest
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
     * @var string $logisitics_no
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("logisitics_no")
     * @Assert\NotBlank()
     */
    public $logisticsNo;

    /**
     * @var FileItemInterface $document
     *
     * @JMS\Type("FileItemInterface")
     * @JMS\SerializedName("document")
     */
    public $document;

    /**
     * @var \RetailCrm\Interfaces\RequestDtoInterface
     *
     * @JMS\Type("RequestDtoInterface")
     * @JMS\SerializedName("dto")
     */
    public $dto;

    /**
     * Returns method name for this request.
     *
     * @return string
     */
    public function getMethod(): string
    {
        return 'aliexpress.solution.order.fulfill';
    }

    /**
     * @return string
     */
    public function getExpectedResponse(): string
    {
        return '';
    }
}
