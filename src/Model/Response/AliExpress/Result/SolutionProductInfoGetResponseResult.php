<?php
/**
 * PHP version 7.3
 *
 * @category SolutionProductInfoGetResponseResult
 * @package  RetailCrm\Model\Response\AliExpress\Result
 */

namespace RetailCrm\Model\Response\AliExpress\Result;

use RetailCrm\Model\Response\AliExpress\Result\Interfaces\ErrorInterface;
use JMS\Serializer\Annotation as JMS;
use RetailCrm\Model\Response\AliExpress\Result\Traits\SuccessTrait;

/**
 * Class SolutionProductInfoGetResponseResult
 *
 * @category SolutionProductInfoGetResponseResult
 * @package  RetailCrm\Model\Response\AliExpress\Result
 */
class SolutionProductInfoGetResponseResult implements ErrorInterface
{
    use SuccessTrait;

    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\Entity\ProductSkuDtoList $aeopAEProductSkus
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Result\Entity\ProductSkuDtoList")
     * @JMS\SerializedName("aeop_ae_product_s_k_us")
     */
    public $aeopAEProductSkus;

    /**
     * @var int $productId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("product_id")
     */
    public $productId;

    public $errorMsg;

    /**
     * @var string errorCode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("error_code")
     */
    public $errorCode;

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
        return $this->errorMsg;
    }
}
