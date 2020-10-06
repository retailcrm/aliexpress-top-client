<?php
/**
 * PHP version 7.3
 *
 * @category MaillingAddressRequestDto
 * @package  RetailCrm\Model\Request\AliExpress\Data
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Request\AliExpress\Data;

use DateTime;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class MaillingAddressRequestDto
 *
 * @category MaillingAddressRequestDto
 * @package  RetailCrm\Model\Request\AliExpress\Data
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class MaillingAddressRequestDto
{
    /**
     * @var string $address
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("address")
     * @Assert\NotBlank()
     */
    public $address;

    /**
     * @var string $address2
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("address2")
     */
    public $address2;

    /**
     * @var string $city
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("city")
     */
    public $city;

    /**
     * @var string $contactPerson
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("contact_person")
     */
    public $contactPerson;

    /**
     * @var string $country
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("country")
     */
    public $country;

    /**
     * @var string $cpf
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("cpf")
     */
    public $cpf;

    /**
     * @var string $fullName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("full_name")
     */
    public $fullName;

    /**
     * @var string $locale
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("locale")
     */
    public $locale;

    /**
     * @var string $mobileNo
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("mobile_no")
     */
    public $mobileNo;

    /**
     * @var string $passportNo
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("passport_no")
     */
    public $passportNo;

    /**
     * @var DateTime $passportNoDate
     *
     * @JMS\Type("DateTime<'Y-m-d'>")
     * @JMS\SerializedName("passport_no_date")
     */
    public $passportNoDate;

    /**
     * @var string $passportOrganization
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("passport_organization")
     */
    public $passportOrganization;

    /**
     * @var string $phoneCountry
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("phone_country")
     */
    public $phoneCountry;

    /**
     * @var string $province
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("province")
     */
    public $province;

    /**
     * @var string $taxNumber
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("tax_number")
     */
    public $taxNumber;

    /**
     * @var string $zip
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("zip")
     */
    public $zip;
}
