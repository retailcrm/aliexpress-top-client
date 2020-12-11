<?php

/**
 * PHP version 7.3
 *
 * @category TopClientInterface
 * @package  RetailCrm\Interfaces
 */
namespace RetailCrm\Interfaces;

use RetailCrm\Component\OAuthTokenFetcher;
use RetailCrm\Component\ServiceLocator;
use RetailCrm\Model\Request\BaseRequest;
use RetailCrm\Model\Response\TopResponseInterface;

/**
 * Class TopClientInterface
 *
 * @category ContainerBuilder
 * @package  RetailCrm\Interfaces
 *
 */
interface TopClientInterface
{
    /**
     * @param \RetailCrm\Interfaces\AuthenticatorInterface $authenticator
     *
     * @return TopClientInterface
     */
    public function setAuthenticator(AuthenticatorInterface $authenticator);

    /**
     * @return \RetailCrm\Component\ServiceLocator
     */
    public function getServiceLocator(): ServiceLocator;

    /**
     * @param string $state
     *
     * @return BuilderInterface
     */
    public function getAuthorizationUriBuilder(string $state = ''): BuilderInterface;

    /**
     * @return \RetailCrm\Component\OAuthTokenFetcher
     */
    public function getTokenFetcher(): OAuthTokenFetcher;

    /**
     * Send TOP request
     *
     * @param \RetailCrm\Model\Request\BaseRequest $request
     *
     * @return TopResponseInterface
     * @throws \RetailCrm\Component\Exception\ValidationException
     * @throws \RetailCrm\Component\Exception\FactoryException
     * @throws \RetailCrm\Component\Exception\TopClientException
     * @throws \RetailCrm\Component\Exception\TopApiException
     */
    public function sendRequest(BaseRequest $request): TopResponseInterface;

    /**
     * Send authenticated TOP request
     *
     * @param \RetailCrm\Model\Request\BaseRequest $request
     *
     * @return \RetailCrm\Model\Response\TopResponseInterface
     * @throws \RetailCrm\Component\Exception\FactoryException
     * @throws \RetailCrm\Component\Exception\TopApiException
     * @throws \RetailCrm\Component\Exception\TopClientException
     * @throws \RetailCrm\Component\Exception\ValidationException
     */
    public function sendAuthenticatedRequest(BaseRequest $request): TopResponseInterface;
}
