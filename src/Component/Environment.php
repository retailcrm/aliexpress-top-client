<?php

/**
 * PHP version 7.3
 *
 * @category Environment
 * @package  RetailCrm\Component
 */
namespace RetailCrm\Component;

use InvalidArgumentException;

/**
 * Class Environment
 *
 * @category Environment
 * @package  RetailCrm\Component
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
        $value = strtoupper($value);

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
