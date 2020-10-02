<?php
/**
 * PHP version 7.3
 *
 * @category FeedStatuses
 * @package  RetailCrm\Model\Enum
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Enum;

/**
 * Class FeedStatuses
 *
 * @category FeedStatuses
 * @package  RetailCrm\Model\Enum
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class FeedStatuses
{
    public const FINISH = 'FINISH';
    public const PROCESSING = 'PROCESSING';
    public const QUEUEING = 'QUEUEING';
    public const AVAILABLE_STATUSES = [self::FINISH, self::PROCESSING, self::QUEUEING];
}
