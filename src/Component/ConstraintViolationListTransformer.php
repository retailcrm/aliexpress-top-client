<?php
/**
 * PHP version 7.3
 *
 * @category ConstraintViolationListTransformer
 * @package  RetailCrm\Component
 */

namespace RetailCrm\Component;

use Symfony\Component\Validator\ConstraintViolationListInterface;

/**
 * Class ConstraintViolationListTransformer
 *
 * @category ConstraintViolationListTransformer
 * @package  RetailCrm\Component
 */
class ConstraintViolationListTransformer
{
    /**
     * Returns property names with their respective errors.
     *
     * @param \Symfony\Component\Validator\ConstraintViolationListInterface $violationList
     *
     * @return array
     */
    public static function getViolationsArray(ConstraintViolationListInterface $violationList): array
    {
        $violations = [];

        /** @var \Symfony\Component\Validator\ConstraintViolationInterface $violation */
        foreach ($violationList as $violation) {
            $violations[$violation->getPropertyPath()] = (string) $violation->getMessage();
        }

        return $violations;
    }
}
