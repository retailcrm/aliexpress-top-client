<?php
/**
 * PHP version 7.3
 *
 * @category BatchOperationJobDtoList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class BatchOperationJobDtoList
 *
 * @category BatchOperationJobDtoList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */
class BatchOperationJobDtoList
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\BatchOperationJobDto[] $batchOperationJobDto
     *
     * @JMS\Type("array<RetailCrm\Model\Response\AliExpress\Result\BatchOperationJobDto>")
     * @JMS\SerializedName("batch_operation_job_dto")
     */
    public $batchOperationJobDto;
}
