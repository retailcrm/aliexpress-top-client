<?php
/**
 * PHP version 7.3
 *
 * @category SuccessResult
 * @package  RetailCrm\Model\Response\AliExpress\Result
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Result;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SuccessResult
 *
 * @category SuccessResult
 * @package  RetailCrm\Model\Response\AliExpress\Result
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class SuccessResult
{
    /**
     * @var bool $resultSuccess
     *
     * @JMS\Type("bool")
     * @JMS\SerializedName("result_success")
     */
    public $resultSuccess;
}
