<?php

/**
 * PHP version 7.3
 *
 * @category AppData
 * @package  RetailCrm\Component
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Component;

use RetailCrm\Interfaces\AppDataInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class AppData
 *
 * @category AppData
 * @package  RetailCrm\Component
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class AppData implements AppDataInterface
{
    public const OVERSEAS_ENDPOINT = 'https://api.taobao.com/router/rest';
    public const CHINESE_ENDPOINT = 'https://eco.taobao.com/router/rest';
    public const AVAILABLE_ENDPOINTS = [self::OVERSEAS_ENDPOINT, self::CHINESE_ENDPOINT];

    /**
     * @var string $serviceUrl
     * @Assert\Url()
     * @Assert\Choice(choices=Client::AVAILABLE_ENDPOINTS, message="Invalid endpoint provided.")
     */
    protected $serviceUrl;

    /**
     * @var string $appKey
     * @Assert\NotBlank()
     */
    private $appKey;

    /**
     * @var string $appSecret
     * @Assert\NotBlank()
     */
    private $appSecret;

    /**
     * AppData constructor.
     *
     * @param string $serviceUrl
     * @param string $appKey
     * @param string $appSecret
     */
    public function __construct(string $serviceUrl, string $appKey, string $appSecret)
    {
        $this->serviceUrl = $serviceUrl;
        $this->appKey     = $appKey;
        $this->appSecret  = $appSecret;
    }

    /**
     * Constructor shortcut
     *
     * @param string $serviceUrl
     * @param string $appKey
     * @param string $appSecret
     *
     * @return \RetailCrm\Component\AppData
     */
    public static function create(string $serviceUrl, string $appKey, string $appSecret): AppDataInterface
    {
        return new self($serviceUrl, $appKey, $appSecret);
    }

    /**
     * @return string
     */
    public function getServiceUrl(): string
    {
        return $this->serviceUrl;
    }

    /**
     * @return string
     */
    public function getAppKey(): string
    {
        return $this->appKey;
    }

    /**
     * @return string
     */
    public function getAppSecret(): string
    {
        return $this->appSecret;
    }
}
