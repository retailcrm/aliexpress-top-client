<?php
/**
 * PHP version 7.3
 *
 * @category BatchOperationJobDtoList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class BatchOperationJobDtoList
 *
 * @category BatchOperationJobDtoList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
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
