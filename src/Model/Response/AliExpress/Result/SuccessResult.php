<?php
/**
 * PHP version 7.3
 *
 * @category SuccessResult
 * @package  RetailCrm\Model\Response\AliExpress\Result
 */

namespace RetailCrm\Model\Response\AliExpress\Result;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SuccessResult
 *
 * @category SuccessResult
 * @package  RetailCrm\Model\Response\AliExpress\Result
 */
class SuccessResult
{
    /**
     * @var bool $resultSuccess
     *
     * @JMS\Type("bool")
     * @JMS\SerializedName("result_success")
     */
    public $resultSuccess;
}
