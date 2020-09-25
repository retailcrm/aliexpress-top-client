<?php

/**
 * PHP version 7.4
 *
 * @category ValidationException
 * @package  RetailCrm\Component\Exception
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Component\Exception;

use Symfony\Component\Validator\ConstraintViolationListInterface;
use Throwable;

/**
 * Class ValidationException
 *
 * @category ValidationException
 * @package  RetailCrm\Component\Exception
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ValidationException extends \Exception
{
    private ?ConstraintViolationListInterface $violations;

    /**
     * ValidationException constructor.
     *
     * @param string                                                             $message
     * @param \Symfony\Component\Validator\ConstraintViolationListInterface|null $violations
     * @param int                                                                $code
     * @param \Throwable|null                                                    $previous
     */
    public function __construct(
        $message = "",
        ?ConstraintViolationListInterface $violations = null,
        $code = 0,
        Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);

        $this->violations = $violations;
    }

    /**
     * @return \Symfony\Component\Validator\ConstraintViolationListInterface|null
     */
    public function getViolations(): ?ConstraintViolationListInterface
    {
        return $this->violations;
    }
}
