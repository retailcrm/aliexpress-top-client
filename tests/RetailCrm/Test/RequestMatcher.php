<?php
/**
 * PHP version 7.4
 *
 * @category RequestMatcher
 * @package  RetailCrm\Test
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Test;

use Http\Message\RequestMatcher as RequestMatcherInterface;
use Psr\Http\Message\RequestInterface;

/**
 * Class RequestMatcher
 *
 * @category RequestMatcher
 * @package  RetailCrm\Test
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class RequestMatcher implements RequestMatcherInterface
{
    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $host;

    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $scheme;

    /**
     * @var array
     */
    private $headers = [];

    /**
     * @var array
     */
    private $optionalHeaders = [];

    /**
     * @var array
     */
    private $queryParams = [];

    /**
     * @var array
     */
    private $optionalQueryParams = [];

    /**
     * RequestMatcher constructor.
     *
     * @param string $host
     */
    private function __construct(string $host)
    {
        $this->host = $host;
    }

    /**
     * @param string $host
     *
     * @return \RetailCrm\Test\RequestMatcher
     */
    public static function createMatcher(string $host): RequestMatcher
    {
        return new self($host);
    }

    /**
     * @param string $path
     *
     * @return RequestMatcher
     */
    public function setPath(string $path): RequestMatcher
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @param string $method
     *
     * @return RequestMatcher
     */
    public function setMethod(string $method): RequestMatcher
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @param string $scheme
     *
     * @return RequestMatcher
     */
    public function setScheme(string $scheme): RequestMatcher
    {
        $this->scheme = $scheme;
        return $this;
    }

    /**
     * @param array $headers
     *
     * @return RequestMatcher
     */
    public function setHeaders(array $headers): RequestMatcher
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * @param array $optionalHeaders
     *
     * @return RequestMatcher
     */
    public function setOptionalHeaders(array $optionalHeaders): RequestMatcher
    {
        $this->optionalHeaders = $optionalHeaders;
        return $this;
    }

    /**
     * @param array $queryParams
     *
     * @return RequestMatcher
     */
    public function setQueryParams(array $queryParams): RequestMatcher
    {
        $this->queryParams = $queryParams;
        return $this;
    }

    /**
     * @param array $optionalQueryParams
     *
     * @return RequestMatcher
     */
    public function setOptionalQueryParams(array $optionalQueryParams): RequestMatcher
    {
        $this->optionalQueryParams = $optionalQueryParams;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function matches(RequestInterface $request)
    {
        if ($this->scheme && strtoupper($request->getUri()->getScheme()) !== strtoupper($this->scheme)) {
            return false;
        }

        if ($this->method && strtoupper($request->getMethod()) !== strtoupper($this->method)) {
            return false;
        }

        if (null !== $this->path && !preg_match('{'.$this->path.'}', rawurldecode($request->getUri()->getPath()))) {
            return false;
        }

        if (null !== $this->host && $this->host !== $request->getUri()->getHost()) {
            return false;
        }

        if (!empty($this->headers) && count(array_diff_assoc($this->headers, $request->getHeaders())) > 0) {
            return false;
        }

        if (!empty($this->queryParams)
            && count(array_diff_assoc($this->queryParams, $this->getQueryData($request->getUri()->getQuery()))) > 0
        ) {
            return false;
        }

        if (!empty($this->optionalHeaders)
            && !$this->firstArrayPresentInSecond($this->optionalHeaders, $request->getHeaders())
        ) {
            return false;
        }

        if (!empty($this->optionalQueryParams)
            && !$this->firstArrayPresentInSecond(
                $this->optionalQueryParams,
                $this->getQueryData($request->getUri()->getQuery())
            )
        ) {
            return false;
        }

        return true;
    }

    /**
     * @param array $first
     * @param array $second
     *
     * @return bool
     */
    private function firstArrayPresentInSecond(array $first, array $second): bool
    {
        return count(array_diff_assoc($first, array_intersect_assoc($first, $second))) === 0;
    }

    /**
     * @param string $query
     *
     * @return array
     */
    private function getQueryData(string $query): array
    {
        $list = [];
        parse_str($query, $list);

        return $list;
    }
}
