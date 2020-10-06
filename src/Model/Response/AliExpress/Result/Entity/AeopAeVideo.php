<?php
/**
 * PHP version 7.3
 *
 * @category AeopAeVideo
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Result\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class AeopAeVideo
 *
 * @category AeopAeVideo
 * @package  RetailCrm\Model\Response\AliExpress\Result\Entity
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
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
