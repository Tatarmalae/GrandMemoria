<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 * @var $arResult
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

$cp = $this->__component;
if (is_object($cp)) {
    $image_social = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE']['ID'], [
        'width' => 512,
        'height' => 512,
    ], BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true, []);
    $arResult['SOCIAL_PICTURE'] = $image_social;
    $cp->SetResultCacheKeys(['SOCIAL_PICTURE']);
}