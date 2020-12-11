<?php
/**
 * PHP version 7.3
 *
 * @category AeopAeVideo
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AeopAeVideo
 *
 * @category AeopAeVideo
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 */
class AeopAeVideo
{
    /**
     * @var string $posterUrl
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("poster_url")
     */
    public $posterUrl;

    /**
     * @var string $mediaType
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("media_type")
     */
    public $mediaType;

    /**
     * @var string $mediaStatus
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("media_status")
     */
    public $mediaStatus;

    /**
     * @var int $mediaId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("media_id")
     */
    public $mediaId;

    /**
     * @var int $aliMemberId
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("ali_member_id")
     */
    public $aliMemberId;
}
