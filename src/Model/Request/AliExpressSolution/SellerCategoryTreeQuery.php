<?php
/**
 * PHP version 7.4
 *
 * @category SellerCategoryTreeQuery
 * @package  RetailCrm\Model\Request\AliExpressSolution
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Request\AliExpressSolution;

use RetailCrm\Model\Request\BaseRequest;
use JMS\Serializer\Annotation as JMS;
use RetailCrm\Model\Response\AliExpressSolution\SellerCategoryTreeQueryResponse;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class SellerCategoryTreeQuery
 *
 * @category SellerCategoryTreeQuery
 * @package  RetailCrm\Model\Request\AliExpressSolution
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class SellerCategoryTreeQuery extends BaseRequest
{
    /**
     * @var int $categoryId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("category_id")
     * @Assert\NotBlank()
     * @Assert\PositiveOrZero()
     */
    public $categoryId;

    /**
     * @var bool $filterNoPermission
     *
     * @JMS\Type("bool")
     * @JMS\SerializedName("filter_no_permission")
     * @Assert\NotNull()
     */
    public $filterNoPermission = false;

    /**
     * @inheritDoc
     */
    public function getMethod(): string
    {
        return 'aliexpress.solution.seller.category.tree.query';
    }

    /**
     * @inheritDoc
     */
    public function getExpectedResponse(): string
    {
        return SellerCategoryTreeQueryResponse::class;
    }
}
