<?php

/**
 * PHP version 7.3
 *
 * @category TokenAuthenticator
 * @package  RetailCrm\Component\Authenticator
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Component\Authenticator;

use RetailCrm\Interfaces\AuthenticatorInterface;
use RetailCrm\Model\Request\BaseRequest;

/**
 * Class TokenAuthenticator
 *
 * @category TokenAuthenticator
 * @package  RetailCrm\Component\Authenticator
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class TokenAuthenticator implements AuthenticatorInterface
{
    /**
     * @var string $appKey
     */
    private $appKey;

    /**
     * @var string $token
     */
    private $token;

    /**
     * TokenAuthenticator constructor.
     *
     * @param string $appKey
     * @param string $token
     */
    public function __construct(string $appKey, string $token)
    {
        $this->appKey = $appKey;
        $this->token = $token;
    }

    /**
     * @param \RetailCrm\Model\Request\BaseRequest $request
     */
    public function authenticate(BaseRequest $request): void
    {
        $request->appKey = $this->appKey;
        $request->session = $this->token;
    }
}
