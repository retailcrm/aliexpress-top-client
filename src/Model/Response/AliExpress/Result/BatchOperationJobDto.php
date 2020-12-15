<?php
/**
 * PHP version 7.3
 *
 * @category BatchOperationJobDto
 * @package  RetailCrm\Model\Response\AliExpress\Result
 */

namespace RetailCrm\Model\Response\AliExpress\Result;

use JMS\Serializer\Annotation as JMS;

/**
 * Class BatchOperationJobDto
 *
 * @category BatchOperationJobDto
 * @package  RetailCrm\Model\Response\AliExpress\Result
 */
class BatchOperationJobDto
{
    /**
     * @var string $status
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("status")
     */
    public $status;

    /**
     * @var string $operationType
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("operation_type")
     */
    public $operationType;

    /**
     * @var int $jobId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("job_id")
     */
    public $jobId;
}
