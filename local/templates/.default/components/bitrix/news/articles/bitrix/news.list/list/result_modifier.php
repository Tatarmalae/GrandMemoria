<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var $arResult
 */

use Bitrix\Main\Diag\Debug;
use Dev\Catalog;

foreach ($arResult["ITEMS"] as $key => $arItem) {
    try {
        $arResult["ITEMS"][$key]['IBLOCK_SECTION'] = Catalog::getSectionByID($arItem['IBLOCK_SECTION_ID']);
    } catch (Throwable $e) {
        $arResult["ITEMS"][$key]['IBLOCK_SECTION'] = '';
        Debug::dumpToFile($e->getMessage());
    }
}