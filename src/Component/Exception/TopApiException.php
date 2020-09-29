<?php

/**
 * PHP version 7.3
 *
 * @category TopApiException
 * @package  RetailCrm\Component\Exception
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Component\Exception;

use Exception;
use RetailCrm\Model\Response\Body\ErrorResponseBody;
use Throwable;

/**
 * Class TopApiException
 *
 * @category TopApiException
 * @package  RetailCrm\Component\Exception
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class TopApiException extends Exception
{
    /**
     * @var string $subCode
     */
    private $subCode;

    /**
     * @var string $requestId
     */
    private $requestId;

    /**
     * TopApiException constructor.
     *
     * @param \RetailCrm\Model\Response\Body\ErrorResponseBody $responseBody
     * @param \Throwable|null                                  $previous
     */
    public function __construct(ErrorResponseBody $responseBody, Throwable $previous = null)
    {
        parent::__construct($responseBody->msg, $responseBody->code, $previous);

        $this->subCode = $responseBody->subCode;
        $this->requestId = $responseBody->requestId;
    }

    /**
     * @return string
     */
    public function getSubCode(): string
    {
        return $this->subCode;
    }

    /**
     * @return string
     */
    public function getRequestId(): string
    {
        return $this->requestId;
    }
}
