<?php

/**
 * PHP version 7.3
 *
 * @category AppData
 * @package  RetailCrm\Component
 */
namespace RetailCrm\Component;

use RetailCrm\Interfaces\AppDataInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class AppData
 *
 * @category AppData
 * @package  RetailCrm\Component
 */
class AppData implements AppDataInterface
{
    public const OVERSEAS_ENDPOINT = 'https://api.taobao.com/router/rest';
    public const CHINESE_ENDPOINT = 'https://eco.taobao.com/router/rest';
    public const AVAILABLE_ENDPOINTS = [self::OVERSEAS_ENDPOINT, self::CHINESE_ENDPOINT];

    /**
     * @var string $serviceUrl
     * @Assert\Url()
     * @Assert\Choice(choices=AppData::AVAILABLE_ENDPOINTS, message="Invalid endpoint provided.")
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
     * @var string $redirectUri
     */
    private $redirectUri;

    /**
     * AppData constructor.
     *
     * @param string $serviceUrl
     * @param string $appKey
     * @param string $appSecret
     */
    public function __construct(string $serviceUrl, string $appKey, string $appSecret, string $redirectUri = '')
    {
        $this->serviceUrl  = $serviceUrl;
        $this->appKey      = $appKey;
        $this->appSecret   = $appSecret;
        $this->redirectUri = $redirectUri;
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

    /**
     * @return string
     */
    public function getRedirectUri(): string
    {
        return $this->redirectUri;
    }
}
