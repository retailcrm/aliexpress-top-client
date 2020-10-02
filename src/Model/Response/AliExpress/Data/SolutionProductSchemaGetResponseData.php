<?php
/**
 * PHP version 7.3
 *
 * @category SolutionProductSchemaGetResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Data;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SolutionProductSchemaGetResponseData
 *
 * @category SolutionProductSchemaGetResponseData
 * @package  RetailCrm\Model\Response\AliExpress\Data
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class SolutionProductSchemaGetResponseData
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\SolutionProductSchemaGetResponseResult $result
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Result\SolutionProductSchemaGetResponseResult")
     * @JMS\SerializedName("result")
     */
    public $result;
}
