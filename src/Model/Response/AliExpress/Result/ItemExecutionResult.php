<?php
/**
 * PHP version 7.3
 *
 * @category ItemExecutionResult
 * @package  RetailCrm\Model\Response\AliExpress\Result
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Result;

use JMS\Serializer\Annotation as JMS;
use RetailCrm\Model\Response\AliExpress\Result\Traits\SuccessTrait;

/**
 * Class ItemExecutionResult
 *
 * @category ItemExecutionResult
 * @package  RetailCrm\Model\Response\AliExpress\Result
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ItemExecutionResult
{
    use SuccessTrait;

    /**
     * @var int $productId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("productId")
     */
    public $productId;
}
