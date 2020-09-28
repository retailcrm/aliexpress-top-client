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
use RetailCrm\Interfaces\AppDataInterface;
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
     * @param BaseRequest                            $request
     * @param \RetailCrm\Interfaces\AppDataInterface $appData
     */
    public function sign(BaseRequest $request, AppDataInterface $appData): void
    {
        $stringToBeSigned = '';
        $params           = $this->getRequestData($request);

        foreach ($params as $param => $value) {
            $stringToBeSigned .= $param . $value;
        }

        switch ($request->signMethod) {
            case Constants::SIGN_TYPE_MD5:
                $request->sign = strtoupper(md5(
                    $appData->getAppSecret() . $stringToBeSigned . $appData->getAppSecret()
                ));
                break;
            case Constants::SIGN_TYPE_HMAC:
                $request->sign = strtoupper(hash_hmac('md5', $stringToBeSigned, $appData->getAppSecret()));
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
