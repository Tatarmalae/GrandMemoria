<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var $arParams
 * @var $arResult
 */

use Bitrix\Main\Diag\Debug;
use Dev\Catalog;

try {
    $arResult['TAGS'] = Catalog::getIBlockSections($arParams['IBLOCK_ID']);
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}

$HLBlockTableName = $arResult["ITEMS"][0]['PROPERTIES']['PLACEMENT']['USER_TYPE_SETTINGS']['TABLE_NAME'];
foreach ($arResult["ITEMS"] as $key => $arItem) {
    try {
        $arResult["ITEMS"][$key]['IBLOCK_SECTION'] = Catalog::getSectionByID($arItem['IBLOCK_SECTION_ID']);
    } catch (Throwable $e) {
        $arResult["ITEMS"][$key]['IBLOCK_SECTION'] = '';
        Debug::dumpToFile($e->getMessage());
    }

    try {
        $arResult["ITEMS"][$key]['PROPERTIES']['PLACEMENT']['VALUE'] = Catalog::getHLBlockByTableName($HLBlockTableName, $arItem['PROPERTIES']['PLACEMENT']['VALUE'])[0];
    } catch (Throwable $e) {
        $arResult["ITEMS"][$key]['IBLOCK_SECTION'] = '';
        Debug::dumpToFile($e->getMessage());
    }
}