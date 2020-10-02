<?php

/**
 * PHP version 7.3
 *
 * @category RequestSigner
 * @package  RetailCrm\Service
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Service;

use JMS\Serializer\SerializerInterface;
use RetailCrm\Component\Constants;
use RetailCrm\Component\Exception\NotImplementedException;
use RetailCrm\Interfaces\AppDataInterface;
use RetailCrm\Interfaces\RequestSignerInterface;
use RetailCrm\Model\Enum\AvailableSignMethods;
use RetailCrm\Model\Request\BaseRequest;

/**
 * Class RequestSigner
 *
 * @category RequestSigner
 * @package  RetailCrm\Service
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class RequestSigner implements RequestSignerInterface
{
    /**
     * @var SerializerInterface|\JMS\Serializer\Serializer $serializer
     */
    private $serializer;

    /**
     * @var RequestDataFilter $filter
     */
    private $filter;

    /**
     * RequestSigner constructor.
     *
     * @param \JMS\Serializer\SerializerInterface  $serializer
     * @param \RetailCrm\Service\RequestDataFilter $filter
     */
    public function __construct(SerializerInterface $serializer, RequestDataFilter $filter)
    {
        $this->filter = $filter;
        $this->serializer = $serializer;
    }

    /**
     * @param BaseRequest                            $request
     * @param \RetailCrm\Interfaces\AppDataInterface $appData
     *
     * @throws \RetailCrm\Component\Exception\NotImplementedException
     */
    public function sign(BaseRequest $request, AppDataInterface $appData): void
    {
        $stringToBeSigned = '';
        $params           = $this->getDataForSigning($request);

        foreach ($params as $param => $value) {
            $stringToBeSigned .= $param . $value;
        }

        switch ($request->signMethod) {
            case AvailableSignMethods::MD5:
                $stringToBeSigned = $appData->getAppSecret() . $stringToBeSigned . $appData->getAppSecret();
                $request->sign = strtoupper(md5($stringToBeSigned));
                break;
            case AvailableSignMethods::HMAC_MD5:
                $request->sign = strtoupper(hash_hmac('md5', $stringToBeSigned, $appData->getAppSecret()));
                break;
            default:
                throw new NotImplementedException(sprintf('Invalid signing method: %s', $request->signMethod));
                break;
        }
    }

    /**
     * @param \RetailCrm\Model\Request\BaseRequest $request
     *
     * @return array
     */
    private function getDataForSigning(BaseRequest $request): array
    {
        $params = $this->filter->filterBinaryFromRequestData($this->serializer->toArray($request));
        $params = array_filter(array_filter($params, static function ($val) {
            return !is_array($val);
        }));

        unset($params['sign'], $params['session']);
        ksort($params);

        return $params;
    }
}
