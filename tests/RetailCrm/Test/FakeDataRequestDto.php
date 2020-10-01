<?php
/**
 * PHP version 7.4
 *
 * @category FakeDataRequestDto
 * @package  RetailCrm\Test
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Test;

use RetailCrm\Interfaces\RequestDtoInterface;
use JMS\Serializer\Annotation as JMS;

/**
 * Class FakeDataRequestDto
 *
 * @category FakeDataRequestDto
 * @package  RetailCrm\Test
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class FakeDataRequestDto implements RequestDtoInterface
{
    /**
     * @var string $code
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("code")
     */
    public $code;
}
