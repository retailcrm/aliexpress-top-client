<?php
/**
 * PHP version 7.3
 *
 * @category SolutionOrderReceiptInfoGetResponseResult
 * @package  RetailCrm\Model\Response\AliExpress\Result
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Model\Response\AliExpress\Result;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SolutionOrderReceiptInfoGetResponseResult
 *
 * @category SolutionOrderReceiptInfoGetResponseResult
 * @package  RetailCrm\Model\Response\AliExpress\Result
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 * @SuppressWarnings(PHPMD.TooManyFields)
 */
class SolutionOrderReceiptInfoGetResponseResult
{
    /**
     * @var string $countryName
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("country_name")
     */
    public $countryName;

    /**
     * @var string $mobileNo
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("mobile_no")
     */
    public $mobileNo;

    /**
     * @var string $contactPerson
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("contact_person")
     */
    public $contactPerson;

    /**
     * @var string $phoneCountry
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("phone_country")
     */
    public $phoneCountry;

    /**
     * @var string $phoneArea
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("phone_area")
     */
    public $phoneArea;

    /**
     * @var string $province
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("province")
     */
    public $province;

    /**
     * @var string $address
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("address")
     */
    public $address;

    /**
     * @var string $phoneNumber
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("phone_number")
     */
    public $phoneNumber;

    /**
     * @var string $faxNumber
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("fax_number")
     */
    public $faxNumber;

    /**
     * @var string $detailAddress
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("detail_address")
     */
    public $detailAddress;

    /**
     * @var string $city
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("city")
     */
    public $city;

    /**
     * @var string $country
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("country")
     */
    public $country;

    /**
     * @var string $address2
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("address2")
     */
    public $address2;

    /**
     * @var string $faxCountry
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("fax_country")
     */
    public $faxCountry;

    /**
     * @var string $zip
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("zip")
     */
    public $zip;

    /**
     * @var string $faxArea
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("fax_area")
     */
    public $faxArea;
}
