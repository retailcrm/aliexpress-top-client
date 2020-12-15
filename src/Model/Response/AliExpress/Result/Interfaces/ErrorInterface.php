<?php
/**
 * PHP version 7.3
 *
 * @category ErrorInterface
 * @package  RetailCrm\Model\Response\AliExpress\Result\Interfaces
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Interfaces;

/**
 * Interface ErrorInterface. Should be used with ErrorTrait.
 *
 * @category ErrorInterface
 * @package  RetailCrm\Model\Response\AliExpress\Result\Interfaces
 */
interface ErrorInterface
{
    /**
     * @return ?string
     */
    public function getErrorCode(): ?string;

    /**
     * @return ?string
     */
    public function getErrorMessage(): ?string;
}
