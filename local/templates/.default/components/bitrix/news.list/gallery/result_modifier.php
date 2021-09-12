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
foreach($arResult['TAGS'] as $key => $tag){
    $arResult['TAGS'][$key]['PROPS'] = Catalog::getSectionProps($arParams['IBLOCK_ID'], $tag['ID']);
}

foreach ($arResult["ITEMS"] as $key => $arItem) {
    if (!empty($arItem['PROPERTIES']['PRODUCT']['VALUE'])) {
        $el_res = CIBlockElement::GetByID($arItem['PROPERTIES']['PRODUCT']['VALUE']);
        if ($el_arr = $el_res->GetNext()) {
            $arResult["ITEMS"][$key]['PROPERTIES']['PRODUCT']['VALUE'] =  \CIBlock::ReplaceDetailUrl($el_arr['DETAIL_PAGE_URL'], $el_arr, false, 'E');
        }
    }
}