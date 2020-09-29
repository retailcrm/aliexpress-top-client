<?php

/**
 * PHP version 7.3
 *
 * @category RequestDataFilter
 * @package  RetailCrm\Service
 * @author   RetailCRM <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      http://help.retailcrm.ru
 */
namespace RetailCrm\Service;

use RetailCrm\Interfaces\FileItemInterface;

/**
 * Class RequestDataFilter
 *
 * @category RequestDataFilter
 * @package  RetailCrm\Service
 * @author   RetailDriver LLC <integration@retailcrm.ru>
 * @license  MIT
 * @link     http://retailcrm.ru
 * @see      https://help.retailcrm.ru
 */
class RequestDataFilter
{
    /**
     * @param array $params
     *
     * @return array
     */
    public function filterBinaryFromRequestData(array $params): array
    {
        return array_filter(array_filter(
            $params,
            static function ($item) {
                return !($item instanceof FileItemInterface);
            }
        ));
    }

    /**
     * @param array $params
     *
     * @return bool
     */
    public function hasBinaryFromRequestData(array $params): bool
    {
        foreach ($params as $item) {
            if ($item instanceof FileItemInterface) {
                return true;
            }
        }

        return false;
    }
}
