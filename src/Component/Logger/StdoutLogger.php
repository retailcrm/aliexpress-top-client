<?php

/**
 * PHP version 7.3
 *
 * @category StdioLogger
 * @package  RetailCrm\Component\Logger
 */
namespace RetailCrm\Component\Logger;

/**
 * Class StdioLogger
 *
 * @category StdioLogger
 * @package  RetailCrm\Component\Logger
 */
class StdoutLogger extends AbstractLogger
{
    /**
     * @param mixed  $level
     * @param string $message
     * @param array  $context
     */
    public function log($level, $message, array $context = [])
    {
        fwrite(STDOUT, $this->formatMessage($level, $message, $context) . PHP_EOL);
    }
}
