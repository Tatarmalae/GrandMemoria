<?php

use Bitrix\Main\Diag\Debug;
use Dev\Catalog;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var $arResult
 * @var $arParams
 */

try {
    $arResult = Catalog::getIBlockElementsGroupBySection($arParams['IBLOCK_ID']);
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}