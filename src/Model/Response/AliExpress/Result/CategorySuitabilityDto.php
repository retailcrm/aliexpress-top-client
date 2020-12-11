<?php
/**
 * PHP version 7.3
 *
 * @category CategorySuitabilityDto
 * @package  RetailCrm\Model\Response\AliExpress\Result
 */

namespace RetailCrm\Model\Response\AliExpress\Result;

use JMS\Serializer\Annotation as JMS;

/**
 * Class CategorySuitabilityDto
 *
 * @category CategorySuitabilityDto
 * @package  RetailCrm\Model\Response\AliExpress\Result
 */
class CategorySuitabilityDto
{
    /**
     * @var float $score
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("score")
     */
    public $score;

    /**
     * @var float $score
     *
     * @JMS\Type("float")
     * @JMS\SerializedName("suitabilityRank")
     */
    public $suitabilityRank;

    /**
     * @var int $categoryId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("categoryId")
     */
    public $categoryId;
}
