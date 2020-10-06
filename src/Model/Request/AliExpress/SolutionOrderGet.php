<?php
/**
 * PHP version 7.3
 *
 * @category SolutionOrderGet
 * @package  RetailCrm\Model\Request\AliExpress
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Request\AliExpress;

use JMS\Serializer\Annotation as JMS;
use RetailCrm\Model\Request\BaseRequest;
use RetailCrm\Model\Response\AliExpress\SolutionOrderGetResponse;

/**
 * Class SolutionOrderGet
 *
 * @category SolutionOrderGet
 * @package  RetailCrm\Model\Request\AliExpress
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class SolutionOrderGet extends BaseRequest
{
    /**
     * Contains request params. This weird naming has been borrowed from developer docs.
     * @see https://developers.aliexpress.com/en/doc.htm?docId=42270&docType=2
     *
     * @var \RetailCrm\Model\Request\AliExpress\Data\OrderQuery $param0
     *
     * @JMS\Type("RetailCrm\Model\Request\AliExpress\Data\OrderQuery")
     * @JMS\SerializedName("param0")
     */
    public $param0;

    /**
     * @inheritDoc
     */
    public function getMethod(): string
    {
        return 'aliexpress.solution.order.get';
    }

    /**
     * @inheritDoc
     */
    public function getExpectedResponse(): string
    {
        return SolutionOrderGetResponse::class;
    }
}
