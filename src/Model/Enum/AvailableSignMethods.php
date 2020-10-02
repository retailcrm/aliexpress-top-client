<?php
/**
 * PHP version 7.4
 *
 * @category AvailableSignMethods
 * @package  RetailCrm\Model\Enum
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Enum;

/**
 * Class AvailableSignMethods
 *
 * @category AvailableSignMethods
 * @package  RetailCrm\Model\Enum
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class AvailableSignMethods
{
    public const MD5 = 'md5';
    public const HMAC_MD5 = 'hmac';
    public const AVAILABLE_METHODS = [self::MD5, self::HMAC_MD5];
}
