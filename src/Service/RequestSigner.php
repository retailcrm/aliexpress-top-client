<?php

/**
 * PHP version 7.3
 *
 * @category RequestSigner
 * @package  RetailCrm\Service
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Service;

use JMS\Serializer\SerializerInterface;
use RetailCrm\Component\Constants;
use RetailCrm\Interfaces\AuthenticatorInterface;
use RetailCrm\Interfaces\RequestSignerInterface;
use RetailCrm\Model\Request\BaseRequest;

/**
 * Class RequestSigner
 *
 * @category RequestSigner
 * @package  RetailCrm\Service
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class RequestSigner implements RequestSignerInterface
{
    /**
     * @var SerializerInterface|\JMS\Serializer\Serializer $serializer
     */
    public $serializer;

    /**
     * RequestSigner constructor.
     *
     * @param \JMS\Serializer\SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param BaseRequest                                  $request
     * @param \RetailCrm\Interfaces\AuthenticatorInterface $authenticator
     */
    public function sign(BaseRequest $request, AuthenticatorInterface $authenticator): void
    {
        $stringToBeSigned = '';
        $params           = $this->getRequestData($request);

        foreach ($params as $param => $value) {
            $stringToBeSigned .= $param . $value;
        }

        switch ($request->signMethod) {
            case Constants::SIGN_TYPE_MD5:
                $request->sign = md5($authenticator->getAppSecret() . $stringToBeSigned);
                break;
            case Constants::SIGN_TYPE_HMAC:
                $request->sign = hash_hmac('md5', $stringToBeSigned, $authenticator->getAppSecret());
                break;
        }
    }

    /**
     * @param \RetailCrm\Model\Request\BaseRequest $request
     *
     * @return array
     */
    private function getRequestData(BaseRequest $request): array
    {
        $params = array_filter($this->serializer->toArray($request));
        unset($params['sign']);
        ksort($params);

        return $params;
    }
}
