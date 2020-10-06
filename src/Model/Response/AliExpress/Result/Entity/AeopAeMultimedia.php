<?php
/**
 * PHP version 7.3
 *
 * @category AeopAeMultimedia
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AeopAeMultimedia
 *
 * @category AeopAeMultimedia
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class AeopAeMultimedia
{
    /**
     * @var \RetailCrm\Model\Response\AliExpress\Result\Entity\AeopAeVideoList $aeopAeVideos
     *
     * @JMS\Type("RetailCrm\Model\Response\AliExpress\Result\Entity\AeopAeVideoList")
     * @JMS\SerializedName("aeop_a_e_videos")
     */
    public $aeopAeVideos;
}
