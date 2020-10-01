<?php
/**
 * PHP version 7.4
 *
 * @category SolutionSellerCategoryTreeQueryResponseDataChildrenCategoryList
 * @package  RetailCrm\Model\Response\AliExpress\Data
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Data;

use RetailCrm\Model\Entity\CategoryInfo;
use JMS\Serializer\Annotation as JMS;

/**
 * Class SolutionSellerCategoryTreeQueryResponseDataChildrenCategoryList
 *
 * @category SolutionSellerCategoryTreeQueryResponseDataChildrenCategoryList
 * @package  RetailCrm\Model\Response\AliExpress\Data
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
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
