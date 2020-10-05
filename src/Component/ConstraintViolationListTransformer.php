<?php
/**
 * PHP version 7.3
 *
 * @category ConstraintViolationListTransformer
 * @package  RetailCrm\Component
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Component;

use Symfony\Component\Validator\ConstraintViolationListInterface;

/**
 * Class ConstraintViolationListTransformer
 *
 * @category ConstraintViolationListTransformer
 * @package  RetailCrm\Component
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
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
