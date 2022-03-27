<?php

use Bitrix\Main\Diag\Debug;
use Dev\Catalog;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $aMenuLinks
 * @var $arResult
 * @var $APPLICATION
 */

try {
    $arResult = Catalog::getElementList('15');
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}

$aMenuLinksExt = [];
foreach ($arResult as $item) {
    $aMenuLinksExt[] = [
        $item['NAME'],
        $item['DETAIL_PAGE_URL'],
        [],
        [],
        "",
    ];
}

$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);