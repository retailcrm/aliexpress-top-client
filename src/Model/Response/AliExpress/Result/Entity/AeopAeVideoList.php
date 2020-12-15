<?php
/**
 * PHP version 7.3
 *
 * @category AeopAeVideoList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AeopAeVideoList
 *
 * @category AeopAeVideoList
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
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
