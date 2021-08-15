<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $arParams
 */

use Bitrix\Main\Diag\Debug;
use Dev\Catalog;

try {
    $arResult['TAGS'] = Catalog::getIBlockSections($arParams['IBLOCK_ID']);
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}