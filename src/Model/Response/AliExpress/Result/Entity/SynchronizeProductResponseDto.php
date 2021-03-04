<?php
/**
 * PHP version 7.3
 *
 * @category SynchronizeProductResponseDto
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SynchronizeProductResponseDto
 *
 * @category SynchronizeProductResponseDto
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */
class SynchronizeProductResponseDto
{
    /**
     * @var string $errorCode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("error_code")
     */
    public $errorCode;
    /**
     * @var string $errorCode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("error_message")
     */
    public $errorMessage;
    /**
     * @var int $errorCode
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("product_id")
     */
    public $productId;
}
