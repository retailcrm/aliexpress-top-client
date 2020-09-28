<?php

/**
 * PHP version 7.3
 *
 * @category RequestFactory
 * @package  RetailCrm\Factory
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Factory;

use Psr\Http\Message\RequestFactoryInterface as BaseFactoryInterface;
use RetailCrm\Interfaces\AppDataInterface;
use RetailCrm\Interfaces\RequestFactoryInterface;
use RetailCrm\Interfaces\RequestSignerInterface;
use RetailCrm\Model\Request\BaseRequest;

/**
 * Class RequestFactory
 *
 * @category RequestFactory
 * @package  RetailCrm\Factory
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class RequestFactory implements RequestFactoryInterface
{
    /**
     * @var \RetailCrm\Interfaces\RequestSignerInterface $signer
     */
    private $signer;

    /**
     * @var BaseFactoryInterface $requestFactory
     */
    private $requestFactory;

    /**
     * RequestFactory constructor.
     *
     * @param \RetailCrm\Interfaces\RequestSignerInterface $signer
     * @param \Psr\Http\Message\RequestFactoryInterface    $requestFactory
     */
    public function __construct(RequestSignerInterface $signer, BaseFactoryInterface $requestFactory)
    {
        $this->signer = $signer;
        $this->requestFactory = $requestFactory;
    }

    /**
     * @param \RetailCrm\Model\Request\BaseRequest   $request
     * @param \RetailCrm\Interfaces\AppDataInterface $appData
     */
    public function fromModel(BaseRequest $request, AppDataInterface $appData)
    {
        $this->signer->sign($request, $appData);
        // TODO: Implement this
    }
}
