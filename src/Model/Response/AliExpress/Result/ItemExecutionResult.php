<?php
/**
 * PHP version 7.4
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

/**
 * Class ItemExecutionResult
 *
 * @category ItemExecutionResult
 * @package  RetailCrm\Model\Response\AliExpress\Result
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ItemExecutionResult
{
    /**
     * @var int $productId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("productId")
     */
    public $productId;

    /**
     * @var bool $success
     *
     * @JMS\Type("bool")
     * @JMS\SerializedName("success")
     */
    public $success;
}
