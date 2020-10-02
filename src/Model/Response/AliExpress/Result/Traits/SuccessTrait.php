<?php
/**
 * PHP version 7.3
 *
 * @category SuccessTrait
 * @package  RetailCrm\Model\Response\AliExpress\Result\Traits
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Traits;

use JMS\Serializer\Annotation as JMS;

/**
 * Trait SuccessTrait
 *
 * @category SuccessTrait
 * @package  RetailCrm\Model\Response\AliExpress\Result\Traits
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
trait SuccessTrait
{
    /**
     * @var bool $success
     *
     * @JMS\Type("bool")
     * @JMS\SerializedName("success")
     */
    public $success;
}
