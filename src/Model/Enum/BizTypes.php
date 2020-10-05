<?php
/**
 * PHP version 7.3
 *
 * @category BizTypes
 * @package  RetailCrm\Model\Enum
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Enum;

/**
 * Class BizTypes
 *
 * @category BizTypes
 * @package  RetailCrm\Model\Enum
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class BizTypes
{
    // Common type
    public const AE_COMMON = 'AE_COMMON';

    // Trial type
    public const AE_TRIAL = 'AE_TRIAL';

    // Recharge type
    public const AE_RECHARGE = 'AE_RECHARGE';

    // All types
    public const ALL_TYPES = [
        self::AE_COMMON,
        self::AE_TRIAL,
        self::AE_RECHARGE
    ];
}
