<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var $arResult
 * @var $arParams
 * @var $arrFilterProduct
 */

use Bitrix\Main\Diag\Debug;
use Dev\Catalog;

if (is_array($arParams['~SORT_ORDER1'])) {
    $tmp = [];
    foreach ($arParams['~SORT_ORDER1'] as $arParam) {
        try {
            $tmp[] = Catalog::getElementByID($arParam);
        } catch (Throwable $e) {
            Debug::dumpToFile($e->getMessage());
        }
    }
    $arResult['ITEMS'] = $tmp;
}