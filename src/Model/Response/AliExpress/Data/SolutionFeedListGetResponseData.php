<?php
/**
 * PHP version 7.3
 *
 * @category SolutionFeedListGetResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 */

namespace RetailCrm\Model\Response\AliExpress\Data;

use RetailCrm\Model\Response\AbstractResponseData;
use JMS\Serializer\Annotation as JMS;

/**
 * Class SolutionFeedListGetResponseData
 *
 * @category SolutionFeedListGetResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 */
class SolutionFeedListGetResponseData extends AbstractResponseData
{
    /**
     * @var int $currentPage
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("current_page")
     */
    public $currentPage;

    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\Entity\BatchOperationJobDtoList $jobList
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Result\Entity\BatchOperationJobDtoList")
     * @JMS\SerializedName("job_list")
     */
    public $jobList;

    /**
     * @var int $pageSize
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("page_size")
     */
    public $pageSize;

    /**
     * @var int $totalCount
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("total_count")
     */
    public $totalCount;

    /**
     * @var int $totalPage
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("total_page")
     */
    public $totalPage;
}
