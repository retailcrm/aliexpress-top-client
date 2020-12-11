<?php
/**
 * PHP version 7.3
 *
 * @category FeedStatuses
 * @package  RetailCrm\Model\Enum
 */

namespace RetailCrm\Model\Enum;

/**
 * Class FeedStatuses
 *
 * @category FeedStatuses
 * @package  RetailCrm\Model\Enum
 */
class FeedStatuses
{
    public const FINISH = 'FINISH';
    public const PROCESSING = 'PROCESSING';
    public const QUEUEING = 'QUEUEING';
    public const AVAILABLE_STATUSES = [self::FINISH, self::PROCESSING, self::QUEUEING];
}
