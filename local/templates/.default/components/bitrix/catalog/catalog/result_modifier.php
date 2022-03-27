<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var $arResult
 * @var $arParams
 */

use Bitrix\Iblock\InheritedProperty\SectionValues;
use Dev\Catalog;

if ($arResult['VARIABLES']['ELEMENT_CODE']) return;

$section = Catalog::getSectionByCode($arParams['IBLOCK_ID'], $arResult['VARIABLES']['SECTION_CODE']);
$ipropValues = new SectionValues($arParams['IBLOCK_ID'], $section['ID']);
$SEO = $ipropValues->getValues();
$cp = $this->__component;
if (is_object($cp)) {
    $cp->arResult['SEO'] = $SEO;
    $cp->SetResultCacheKeys(['SEO']);
    $arResult['SEO'] = $cp->arResult['SEO'];
}