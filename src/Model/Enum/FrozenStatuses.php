<?php
/**
 * PHP version 7.3
 *
 * @category FrozenStatuses
 * @package  RetailCrm\Model\Enum
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Enum;

/**
 * Class FrozenStatuses
 *
 * @category FrozenStatuses
 * @package  RetailCrm\Model\Enum
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class FrozenStatuses
{
    public const NO_FROZEN = 'NO_FROZEN';
    public const IN_FROZEN = 'IN_FROZEN';
    public const FROZEN_STATUSES = [self::NO_FROZEN, self::IN_FROZEN];
}
