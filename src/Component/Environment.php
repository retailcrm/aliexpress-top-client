<?php

/**
 * PHP version 7.3
 *
 * @category Environment
 * @package  RetailCrm\Component
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Component;

use InvalidArgumentException;

/**
 * Class Environment
 *
 * @category Environment
 * @package  RetailCrm\Component
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class Environment
{
    public const PROD = 'PROD';
    public const DEV  = 'DEV';
    public const TEST = 'TEST';
    public const DEBUG_VALUES = [self::DEV, self::TEST];
    public const AVAILABLE_VALUES = [self::PROD, self::DEV, self::TEST];

    /**
     * @var string $value
     */
    private $value;

    /**
     * Environment constructor.
     *
     * @param string $value
     */
    public function __construct(string $value)
    {
        if (!in_array($value, self::AVAILABLE_VALUES)) {
            throw new InvalidArgumentException(sprintf('Incorrect environment provided: %s', $value));
        }

        $this->value = $value;
    }

    /**
     * @return bool
     */
    public function isDebug(): bool
    {
        return in_array($this->value, self::DEBUG_VALUES);
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
