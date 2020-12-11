<?php
/**
 * PHP version 7.3
 *
 * @category TokenAuthenticator
 * @package  RetailCrm\Component\Authenticator
 */

namespace RetailCrm\Component\Authenticator;

use RetailCrm\Interfaces\AuthenticatorInterface;
use RetailCrm\Model\Request\BaseRequest;

/**
 * Class TokenAuthenticator
 *
 * @category TokenAuthenticator
 * @package  RetailCrm\Component\Authenticator
 */
class TokenAuthenticator implements AuthenticatorInterface
{
    /**
     * @var string $token
     */
    private $token;

    /**
     * TokenAuthenticator constructor.
     *
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * @inheritDoc
     */
    public function authenticate(BaseRequest $request): void
    {
        $request->session = $this->token;
    }
}
