<?php
/**
 * PHP version 7.3
 *
 * @category AvailableResponseFormats
 * @package  RetailCrm\Model\Enum
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Enum;

/**
 * Class AvailableResponseFormats
 *
 * @category AvailableResponseFormats
 * @package  RetailCrm\Model\Enum
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class AvailableResponseFormats
{
    public const XML = 'xml';
    public const JSON = 'json';
    public const AVAILABLE_FORMATS = [self::JSON, self::XML];
}
