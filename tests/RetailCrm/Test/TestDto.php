<?php

/**
 * PHP version 7.3
 *
 * @category TestDto
 * @package  RetailCrm\Test
 */
namespace RetailCrm\Test;

use JMS\Serializer\Annotation as JMS;
use RetailCrm\Interfaces\RequestDtoInterface;

/**
 * Class TestDto
 *
 * @category TestDto
 * @package  RetailCrm\Test
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
