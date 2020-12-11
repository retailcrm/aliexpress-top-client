<?php
/**
 * PHP version 7.3
 *
 * @category SolutionFeedQueryResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 */

namespace RetailCrm\Model\Response\AliExpress\Data;

use JMS\Serializer\Annotation as JMS;
use RetailCrm\Model\Response\AbstractResponseData;

/**
 * Class SolutionFeedQueryResponseData
 *
 * @category SolutionFeedQueryResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 */
class SolutionFeedQueryResponseData extends AbstractResponseData
{
    /**
     * @var int $jobId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("job_id")
     */
    public $jobId;

    /**
     * @var int $successItemCount
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("success_item_count")
     */
    public $successItemCount;

    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\Entity\SingleItemResponseDtoList $resultList
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Result\Entity\SingleItemResponseDtoList")
     * @JMS\SerializedName("result_list")
     */
    public $resultList;

    /**
     * @var int $totalItemCount
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("total_item_count")
     */
    public $totalItemCount;
}
