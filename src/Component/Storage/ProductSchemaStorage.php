<?php
/**
 * PHP version 7.3
 *
 * @category ProductSchemaStorage
 * @package  RetailCrm\Component\Storage
 */

namespace RetailCrm\Component\Storage;

use JsonException;
use Cache\Adapter\Common\CacheItem;
use Psr\Cache\CacheItemPoolInterface;
use Psr\Cache\InvalidArgumentException;
use RetailCrm\Component\Exception\FactoryException;
use RetailCrm\Component\Exception\TopApiException;
use RetailCrm\Component\Exception\TopClientException;
use RetailCrm\Component\Exception\ValidationException;
use RetailCrm\Interfaces\TopClientInterface;
use RetailCrm\Model\Request\AliExpress\SolutionProductSchemaGet;
use RetailCrm\Model\Response\ErrorResponseBody;

/**
 * Class ProductSchemaStorage
 *
 * @category ProductSchemaStorage
 * @package  RetailCrm\Component\Storage
 */
class ProductSchemaStorage
{
    /** @var TopClientInterface */
    private $client;

    /** @var CacheItemPoolInterface $cache */
    private $cache;

    /**
     * ProductSchemaStorage constructor.
     *
     * @param \RetailCrm\Interfaces\TopClientInterface $client
     * @param \Psr\Cache\CacheItemPoolInterface        $cache
     */
    public function __construct(TopClientInterface $client, CacheItemPoolInterface $cache)
    {
        $this->client = $client;
        $this->cache = $cache;
    }

    /**
     * Returns product schema (updates it automatically if it's TTL has expired)
     *
     * @param int $categoryId
     * @param int $ttl in seconds
     *
     * @return string
     * @throws \RetailCrm\Component\Exception\TopClientException
     * @throws \RetailCrm\Component\Exception\TopApiException
     */
    public function getProductSchema(int $categoryId, int $ttl = 86400): string
    {
        $cacheId = self::getCacheItemId($categoryId);
        $item = $this->getFromCache($cacheId);

        if (!empty($item) && null === self::validateJson($item)) {
            return $item;
        }

        $request = new SolutionProductSchemaGet();
        $request->aliexpressCategoryId = $categoryId;

        try {
            /** @var \RetailCrm\Model\Response\AliExpress\SolutionProductSchemaGetResponse $response */
            $response = $this->client->sendAuthenticatedRequest($request);
        } catch (FactoryException | TopApiException | TopClientException | ValidationException $exception) {
            throw new TopClientException('Failed to obtain product schema', 0, $exception);
        }

        if ($response->responseData->result->success && !empty($response->responseData->result->schema)) {
            $error = self::validateJson($response->responseData->result->schema);

            if (null !== $error) {
                throw new TopClientException('Failed to obtain product schema', 0, $error);
            }

            $this->saveToCache($cacheId, $response->responseData->result->schema);

            return $response->responseData->result->schema;
        }

        $error = new ErrorResponseBody();
        $error->msg = $response->responseData->result->errorMessage;
        $error->code = (int) $response->responseData->result->errorCode;
        $error->requestId = $response->requestId;

        throw new TopApiException($error);
    }

    /**
     * @param string $cacheId
     *
     * @return string
     */
    private function getFromCache(string $cacheId): string
    {
        try {
            if ($this->cache->hasItem($cacheId)) {
                $item = $this->cache->getItem($cacheId)->get();

                if (!is_string($item) || empty($item)) {
                    return '';
                }

                return $item;
            }
        } catch (InvalidArgumentException $e) {
        }

        return '';
    }

    /**
     * @param string $cacheId
     * @param string $contents
     *
     * @return bool
     */
    private function saveToCache(string $cacheId, string $contents): bool
    {
        $item = new CacheItem($cacheId, false, $contents);
        $item->expiresAfter(86400);

        return $this->cache->save($item);
    }

    /**
     * @param string $json
     *
     * @return \JsonException|null
     */
    private static function validateJson(string $json): ?JsonException
    {
        try {
            json_decode($json, false, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $exception) {
            return $exception;
        }

        return null;
    }

    /**
     * @param int $categoryId
     *
     * @return string
     */
    private static function getCacheItemId(int $categoryId): string
    {
        return sprintf('aliexpressProductSchemaEntry_%d', $categoryId);
    }
}
