<?php
/**
 * PHP version 7.3
 *
 * @category SolutionProductSchemaGet
 * @package  RetailCrm\Model\Request\AliExpress
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Request\AliExpress;

use JMS\Serializer\Annotation as JMS;
use RetailCrm\Model\Request\BaseRequest;
use Symfony\Component\Validator\Constraints as Assert;
use RetailCrm\Model\Response\AliExpress\SolutionProductSchemaGetResponse;

/**
 * Class SolutionProductSchemaGet
 *
 * @category SolutionProductSchemaGet
 * @package  RetailCrm\Model\Request\AliExpress
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class SolutionProductSchemaGet extends BaseRequest
{
    /**
     * @var int $aliexpressCategoryId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("aliexpress_category_id")
     * @Assert\NotBlank()
     */
    public $aliexpressCategoryId;

    /**
     * @inheritDoc
     */
    public function getMethod(): string
    {
        return 'aliexpress.solution.product.schema.get';
    }

    /**
     * @inheritDoc
     */
    public function getExpectedResponse(): string
    {
        return SolutionProductSchemaGetResponse::class;
    }
}
