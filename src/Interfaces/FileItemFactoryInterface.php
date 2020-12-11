<?php

/**
 * PHP version 7.3
 *
 * @category FactoryInterface
 * @package  RetailCrm\Interfaces
 */

namespace RetailCrm\Interfaces;

/**
 * Interface FileItemFactoryInterface
 *
 * @category FileItemFactoryInterface
 * @package  RetailCrm\Interfaces
 */
interface FileItemFactoryInterface
{
    /**
     * @param string $fileName Name without path
     * @param string $contents
     *
     * @return FileItemInterface
     */
    public function fromString(string $fileName, string $contents): FileItemInterface;

    /**
     * @param string $fileName Name with or without path
     *
     * @return FileItemInterface
     */
    public function fromFile(string $fileName): FileItemInterface;
}
