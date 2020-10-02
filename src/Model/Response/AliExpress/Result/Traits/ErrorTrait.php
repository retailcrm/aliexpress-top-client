<?php
/**
 * PHP version 7.3
 *
 * @category ErrorTrait
 * @package  RetailCrm\Model\Response\AliExpress\Result\Traits
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Traits;

use JMS\Serializer\Annotation as JMS;

/**
 * Trait ErrorTrait
 *
 * @category ErrorTrait
 * @package  RetailCrm\Model\Response\AliExpress\Result\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
trait ErrorTrait
{
    /**
     * @var string $errorCode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("error_code")
     */
    public $errorCode;

    /**
     * @var string $errorMessage
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("error_message")
     */
    public $errorMessage;
}
