<?php

/**
 * PHP version 7.3
 *
 * @category FileLogger
 * @package  RetailCrm\Component\Logger
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Component\Logger;

/**
 * Class FileLogger
 *
 * @category FileLogger
 * @package  RetailCrm\Component\Logger
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class FileLogger extends AbstractLogger
{
    /** @var string $ */
    private $fileName;

    /**
     * FileLogger constructor.
     *
     * @param string $fileName
     */
    public function __construct(string $fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @param mixed  $level
     * @param string $message
     * @param array  $context
     */
    public function log($level, $message, array $context = [])
    {
        error_log($this->formatMessage($level, $message, $context), 3, $this->fileName);
    }
}
