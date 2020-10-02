<?php
/**
 * PHP version 7.3
 *
 * @category BatchOperationJobDto
 * @package  RetailCrm\Model\Response\AliExpress\Result
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Result;

use JMS\Serializer\Annotation as JMS;

/**
 * Class BatchOperationJobDto
 *
 * @category BatchOperationJobDto
 * @package  RetailCrm\Model\Response\AliExpress\Result
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
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
