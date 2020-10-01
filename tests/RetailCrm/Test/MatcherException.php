<?php
/**
 * PHP version 7.4
 *
 * @category MatcherException
 * @package  RetailCrm\Test
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Test;

use Exception;
use Throwable;

/**
 * Class MatcherException
 *
 * @category MatcherException
 * @package  RetailCrm\Test
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class MatcherException extends Exception
{
    /**
     * MatcherException constructor.
     *
     * @param string          $message
     * @param int             $code
     * @param \Throwable|null $previous
     */
    public function __construct($message = "Cannot match any request", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
