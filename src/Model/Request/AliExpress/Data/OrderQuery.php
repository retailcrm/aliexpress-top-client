<?php
/**
 * PHP version 7.3
 *
 * @category OrderQuery
 * @package  RetailCrm\Model\Request\AliExpress\Data
 */

namespace RetailCrm\Model\Request\AliExpress\Data;

use DateTime;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;
use RetailCrm\Component\Validator\Constraints as TopAssert;

/**
 * Class OrderQuery
 *
 * @category OrderQuery
 * @package  RetailCrm\Model\Request\AliExpress\Data
 */
class OrderQuery
{
    /**
     * US pacific time
     *
     * @var DateTime $createDateEnd
     *
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\SerializedName("create_date_end")
     * @TopAssert\Timezone("PST")
     */
    public $createDateEnd;

    /**
     * @var DateTime $createDateStart
     *
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\SerializedName("create_date_start")
     * @TopAssert\Timezone("PST")
     */
    public $createDateStart;

    /**
     * @var DateTime $modifiedDateStart
     *
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\SerializedName("modified_date_start")
     * @TopAssert\Timezone("PST")
     */
    public $modifiedDateStart;

    /**
     * @var string[] $orderStatusList
     *
     * @JMS\Type("array<string>")
     * @JMS\SerializedName("order_status_list")
     * @Assert\Choice(choices=RetailCrm\Model\Enum\OrderStatuses::STATUSES_LIST, multiple=true)
     */
    public $orderStatusList;

    /**
     * @var string $buyerLoginId
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("buyer_login_id")
     */
    public $buyerLoginId;

    /**
     * @var int $pageSize
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("page_size")
     * @Assert\NotBlank()
     * @Assert\GreaterThan(0)
     */
    public $pageSize;

    /**
     * @var DateTime $modifiedDateEnd
     *
     * @JMS\Type("DateTime<'Y-m-d H:i:s'>")
     * @JMS\SerializedName("modified_date_end")
     * @TopAssert\Timezone("PST")
     */
    public $modifiedDateEnd;

    /**
     * @var int $currentPage
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("current_page")
     * @Assert\NotBlank()
     * @Assert\GreaterThan(0)
     */
    public $currentPage;

    /**
     * @var string $orderStatus
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("order_status")
     * @Assert\Choice(choices=RetailCrm\Model\Enum\OrderStatuses::STATUSES_LIST)
     */
    public $orderStatus;
}
