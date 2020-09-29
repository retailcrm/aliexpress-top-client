<?php

/**
 * PHP version 7.3
 *
 * @category TestDto
 * @package  RetailCrm\Test
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Test;

use JMS\Serializer\Annotation as JMS;
use RetailCrm\Interfaces\RequestDtoInterface;

/**
 * Class TestDto
 *
 * @category TestDto
 * @package  RetailCrm\Test
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class TestDto implements RequestDtoInterface
{
    /**
     * @var string $modelContent
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("modelContent")
     */
    public $modelContent = 'contentData';
}
