<?php
/**
 * PHP version 7.3
 *
 * @category AvailableResponseFormats
 * @package  RetailCrm\Model\Enum
 */

namespace RetailCrm\Model\Enum;

/**
 * Class AvailableResponseFormats
 *
 * @category AvailableResponseFormats
 * @package  RetailCrm\Model\Enum
 */
class AvailableResponseFormats
{
    public const XML = 'xml';
    public const JSON = 'json';
    public const AVAILABLE_FORMATS = [self::JSON, self::XML];
}
