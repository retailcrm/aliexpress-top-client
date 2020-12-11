<?php
/**
 * PHP version 7.4
 *
 * @category FakeDataRequestDto
 * @package  RetailCrm\Test
 */

namespace RetailCrm\Test;

use RetailCrm\Interfaces\RequestDtoInterface;
use JMS\Serializer\Annotation as JMS;

/**
 * Class FakeDataRequestDto
 *
 * @category FakeDataRequestDto
 * @package  RetailCrm\Test
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
