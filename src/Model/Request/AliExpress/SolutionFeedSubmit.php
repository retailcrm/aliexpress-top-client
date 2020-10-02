<?php
/**
 * PHP version 7.3
 *
 * @category SolutionFeedSubmit
 * @package  RetailCrm\Model\Request\AliExpress
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Request\AliExpress;

use JMS\Serializer\Annotation as JMS;
use RetailCrm\Model\Request\AliExpress\Data\SingleItemRequestDto;
use RetailCrm\Model\Request\BaseRequest;
use RetailCrm\Model\Response\AliExpress\SolutionFeedSubmitResponse;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class SolutionFeedSubmit
 *
 * @category SolutionFeedSubmit
 * @package  RetailCrm\Model\Request\AliExpress
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class SolutionFeedSubmit extends BaseRequest
{
    /**
     * @var string $operationType
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("operation_type")
     * @Assert\Choice(choices=RetailCrm\Model\Enum\FeedOperationTypes::ALLOWED_OPERATION_TYPES)
     */
    public $operationType;

    /**
     * @var SingleItemRequestDto[] $itemList
     *
     * @JMS\Type("array<RetailCrm\Model\Request\AliExpress\Data\SingleItemRequestDto>")
     * @JMS\SerializedName("item_list")
     * @Assert\Count(min=1, max=2000)
     */
    public $itemList;

    /**
     * @inheritDoc
     */
    public function getMethod(): string
    {
        return 'aliexpress.solution.feed.submit';
    }

    /**
     * @inheritDoc
     */
    public function getExpectedResponse(): string
    {
        return SolutionFeedSubmitResponse::class;
    }
}
