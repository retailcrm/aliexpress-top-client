<?php

/**
 * PHP version 7.3
 *
 * @category TopRequestFactory
 * @package  RetailCrm\Factory
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Factory;

use Http\Message\MultipartStream\MultipartStreamBuilder;
use JMS\Serializer\SerializerInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;
use Psr\Http\Message\UriFactoryInterface;
use RetailCrm\Component\Exception\FactoryException;
use RetailCrm\Interfaces\AppDataInterface;
use RetailCrm\Interfaces\FileItemInterface;
use RetailCrm\Interfaces\TopRequestFactoryInterface;
use RetailCrm\Model\Request\BaseRequest;
use RetailCrm\Service\RequestDataFilter;
use UnexpectedValueException;

/**
 * Class TopRequestFactory
 *
 * @category TopRequestFactory
 * @package  RetailCrm\Factory
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT https://mit-license.org
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class TopRequestFactory implements TopRequestFactoryInterface
{
    /**
     * @var RequestDataFilter $filter
     */
    private $filter;

    /**
     * @var SerializerInterface|\JMS\Serializer\Serializer $serializer
     */
    private $serializer;

    /**
     * @var StreamFactoryInterface $streamFactory
     */
    private $streamFactory;

    /**
     * @var \Psr\Http\Message\RequestFactoryInterface $requestFactory
     */
    private $requestFactory;

    /**
     * @var \Psr\Http\Message\UriFactoryInterface $uriFactory
     */
    private $uriFactory;

    /**
     * @param \RetailCrm\Service\RequestDataFilter $filter
     *
     * @return TopRequestFactory
     */
    public function setFilter(RequestDataFilter $filter): TopRequestFactory
    {
        $this->filter = $filter;
        return $this;
    }

    /**
     * @param \JMS\Serializer\Serializer|\JMS\Serializer\SerializerInterface $serializer
     *
     * @return TopRequestFactory
     */
    public function setSerializer($serializer): TopRequestFactory
    {
        $this->serializer = $serializer;
        return $this;
    }

    /**
     * @param \Psr\Http\Message\StreamFactoryInterface $streamFactory
     *
     * @return TopRequestFactory
     */
    public function setStreamFactory(StreamFactoryInterface $streamFactory): TopRequestFactory
    {
        $this->streamFactory = $streamFactory;
        return $this;
    }

    /**
     * @param \Psr\Http\Message\RequestFactoryInterface $requestFactory
     *
     * @return TopRequestFactory
     */
    public function setRequestFactory(RequestFactoryInterface $requestFactory): TopRequestFactory
    {
        $this->requestFactory = $requestFactory;
        return $this;
    }

    /**
     * @param \Psr\Http\Message\UriFactoryInterface $uriFactory
     *
     * @return TopRequestFactory
     */
    public function setUriFactory(UriFactoryInterface $uriFactory): TopRequestFactory
    {
        $this->uriFactory = $uriFactory;
        return $this;
    }

    /**
     * @param \RetailCrm\Model\Request\BaseRequest         $request
     * @param \RetailCrm\Interfaces\AppDataInterface       $appData
     *
     * @return \Psr\Http\Message\RequestInterface
     * @throws \RetailCrm\Component\Exception\FactoryException
     */
    public function fromModel(
        BaseRequest $request,
        AppDataInterface $appData
    ): RequestInterface {
        $requestData = $this->serializer->toArray($request);
        $requestHasBinaryData = $this->filter->hasBinaryFromRequestData($requestData);

        ksort($requestData);

        if (empty($requestData)) {
            throw new FactoryException('Empty request data');
        }

        if ($requestHasBinaryData) {
            return $this->makeMultipartRequest($appData->getServiceUrl(), $requestData);
        }

        //TODO
        // And how this call should process arrays? It will process them, yes.
        // But in which format AliExpress TOP expects that? Should definitely check that.
        $queryData = http_build_query($requestData);

        try {
            return $this->requestFactory
                ->createRequest(
                    'GET',
                    $this->uriFactory->createUri($appData->getServiceUrl())->withQuery($queryData)
                )->withHeader('Content-Type', 'application/x-www-form-urlencoded');
        } catch (\Exception $exception) {
            throw new FactoryException(
                sprintf('Error building request: %s', $exception->getMessage()),
                0,
                $exception
            );
        }
    }

    /**
     * @param string $endpoint
     * @param array  $contents
     *
     * @return \Psr\Http\Message\RequestInterface
     */
    private function makeMultipartRequest(string $endpoint, array $contents): RequestInterface
    {
        $builder = new MultipartStreamBuilder($this->streamFactory);

        foreach ($contents as $param => $value) {
            if ($value instanceof FileItemInterface) {
                $builder->addResource($param, $value->getStream(), ['filename' => $value->getFileName()]);
            } else {
                $casted = $this->castValue($value);

                if (null !== $casted) {
                    $builder->addResource($param, $casted);
                }
            }
        }

        $stream = $builder->build();

        if ($stream->isSeekable()) {
            $stream->seek(0);
        }

        return $this->requestFactory
            ->createRequest('POST', $this->uriFactory->createUri($endpoint))
            ->withBody($stream)
            ->withHeader('Content-Type', 'multipart/form-data; boundary="'.$builder->getBoundary().'"');
    }

    /**
     * Cast any type to one supported by MultipartStreamBuilder. NULL should be ignored.
     *
     * @param mixed $value
     *
     * @return string|resource|null
     */
    private function castValue($value)
    {
        $type = gettype($value);

        switch ($type) {
            case 'resource':
            case 'NULL':
                return $value;
            case 'boolean':
            case 'integer':
            case 'double':
            case 'string':
                return (string) $value;
            default:
                throw new UnexpectedValueException(sprintf('Got value with unsupported type: %s', $type));
        }
    }
}
