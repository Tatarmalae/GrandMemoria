<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Diag\Debug;
use Dev\Catalog;

/**
 * @var $arMenu
 * @var $aMenuLinks
 */
global $APPLICATION;

try {
    $arMenu = Catalog::getIBlockListByTypeID('info');
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}
$aMenuLinksExt = [];
foreach ($arMenu as $key => $item) {
    $aMenuLinksExt[$key][] = $item['NAME'];
    $aMenuLinksExt[$key][] = \CIBlock::ReplaceDetailUrl($item['LIST_PAGE_URL'], [], true, 'S');
    $aMenuLinksExt[$key][] = [];
    $aMenuLinksExt[$key][] = [];
    $aMenuLinksExt[$key][] = "";
}
$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);