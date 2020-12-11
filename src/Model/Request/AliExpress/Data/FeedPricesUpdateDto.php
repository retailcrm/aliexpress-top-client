<?php
/**
 * PHP version 7.3
 *
 * @category FeedPricesUpdateDto
 * @package  RetailCrm\Model\Request\AliExpress\Data
 */

namespace RetailCrm\Model\Request\AliExpress\Data;

use JMS\Serializer\Annotation as JMS;
use RetailCrm\Interfaces\RequestDtoInterface;

/**
 * Class FeedPricesUpdateDto
 *
 * @category FeedPricesUpdateDto
 * @package  RetailCrm\Model\Request\AliExpress\Data
 */
class FeedPricesUpdateDto implements RequestDtoInterface
{
    /**
     * @var int $aliexpressProductId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("aliexpress_product_id")
     */
    public $aliexpressProductId;

    /**
     * @var \RetailCrm\Model\Request\AliExpress\Data\SkuPricesUpdateItemDto[] $multipleSkuUpdateList
     *
     * @JMS\Type("array<RetailCrm\Model\Request\AliExpress\Data\SkuPricesUpdateItemDto>")
     * @JMS\SerializedName("multiple_sku_update_list")
     */
    public $multipleSkuUpdateList;
}
