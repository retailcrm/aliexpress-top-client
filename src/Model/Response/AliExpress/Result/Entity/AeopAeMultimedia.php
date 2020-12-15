<?php
/**
 * PHP version 7.3
 *
 * @category AeopAeMultimedia
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AeopAeMultimedia
 *
 * @category AeopAeMultimedia
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
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
