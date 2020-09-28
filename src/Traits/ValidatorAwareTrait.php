<?php

/**
 * PHP version 7.3
 *
 * @category ValidatorAwareTrait
 * @package  RetailCrm\Traits
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Traits;

use Symfony\Component\Validator\Constraints as Assert;
use RetailCrm\Component\Exception\ValidationException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Trait ValidatorAwareTrait
 *
 * @category ValidatorAwareTrait
 * @package  RetailCrm\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
trait ValidatorAwareTrait
{
    /**
     * @var ValidatorInterface $validator
     * @Assert\NotNull(message="Validator should be provided")
     */
    protected $validator;

    /**
     * @param \Symfony\Component\Validator\Validator\ValidatorInterface $validator
     */
    public function setValidator(ValidatorInterface $validator): void
    {
        $this->validator = $validator;
    }

    /**
     * @param mixed $item
     *
     * @throws \RetailCrm\Component\Exception\ValidationException
     */
    protected function validate($item): void
    {
        $violations = $this->validator->validate($item);

        if ($violations->count()) {
            throw new ValidationException("Invalid data", $violations);
        }
    }
}
