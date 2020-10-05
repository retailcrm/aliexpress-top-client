<?php
/**
 * PHP version 7.3
 *
 * @category Timezone
 * @package  RetailCrm\Component\Validator\Constraints
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Component\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class Timezone
 *
 * @category Timezone
 * @package  RetailCrm\Component\Validator\Constraints
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 *
 * @Annotation
 * @Target({"PROPERTY", "METHOD", "ANNOTATION"})
 */
class Timezone extends Constraint
{
    public $timezone = 'America/Los_Angeles';
    public $message = 'Invalid timezone provided. Got {{ provided }}, should be {{ expected }}.';

    /**
     * {@inheritdoc}
     */
    public function getDefaultOption(): string
    {
        return 'timezone';
    }
}
