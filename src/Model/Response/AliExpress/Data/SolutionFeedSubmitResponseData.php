<?php
/**
 * PHP version 7.4
 *
 * @category SolutionFeedSubmitResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Data;

use RetailCrm\Model\Response\AbstractResponseData;
use JMS\Serializer\Annotation as JMS;

/**
 * Class SolutionFeedSubmitResponseData
 *
 * @category SolutionFeedSubmitResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class SolutionFeedSubmitResponseData extends AbstractResponseData
{
    /**
     * @var int $jobId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("job_id")
     */
    public $jobId;
}
