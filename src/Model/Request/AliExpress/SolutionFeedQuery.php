<?php
/**
 * PHP version 7.3
 *
 * @category SolutionFeedQuery
 * @package  RetailCrm\Model\Request\AliExpress
 */

namespace RetailCrm\Model\Request\AliExpress;

use RetailCrm\Model\Request\BaseRequest;
use JMS\Serializer\Annotation as JMS;
use RetailCrm\Model\Response\AliExpress\SolutionFeedQueryResponse;

/**
 * Class SolutionFeedQuery
 *
 * @category SolutionFeedQuery
 * @package  RetailCrm\Model\Request\AliExpress
 */
class SolutionFeedQuery extends BaseRequest
{
    /**
     * Job ID.
     * This field is marked as optional for some reason... so, no assertions here.
     *
     * @var int $jobId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("job_id")
     */
    public $jobId;

    /**
     * @inheritDoc
     */
    public function getMethod(): string
    {
        return 'aliexpress.solution.feed.query';
    }

    /**
     * @inheritDoc
     */
    public function getExpectedResponse(): string
    {
        return SolutionFeedQueryResponse::class;
    }
}
