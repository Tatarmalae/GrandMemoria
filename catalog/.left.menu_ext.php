<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $aMenuLinks
 */
global $APPLICATION;

$aMenuLinksExt = $APPLICATION->IncludeComponent(
    "bitrix:menu.sections",
    "",
    [
        "IS_SEF" => "Y",
        "SEF_BASE_URL" => "/catalog/",
        "SECTION_PAGE_URL" => "#SECTION_CODE_PATH#/",
        "DETAIL_PAGE_URL" => "#SECTION_CODE_PATH#/#ELEMENT_ID#",
        "IBLOCK_TYPE" => "catalog",
        "IBLOCK_ID" => "12",
        "DEPTH_LEVEL" => "2",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
    ],
    false
);
$aMenuLinks = array_merge($aMenuLinksExt, $aMenuLinks);