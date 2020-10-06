<?php
/**
 * PHP version 7.3
 *
 * @category PostproductRedefiningFindAEProductByIdForDropshipper
 * @package  RetailCrm\Model\Request\AliExpress
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Request\AliExpress;

use JMS\Serializer\Annotation as JMS;
use RetailCrm\Model\Request\BaseRequest;
use RetailCrm\Model\Response\AliExpress\PostproductRedefiningFindAEProductByIdForDropshipperResponse;

/**
 * Class PostproductRedefiningFindAEProductByIdForDropshipper
 *
 * @category PostproductRedefiningFindAEProductByIdForDropshipper
 * @package  RetailCrm\Model\Request\AliExpress
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class PostproductRedefiningFindAEProductByIdForDropshipper extends BaseRequest
{
    /**
     * @var int $productId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("product_id")
     */
    public $productId;

    /**
     * @var string $localCountry
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("local_country")
     */
    public $localCountry;

    /**
     * @var string $localLanguage
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("local_language")
     */
    public $localLanguage;

    /**
     * @inheritDoc
     */
    public function getMethod(): string
    {
        return 'aliexpress.postproduct.redefining.findaeproductbyidfordropshipper';
    }

    /**
     * @inheritDoc
     */
    public function getExpectedResponse(): string
    {
        return PostproductRedefiningFindAEProductByIdForDropshipperResponse::class;
    }
}
