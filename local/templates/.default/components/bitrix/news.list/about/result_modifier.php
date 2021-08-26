<?php

use Bitrix\Main\Diag\Debug;
use Dev\Catalog;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var $arResult
 */

try {
    $arResult['SECTION'] = Catalog::getSectionByID(current($arResult['ITEMS'])['IBLOCK_SECTION_ID']);
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}