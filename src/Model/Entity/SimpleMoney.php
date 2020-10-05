<?php
/**
 * PHP version 7.3
 *
 * @category SimpleMoney
 * @package  RetailCrm\Model\Entity
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Entity;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SimpleMoney
 *
 * @category SimpleMoney
 * @package  RetailCrm\Model\Entity
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
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
