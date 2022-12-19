<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var $arParams
 * @var $arResult
 */

use Bitrix\Main\Diag\Debug;
use Dev\Utilities;
use Dev\Catalog;

try {
    $arResult['SECTIONS'] = Utilities::getMultilevelArray($arResult['SECTIONS']);

    foreach ($arResult['SECTIONS'] as $key => $section) {
        $elements = Catalog::getElementMinPriceBySection($arParams['IBLOCK_ID'], $section['ID']);
        if (!empty($elements)) {
            $arResult['SECTIONS'][$key]['MIN_PRICE'] = $elements['PRICE_VALUE'];
        }
    }
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}