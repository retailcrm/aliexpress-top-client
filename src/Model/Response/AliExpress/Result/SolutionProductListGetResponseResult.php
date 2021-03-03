<?php
/**
 * PHP version 7.3
 *
 * @category SolutionProductListGetResponseResult
 * @package  RetailCrm\Model\Response\AliExpress\Result
 */

namespace RetailCrm\Model\Response\AliExpress\Result;

use RetailCrm\Model\Response\AliExpress\Result\Interfaces\ErrorInterface;
use JMS\Serializer\Annotation as JMS;
use RetailCrm\Model\Response\AliExpress\Result\Traits\SuccessTrait;

/**
 * Class SolutionProductListGetResponseResult
 *
 * @category SolutionProductListGetResponseResult
 * @package  RetailCrm\Model\Response\AliExpress\Result
 */
class SolutionProductListGetResponseResult implements ErrorInterface
{
    use SuccessTrait;

    /**
     * @var int $productCount
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("product_count")
     */
    public $productCount;

    /**
     * @var int $currentPage
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("current_page")
     */
    public $currentPage;

    /**
     * @var int $totalPage
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("total_page")
     */
    public $totalPage;

    /**
     * @var string $errorMsg
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("error_msg")
     */
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

    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\Entity\ItemDisplayDtoList $aeopAEProductDisplayDtoList
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Result\Entity\ItemDisplayDtoList")
     * @JMS\SerializedName("aeop_a_e_product_display_d_t_o_list")
     */
    public $aeopAEProductDisplayDtoList;
}
