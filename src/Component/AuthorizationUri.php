<?php
/**
 * PHP version 7.3
 *
 * @category AuthorizationUri
 * @package  RetailCrm\Component
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  http://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */

namespace RetailCrm\Component;

/**
 * Class AuthorizationUri
 *
 * @category AuthorizationUri
 * @package  RetailCrm\Component
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  https://retailcrm.ru Proprietary
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class AuthorizationUri
{
    /** @var string $address */
    private $address;

    /** @var string $state */
    private $state;

    /**
     * AuthorizationUri constructor.
     *
     * @param string      $address
     * @param string|null $state
     */
    public function __construct(string $address, ?string $state)
    {
        $this->address = $address;
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getState(): string
    {
        return $this->state;
    }
}
