<?php
/**
 * PHP version 7.3
 *
 * @category BizTypes
 * @package  RetailCrm\Model\Enum
 */

namespace RetailCrm\Model\Enum;

/**
 * Class BizTypes
 *
 * @category BizTypes
 * @package  RetailCrm\Model\Enum
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
