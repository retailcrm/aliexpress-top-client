<?php
/**
 * PHP version 7.3
 *
 * @category CategorySuitabilityDto
 * @package  RetailCrm\Model\Response\AliExpress\Result
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Result;

use JMS\Serializer\Annotation as JMS;

/**
 * Class CategorySuitabilityDto
 *
 * @category CategorySuitabilityDto
 * @package  RetailCrm\Model\Response\AliExpress\Result
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
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
