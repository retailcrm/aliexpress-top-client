<?php

/**
 * PHP version 7.3
 *
 * @category Client
 * @package  RetailCrm\TopClient
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\TopClient;

use JMS\Serializer\SerializerInterface;
use Psr\Http\Client\ClientInterface;
use RetailCrm\Interfaces\AuthenticatorInterface;
use RetailCrm\Traits\ValidatorAwareTrait;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Client
 *
 * @category Client
 * @package  RetailCrm\TopClient
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class Client
{
    use ValidatorAwareTrait;

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
     * @var AuthenticatorInterface $authenticator
     * @Assert\NotNull(message="Authenticator should be provided")
     */
    protected $authenticator;

    /**
     * @var ClientInterface $httpClient
     * @Assert\NotNull(message="HTTP client should be provided")
     */
    protected $httpClient;

    /**
     * @var SerializerInterface $serializer
     * @Assert\NotNull(message="Serializer should be provided")
     */
    protected $serializer;

    /**
     * Client constructor.
     *
     * @param string                                       $serviceUrl
     * @param \RetailCrm\Interfaces\AuthenticatorInterface $authenticator
     */
    public function __construct(string $serviceUrl, AuthenticatorInterface $authenticator)
    {
        $this->serviceUrl = $serviceUrl;
        $this->authenticator = $authenticator;
    }

    /**
     * @throws \RetailCrm\Component\Exception\ValidationException
     */
    public function validateSelf(): void
    {
        $this->validate($this);
    }

    /**
     * @param \Psr\Http\Client\ClientInterface $httpClient
     */
    public function setHttpClient(ClientInterface $httpClient): void
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param \JMS\Serializer\SerializerInterface $serializer
     */
    public function setSerializer(SerializerInterface $serializer): void
    {
        $this->serializer = $serializer;
    }
}
