<?php
/**
 * PHP version 7.3
 *
 * @category PlaceOrderRequest4OpenApiDto
 * @package  RetailCrm\Model\Request\AliExpress\Data
 */

namespace RetailCrm\Model\Request\AliExpress\Data;

use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class PlaceOrderRequest4OpenApiDto
 *
 * @category PlaceOrderRequest4OpenApiDto
 * @package  RetailCrm\Model\Request\AliExpress\Data
 */
class PlaceOrderRequest4OpenApiDto
{
    /**
     * @var MaillingAddressRequestDto $logisticsAddress
     *
     * @JMS\Type("RetailCrm\Model\Request\AliExpress\Data\MaillingAddressRequestDto")
     * @JMS\SerializedName("logistics_address")
     * @Assert\NotNull()
     */
    public $logisticsAddress;

    /**
     * @var \RetailCrm\Model\Request\AliExpress\Data\ProductBaseItem[] $productItems
     *
     * @JMS\Type("array<RetailCrm\Model\Request\AliExpress\Data\ProductBaseItem>")
     * @JMS\SerializedName("product_items")
     */
    public $productItems;
}
