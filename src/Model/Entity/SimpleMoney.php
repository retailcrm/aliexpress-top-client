<?php
/**
 * PHP version 7.3
 *
 * @category SimpleMoney
 * @package  RetailCrm\Model\Entity
 */

namespace RetailCrm\Model\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SimpleMoney
 *
 * @category SimpleMoney
 * @package  RetailCrm\Model\Entity
 */
class SimpleMoney
{
    /**
     * @var string $currencyCode
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("currency_code")
     */
    public $currencyCode;

    /**
     * @var string $amount
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("amount")
     */
    public $amount;
}
