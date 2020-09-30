<?php

/**
 * PHP version 7.3
 *
 * @category TopRequestProcessor
 * @package  RetailCrm\Service
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Service;

use RetailCrm\Interfaces\AppDataInterface;
use RetailCrm\Interfaces\AuthenticatorInterface;
use RetailCrm\Interfaces\RequestSignerInterface;
use RetailCrm\Interfaces\RequestTimestampProviderInterface;
use RetailCrm\Interfaces\TopRequestProcessorInterface;
use RetailCrm\Model\Request\BaseRequest;
use RetailCrm\Traits\ValidatorAwareTrait;

/**
 * Class TopRequestProcessor
 *
 * @category TopRequestProcessor
 * @package  RetailCrm\Service
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class TopRequestProcessor implements TopRequestProcessorInterface
{
    use ValidatorAwareTrait;

    /**
     * @var \RetailCrm\Interfaces\RequestSignerInterface $signer
     */
    private $signer;

    /**
     * @var RequestTimestampProviderInterface $timestampProvider
     */
    private $timestampProvider;

    /**
     * @param \RetailCrm\Interfaces\RequestSignerInterface $signer
     *
     * @return TopRequestProcessor
     */
    public function setSigner(RequestSignerInterface $signer): TopRequestProcessor
    {
        $this->signer = $signer;
        return $this;
    }

    /**
     * @param \RetailCrm\Interfaces\RequestTimestampProviderInterface $timestampProvider
     *
     * @return TopRequestProcessor
     */
    public function setTimestampProvider(RequestTimestampProviderInterface $timestampProvider): TopRequestProcessor
    {
        $this->timestampProvider = $timestampProvider;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function process(
        BaseRequest $request,
        AppDataInterface $appData,
        AuthenticatorInterface $authenticator
    ): void {
        $authenticator->authenticate($request);
        $this->signer->sign($request, $appData);
        $this->timestampProvider->provide($request);
        $this->validate($request);
    }
}
