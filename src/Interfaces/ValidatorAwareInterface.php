<?php

/**
 * PHP version 7.4
 *
 * @category ValidatorAwareInterface
 * @package  RetailCrm\Interfaces
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Interfaces;

use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Interface ValidatorAwareInterface
 *
 * @category ValidatorAwareInterface
 * @package  RetailCrm\Interfaces
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
interface ValidatorAwareInterface
{
    /**
     * @param \Symfony\Component\Validator\Validator\ValidatorInterface $validator
     */
    public function setValidator(ValidatorInterface $validator): void;
}
