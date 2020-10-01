<?php
/**
 * PHP version 7.4
 *
 * @category SellerCategoryTreeQueryResponseData
 * @package  RetailCrm\Model\Response\AliExpressSolution\Data
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpressSolution\Data;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SellerCategoryTreeQueryResponseData
 *
 * @category SellerCategoryTreeQueryResponseData
 * @package  RetailCrm\Model\Response\AliExpressSolution\Data
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class SellerCategoryTreeQueryResponseData
{
    /**
     * @var SellerCategoryTreeQueryResponseDataChildrenCategoryList
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpressSolution\Data\SellerCategoryTreeQueryResponseDataChildrenCategoryList")
     * @JMS\SerializedName("children_category_list")
     */
    public $childrenCategoryList;

    /**
     * @var bool $isSuccess
     *
     * @JMS\Type("bool")
     * @JMS\SerializedName("is_success")
     */
    public $isSuccess;
}
