<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $arResult
 */

if ($arResult['SEO']['SECTION_META_TITLE']) {
    $GLOBALS['APPLICATION']->SetPageProperty('title', $arResult['SEO']['SECTION_META_TITLE']);
}
if ($arResult['SEO']['SECTION_META_DESCRIPTION']) {
    $GLOBALS['APPLICATION']->SetPageProperty('description', $arResult['SEO']['SECTION_META_DESCRIPTION']);
}
if ($arResult['SEO']['SECTION_META_KEYWORDS']) {
    $GLOBALS['APPLICATION']->SetPageProperty('keywords', $arResult['SEO']['SECTION_META_KEYWORDS']);
}
if ($arResult['SEO']['SECTION_PAGE_TITLE']) {
    $GLOBALS['APPLICATION']->SetTitle($arResult['SEO']['SECTION_PAGE_TITLE']);
}