<?php
/**
 * PHP version 7.3
 *
 * @category AuthorizationUriBuilder
 * @package  RetailCrm\Builder
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Builder;

use BadMethodCallException;
use RetailCrm\Component\AuthorizationUri;
use RetailCrm\Interfaces\BuilderInterface;

/**
 * Class AuthorizationUriBuilder
 *
 * @category AuthorizationUriBuilder
 * @package  RetailCrm\Builder
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class AuthorizationUriBuilder implements BuilderInterface
{
    private const AUTHORIZE_URI = 'https://oauth.aliexpress.com/authorize';

    /**
     * @var string $appKey
     */
    private $appKey;

    /**
     * @var string $redirectUri
     */
    private $redirectUri;

    /**
     * @var bool $withState
     */
    private $withState;

    /**
     * AuthorizationUriBuilder constructor.
     *
     * @param string $appKey
     * @param string $redirectUri
     * @param bool   $withState Set to true if state should be present in the URI
     *
     * It doesn't violate SRP because this class doesn't do anything besides URI generation.
     * @SuppressWarnings(PHPMD.BooleanArgumentFlag)
     */
    public function __construct(string $appKey, string $redirectUri, bool $withState = false)
    {
        $this->appKey      = $appKey;
        $this->redirectUri = $redirectUri;
        $this->withState   = $withState;
    }

    /**
     * @inheritDoc
     */
    public function build(): AuthorizationUri
    {
        $state = $this->withState ? uniqid('aeauth', true) : null;

        return new AuthorizationUri(
            self::AUTHORIZE_URI . '?' . http_build_query($this->getParams($state)),
            $state
        );
    }

    /**
     * @param string|null $state
     *
     * @return array
     */
    private function getParams(?string $state): array
    {
        if (empty($this->redirectUri)) {
            throw new BadMethodCallException('Redirect URI should not be empty');
        }

        return array_filter([
            'client_id' => $this->appKey,
            'response_type' => 'code',
            'redirect_uri' => $this->redirectUri,
            'sp' => 'ae',
            'state' => $state,
            'view' => 'web'
        ]);
    }
}
