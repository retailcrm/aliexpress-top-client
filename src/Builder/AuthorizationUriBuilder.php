<?php
/**
 * PHP version 7.3
 *
 * @category AuthorizationUriBuilder
 * @package  RetailCrm\Builder
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
     * @var string $state
     */
    private $state;

    /**
     * AuthorizationUriBuilder constructor.
     *
     * @param string $appKey
     * @param string $redirectUri
     * @param string $state
     */
    public function __construct(string $appKey, string $redirectUri, string $state = '')
    {
        $this->appKey      = $appKey;
        $this->redirectUri = $redirectUri;
        $this->state       = $state;
    }

    /**
     * @inheritDoc
     */
    public function build(): string
    {
        if (empty($this->redirectUri)) {
            throw new BadMethodCallException('Redirect URI should not be empty');
        }

        $address = array_filter([
            'client_id' => $this->appKey,
            'response_type' => 'code',
            'redirect_uri' => $this->redirectUri,
            'sp' => 'ae',
            'state' => $this->state,
            'view' => 'web'
        ]);

        return self::AUTHORIZE_URI . '?' . http_build_query($address);
    }
}
