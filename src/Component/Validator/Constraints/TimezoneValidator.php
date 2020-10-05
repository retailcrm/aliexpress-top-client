<?php
/**
 * PHP version 7.3
 *
 * @category TimezoneValidator
 * @package  RetailCrm\Component\Validator\Constraints
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Component\Validator\Constraints;

use DateTime;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

/**
 * Class TimezoneValidator
 *
 * @category TimezoneValidator
 * @package  RetailCrm\Component\Validator\Constraints
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class TimezoneValidator extends ConstraintValidator
{
    /**
     * @inheritDoc
     */
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof Timezone) {
            throw new UnexpectedTypeException($constraint, Timezone::class);
        }

        if (null === $value || '' === $value) {
            return;
        }

        if (!($value instanceof DateTime)) {
            throw new UnexpectedValueException($value, gettype($value));
        }

        if ($value->getTimezone()->getName() !== $constraint->timezone) {
            $this->context->buildViolation($constraint->message)
                ->setParameters([
                    '{{ provided }}' => $value->getTimezone()->getName(),
                    '{{ expected }}' => $constraint->timezone
                ])
                ->addViolation();
        }
    }
}
