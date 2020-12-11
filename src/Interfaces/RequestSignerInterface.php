<?php

/**
 * PHP version 7.3
 *
 * @category RequestSignerInterface
 * @package  RetailCrm\Interfaces
 */

namespace RetailCrm\Interfaces;

/**
 * Interface RequestSignerInterface
 *
 * @category RequestSignerInterface
 * @package  RetailCrm\Interfaces
 */
interface RequestSignerInterface
{
    /**
     * Generate sign for provided request data.
     *
     * @param array                                  $request
     * @param \RetailCrm\Interfaces\AppDataInterface $appData
     * @param string                                 $signMethod
     *
     * @return string
     * @throws \RetailCrm\Component\Exception\NotImplementedException
     */
    public function generateSign(array $request, AppDataInterface $appData, string $signMethod): string;
}
