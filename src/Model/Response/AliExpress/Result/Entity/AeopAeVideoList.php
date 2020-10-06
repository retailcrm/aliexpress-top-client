<?php
/**
 * PHP version 7.3
 *
 * @category AeopAeVideoList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AeopAeVideoList
 *
 * @category AeopAeVideoList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class AeopAeVideoList
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\Entity\AeopAeVideo[] $aeopAeVideo
     *
     * @JMS\Type("array<RetailCrm\Model\Response\AliExpress\Result\Entity\AeopAeVideo>")
     * @JMS\SerializedName("aeop_ae_video")
     */
    public $aeopAeVideo;
}
