<?php
/**
 * PHP version 7.3
 *
 * @category SolutionSellerCategoryTreeQuery
 * @package  RetailCrm\Model\Request\AliExpress
 */

namespace RetailCrm\Model\Request\AliExpress;

use RetailCrm\Model\Request\BaseRequest;
use JMS\Serializer\Annotation as JMS;
use RetailCrm\Model\Response\AliExpress\SolutionSellerCategoryTreeQueryResponse;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class SolutionSellerCategoryTreeQuery
 *
 * @category SolutionSellerCategoryTreeQuery
 * @package  RetailCrm\Model\Request\AliExpress
 */
class SolutionSellerCategoryTreeQuery extends BaseRequest
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
        return SolutionSellerCategoryTreeQueryResponse::class;
    }
}
