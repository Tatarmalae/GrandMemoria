<?php

declare(strict_types=1);

namespace Rarus\ImageMinify\Main;

use Bitrix\Iblock\SectionTable;
use CIBlock;

/**
 * Utility class
 */
class Utility
{
    /**
     * Getting a list of information block sections
     *
     * @param array $parameters
     * @return array
     * @throws \Bitrix\Main\ObjectPropertyException
     * @throws \Bitrix\Main\SystemException
     * @throws \Bitrix\Main\ArgumentException
     */
    public static function getIblockSections(array $parameters = []): array
    {
        $result = [];

        $sectionsRaw = SectionTable::getList($parameters);

        while ($section = $sectionsRaw->fetch()) {
            $result[] = $section;
        }

        return $result;
    }

    /**
     * Returns an array of element IDs
     *
     * @param array $iblockListId
     *
     * @return array
     */
    public static function getElementsIdList(array $iblockListId): array
    {
        $result = [];

        foreach ($iblockListId as $iblockId) {
            $elements = Utility::getIblockElements(
                [],
                ['IBLOCK_ID' => $iblockId],
                ['ID']
            );

            foreach ($elements as $element) {
                $result[] = $element['ID'];
            }
        }

        return $result;
    }

    /**
     * Get element by filter
     *
     * @param array $order
     * @param array $filter
     * @param array $select
     * @return array
     */
    public static function getIblockElements(array $order = [], array $filter = [], array $select = []): array
    {
        $res = \CIBlockElement::GetList($order, $filter, false, false, $select);

        $result = [];

        while ($element = $res->Fetch()) {
            $result[] = $element;
        }

        return $result;
    }

    /**
     * Get convert iblock list
     *
     * @return array
     */
    public static function getConvertIblock(): array
    {
        $data = self::getIBlockList([], [], ['ID', 'NAME']);

        $result = [];
        if (count($data) > 0) {
            foreach ($data as $key => $item) {
                $optionId = 'rim_convert_iblock_' . $item['ID'];
                $optionValue = \Rarus\ImageMinify\Main\Module::getDbOption($optionId) ?: '';
                $result[$key] = [
                    'id'          => $item['ID'],
                    'label'       => $item['NAME'],
                    'optionId'    => $optionId,
                    'optionValue' => $optionValue
                ];
            }
        }

        return $result;
    }

    /**
     * Set db option
     *
     * @param array $options
     *
     * @return bool
     */
    public static function setConvertedIblock(array $options): bool
    {
        if (count($options) > 0) {
            foreach ($options as $name => $value) {
                Module::setDbOption($name, $value);
            }
            return true;
        }

        return false;
    }

    /**
     * Check allowed convert iblock pictures
     *
     * @param string $optionName
     *
     * @return bool
     */
    public static function isAllowConvertIblock(string $optionName): bool
    {
        if ($optionName !== '') {
            return Module::getDbOption($optionName) === 'Y';
        }

        return false;
    }

    /**
     * Check the file extension for an image (jpg,jpeg and png)
     *
     * @param string $filePath
     * @return bool
     */
    public static function isPictureFile(string $filePath): bool
    {
        $mimeType = strtolower(mb_substr($filePath, -3));

        return 'jpg' === $mimeType || 'png' === $mimeType || 'jpeg' === strtolower(mb_substr($filePath, -4));
    }

    /**
     * Get IBlock list
     *
     * @param array $order
     * @param array $filter
     * @param array $select
     * @return array
     */
    public static function getIBlockList(array $order = [], array $filter = [], array $select = []): array
    {
        $result = [];
        $iblockDB = CIBlock::GetList($order, $filter);

        $iblockList = $iblockDB->Fetch();
        while ($iblockList) {
            $fields = [];
            if (count($select) > 0) {
                foreach ($select as $selectItem) {
                    if (array_key_exists($selectItem, $iblockList)) {
                        $fields[$selectItem] = $iblockList[$selectItem];
                    }
                }
            }
            $result[] = (count($fields) > 0) ? $fields : $iblockList;
            $iblockList = $iblockDB->Fetch();
        }

        return $result;
    }

    /**
     * Get File data
     *
     * @param int $fileId
     * @return array
     */
    public static function getFileData(int $fileId): array
    {
        $result = [];

        if ($fileId > 0) {
            $fileRaw = \CFile::GetByID($fileId);

            $file = $fileRaw->Fetch();

            while (false !== $file) {
                $result[] = $file;
                $file = $fileRaw->Fetch();
            }
        }

        return $result;
    }

    /**
     * Writing logs to a file
     *
     * @param array  $data
     * @param string $path
     * @return void
     */
    public static function writeLog(array $data, string $path = '/logs/log.txt'): void
    {
        $log = date('Y-m-d H:i:s') . ' ';
        $log .= str_replace(['	', PHP_EOL], '', print_r($data, true));
        file_put_contents($path, trim($log) . PHP_EOL, FILE_APPEND);
    }
}
