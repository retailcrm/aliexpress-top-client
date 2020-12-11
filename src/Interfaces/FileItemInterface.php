<?php

/**
 * PHP version 7.3
 *
 * @category FileItemInterface
 * @package  RetailCrm\Interfaces
 */

namespace RetailCrm\Interfaces;

use Psr\Http\Message\StreamInterface;

/**
 * Interface FileItemInterface
 *
 * @category FileItemInterface
 * @package  RetailCrm\Interfaces
 */
interface FileItemInterface
{
    /**
     * @return string
     */
    public function getFileName(): string;

    /**
     * @return \Psr\Http\Message\StreamInterface
     */
    public function getStream(): StreamInterface;
}
