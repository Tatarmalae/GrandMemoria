<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var $arResult
 */

use Bitrix\Main\Diag\Debug;
use Dev\Catalog;

foreach ($arResult['ITEMS'] as $key => $item){
    try {
        $arResult['ITEMS'][$key]['IBLOCK_SECTION_PARENT_ID'] = Catalog::getSectionByID($item['IBLOCK_SECTION_ID'])['IBLOCK_SECTION_ID']?:Catalog::getSectionByID($item['IBLOCK_SECTION_ID'])['ID'];
    } catch (Throwable $e) {
        Debug::dumpToFile($e->getMessage());
    }
}