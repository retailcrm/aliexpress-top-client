<?php

/**
 * PHP version 7.3
 *
 * @category AppDataInterface
 * @package  RetailCrm\Interfaces
 */

namespace RetailCrm\Interfaces;

/**
 * Interface AppDataInterface
 *
 * @category AppDataInterface
 * @package  RetailCrm\Interfaces
 */
interface AppDataInterface
{
    /**
     * @return string
     */
    public function getServiceUrl(): string;

    /**
     * @return string
     */
    public function getAppKey(): string;

    /**
     * @return string
     */
    public function getAppSecret(): string;

    /**
     * @return string
     */
    public function getRedirectUri(): string;
}
