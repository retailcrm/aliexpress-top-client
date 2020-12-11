<?php

/**
 * PHP version 7.3
 *
 * @category AbstractLogger
 * @package  RetailCrm\Component\Logger
 */
namespace RetailCrm\Component\Logger;

use Psr\Log\AbstractLogger as BaseAbstractLogger;

/**
 * Class AbstractLogger
 *
 * @category AbstractLogger
 * @package  RetailCrm\Component\Logger
 */
abstract class AbstractLogger extends BaseAbstractLogger
{
    /**
     * @param mixed $level
     * @param string $message
     * @param array $context
     *
     * @return string
     */
    protected function formatMessage($level, $message, $context = [])
    {
        return sprintf(
            '[%s] %s %s',
            $level,
            $message,
            $this->encodeContext($context)
        );
    }

    /**
     * @param array $context
     *
     * @return false|string
     */
    protected function encodeContext(array $context = [])
    {
        try {
            return json_encode($context, JSON_THROW_ON_ERROR);
        } catch (\Exception $exception) {
            return '';
        }
    }
}
