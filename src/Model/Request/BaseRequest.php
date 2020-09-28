<?php

/**
 * PHP version 7.3
 *
 * @category BaseRequest
 * @package  RetailCrm\Model\Request
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Model\Request;

use JMS\Serializer\Annotation as JMS;
use RetailCrm\Component\Constants;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class BaseRequest
 *
 * @category BaseRequest
 * @package  RetailCrm\Model\Request
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
abstract class BaseRequest
{
    /**
     * @var string $method
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("method")
     * @Assert\NotBlank()
     */
    public $method;

    /**
     * @var string $appKey
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("app_key")
     * @Assert\NotBlank()
     */
    public $appKey;

    /**
     * @var string $appKey
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("session")
     * @Assert\NotBlank()
     */
    public $session;

    /**
     * @var \DateTime $timestamp
     *
     * @JMS\Type("DateTime<'yyyy-MM-dd H:i:s'>")
     * @JMS\SerializedName("timestamp")
     * @Assert\NotBlank()
     */
    public $timestamp;

    /**
     * @var string $format
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("format")
     * @Assert\NotBlank()
     * @Assert\Choice({"xml", "json"})
     */
    public $format = 'json';

    /**
     * @var string $version
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("v")
     * @Assert\NotBlank()
     * @Assert\Choice({"2.0"})
     */
    public $version = '2.0';

    /**
     * @var bool $simplify
     *
     * @JMS\Type("bool")
     * @JMS\SerializedName("simplify")
     * @Assert\NotBlank()
     */
    public $simplify = false;

    /**
     * @var string $signMethod
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sign_method")
     * @Assert\NotBlank()
     * @Assert\Choice({"hmac", "md5"})
     */
    public $signMethod = Constants::SIGN_TYPE_HMAC;

    /**
     * @var string $sign
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sign")
     * @Assert\NotBlank()
     * @Assert\Length(min="32", max="32")
     */
    public $sign = Constants::UNSIGNED_MARK;

    /**
     * @var string $partnerId
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("partner_id")
     * @Assert\NotBlank()
     */
    public $partnerId = Constants::TOP_VERSION;
}
