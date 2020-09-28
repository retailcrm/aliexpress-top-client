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

use RetailCrm\Component\Exception\ValidationException;
use RetailCrm\Interfaces\HttpClientAwareInterface;
use RetailCrm\Interfaces\ValidatorAwareInterface;
use RetailCrm\Traits\HttpClientAwareTrait;
use RetailCrm\Traits\SerializerAwareTrait;
use RetailCrm\Traits\ValidatorAwareTrait;
use Symfony\Component\Serializer\SerializerAwareInterface;
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
class Client implements SerializerAwareInterface, HttpClientAwareInterface, ValidatorAwareInterface
{
    use ValidatorAwareTrait;
    use HttpClientAwareTrait;
    use SerializerAwareTrait;

    public const OVERSEAS_ENDPOINT = 'https://api.taobao.com/router/rest';
    public const CHINESE_ENDPOINT = 'https://eco.taobao.com/router/rest';
    public const AVAILABLE_ENDPOINTS = [self::OVERSEAS_ENDPOINT, self::CHINESE_ENDPOINT];

    /**
     * @var                                                string $serviceUrl
     * @Assert\Url()
     * @Assert\Choice(choices=Client::AVAILABLE_ENDPOINTS, message="Choose a valid endpoint.")
     */
    protected $serviceUrl;

    /**
     * Client constructor.
     *
     * @param string serviceUrl
     */
    public function __construct(string $serviceUrl)
    {
        $this->serviceUrl = $serviceUrl;
    }

    /**
     * @throws \RetailCrm\Component\Exception\ValidationException
     */
    public function validateSelf(): void
    {
        $this->validate($this);
    }

    /**
     * @param mixed $item
     *
     * @throws \RetailCrm\Component\Exception\ValidationException
     */
    private function validate($item): void
    {
        $violations = $this->validator->validate($item);

        if ($violations->count()) {
            throw new ValidationException("Invalid data", $violations);
        }
    }
}
