<?php
/**
 * PHP version 7.3
 *
 * @category SolutionSellerCategoryTreeQueryResponseDataChildrenCategoryList
 * @package  RetailCrm\Model\Response\AliExpress\Data
 */

namespace RetailCrm\Model\Response\AliExpress\Data;

use RetailCrm\Model\Entity\CategoryInfo;
use JMS\Serializer\Annotation as JMS;

/**
 * Class SolutionSellerCategoryTreeQueryResponseDataChildrenCategoryList
 *
 * @category SolutionSellerCategoryTreeQueryResponseDataChildrenCategoryList
 * @package  RetailCrm\Model\Response\AliExpress\Data
 */
class SolutionSellerCategoryTreeQueryResponseDataChildrenCategoryList
{
    /**
     * @var CategoryInfo[] $categoryInfo
     *
     * @JMS\Type("array<RetailCrm\Model\Entity\CategoryInfo>")
     * @JMS\SerializedName("category_info")
     */
    public $categoryInfo;
}
