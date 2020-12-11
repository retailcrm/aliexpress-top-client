<?php
/**
 * PHP version 7.3
 *
 * @category ErrorTrait
 * @package  RetailCrm\Model\Response\AliExpress\Result\Traits
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Traits;

use JMS\Serializer\Annotation as JMS;

/**
 * Trait ErrorTrait
 *
 * @category ErrorTrait
 * @package  RetailCrm\Model\Response\AliExpress\Result\Traits
 */
trait ErrorTrait
{
    /**
     * @var string $errorCode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("error_code")
     */
    public $errorCode;

    /**
     * @var string $errorMessage
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("error_message")
     */
    public $errorMessage;

    /**
     * ErrorInterface implementation.
     *
     * @return ?string
     */
    public function getErrorCode(): ?string
    {
        return $this->errorCode;
    }

    /**
     * ErrorInterface implementation.
     *
     * @return ?string
     */
    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }
}
