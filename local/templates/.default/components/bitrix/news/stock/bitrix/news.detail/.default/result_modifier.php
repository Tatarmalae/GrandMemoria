<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var $arParams
 * @var $arResult
 */

use Bitrix\Main\Diag\Debug;
use Dev\Catalog;

try {
    $arResult['IBLOCK_SECTION'] = Catalog::getSectionByID($arResult['IBLOCK_SECTION_ID']);
} catch (Throwable $e) {
    $arResult['IBLOCK_SECTION'] = '';
    Debug::dumpToFile($e->getMessage());
}