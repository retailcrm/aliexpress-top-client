<?php
/**
 * PHP version 7.3
 *
 * @category SolutionFeedListGet
 * @package  RetailCrm\Model\Request\AliExpress
 */

namespace RetailCrm\Model\Request\AliExpress;

use JMS\Serializer\Annotation as JMS;
use RetailCrm\Model\Request\BaseRequest;
use RetailCrm\Model\Response\AliExpress\SolutionFeedListGetResponse;

/**
 * Class SolutionFeedListGet
 *
 * @category SolutionFeedListGet
 * @package  RetailCrm\Model\Request\AliExpress
 */
class SolutionFeedListGet extends BaseRequest
{
    /**
     * @var int $currentPage
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("current_page")
     */
    public $currentPage;

    /**
     * @var string $feedType
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("feed_type")
     */
    public $feedType;

    /**
     * @var int $pageSize
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("page_size")
     */
    public $pageSize;

    /**
     * @var string $status
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("status")
     */
    public $status;

    /**
     * @inheritDoc
     */
    public function getMethod(): string
    {
        return 'aliexpress.solution.feed.list.get';
    }

    /**
     * @inheritDoc
     */
    public function getExpectedResponse(): string
    {
        return SolutionFeedListGetResponse::class;
    }
}
