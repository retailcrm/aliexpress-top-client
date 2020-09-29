<?php

/**
 * PHP version 7.3
 *
 * @category StdioLogger
 * @package  RetailCrm\Component\Logger
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Component\Logger;

/**
 * Class StdioLogger
 *
 * @category StdioLogger
 * @package  RetailCrm\Component\Logger
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
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
