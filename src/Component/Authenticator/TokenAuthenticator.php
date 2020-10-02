<?php
/**
 * PHP version 7.3
 *
 * @category TokenAuthenticator
 * @package  RetailCrm\Component\Authenticator
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
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
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
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
