<?php
/**
 * PHP version 7.3
 *
 * @category OAuthTokenFetcherResponse
 * @package  RetailCrm\Model\Response
 */

namespace RetailCrm\Model\Response;

use JMS\Serializer\Annotation as JMS;

/**
 * Class OAuthTokenFetcherResponse
 *
 * @category OAuthTokenFetcherResponse
 * @package  RetailCrm\Model\Response
 */
class OAuthTokenFetcherResponse
{
    /**
     * @var string $accessToken
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("access_token")
     */
    public $accessToken;

    /**
     * @var string $refreshToken
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("refresh_token")
     */
    public $refreshToken;

    /**
     * @var int $w1Valid
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("w1_valid")
     */
    public $w1Valid;

    /**
     * @var int $refreshTokenValidTime
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("refresh_token_valid_time")
     */
    public $refreshTokenValidTime;

    /**
     * @var int $w2Valid
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("w2_valid")
     */
    public $w2Valid;

    /**
     * @var string $userId
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("user_id")
     */
    public $userId;

    /**
     * @var int $expireTime
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("expire_time")
     */
    public $expireTime;

    /**
     * @var int $r2Valid
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("r2_valid")
     */
    public $r2Valid;

    /**
     * @var string $locale
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("locale")
     */
    public $locale;

    /**
     * @var int $r1Valid
     *
     * @JMS\Type("int")
     * @JMS\SerializedName("r1_valid")
     */
    public $r1Valid;

    /**
     * @var string $sp
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("sp")
     */
    public $sp;

    /**
     * @var string $userNick
     *
     * @JMS\Type("string")
     * @JMS\SerializedName("user_nick")
     */
    public $userNick;
}
