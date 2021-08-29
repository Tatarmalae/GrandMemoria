<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var $arParams
 * @var $arResult
 */

use Bitrix\Main\Diag\Debug;
use Dev\Utilities;

try {
    $arResult['SECTIONS'] = Utilities::getMultilevelArray($arResult['SECTIONS']);
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}