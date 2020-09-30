<?php

/**
 * PHP version 7.3
 *
 * @category RequestMatcher
 * @package  RetailCrm\Test
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Test;

use Http\Message\RequestMatcher;
use InvalidArgumentException;
use Psr\Http\Message\RequestInterface;

/**
 * Class ClosureRequestMatcher
 *
 * @category ClosureRequestMatcher
 * @package  RetailCrm\Test
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class ClosureRequestMatcher implements RequestMatcher
{
    /**
     * @var callable $matcher
     */
    private $matcher;

    /**
     * RequestMatcher constructor.
     *
     * @param callable $matcher
     */
    public function __construct(callable $matcher)
    {
        if (!is_callable($matcher)) {
            throw new InvalidArgumentException('Matcher should be callable');
        }

        $this->matcher = $matcher;
    }

    /**
     * @inheritDoc
     */
    public function matches(RequestInterface $request): bool
    {
        $matcher = $this->matcher;
        return $matcher($request);
    }
}
