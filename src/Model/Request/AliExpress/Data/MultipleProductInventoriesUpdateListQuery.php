<?php
/**
 * PHP version 7.3
 *
 * @category MultipleProductInventoriesUpdateListQuery
 * @package  RetailCrm\Model\Request\AliExpress\Data
 */

namespace RetailCrm\Model\Request\AliExpress\Data;

use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class MultipleProductInventoriesUpdateListQuery
 *
 * @category MultipleProductInventoriesUpdateListQuery
 * @package  RetailCrm\Model\Request\AliExpress\Data
 */
class MultipleProductInventoriesUpdateListQuery
{
    /**
     * @var int $productId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("product_id")
     * @Assert\NotNull()
     */
    public $productId;

    /**
     * @var \RetailCrm\Model\Request\AliExpress\Data\SkuStocksUpdateItemDto[] $multipleSkuUpdateList
     *
     * @JMS\Type("array<RetailCrm\Model\Request\AliExpress\Data\SkuStocksUpdateItemDto>")
     * @JMS\SerializedName("multiple_sku_update_list")
     * @Assert\NotNull()
     */
    public $multipleSkuUpdateList;
}
