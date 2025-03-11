<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<?php if (!empty($arResult['PROPERTIES']['ELEMENTS']['VALUE'])): ?>
    <?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/components/section_list.php", ['ELEMENT_LIST' => $arResult['PROPERTIES']['ELEMENTS']['VALUE']], ['SHOW_BORDER' => true]); ?>
<?php endif ?>
<br>
<article class="truncate">
    <?= $arResult['DETAIL_TEXT'] ?>
</article>
<br>
<a href="javascript:void(0);" class="more__link read-more" style="display: none;">Посмотреть полностью</a>
<?php if (!empty($arResult['PROPERTIES']['STOCK_SLIDER']['VALUE'])): ?>
    <?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/components/stock_slider.php", ['STOCK_SLIDER' => $arResult['PROPERTIES']['STOCK_SLIDER']['VALUE'], 'SLIDER_CATALOG' => 'Y'], ['SHOW_BORDER' => true]); ?>
<?php endif ?>
<style>
    article.truncate {
        overflow: hidden !important;
        -webkit-box-orient: vertical !important;
        -webkit-line-clamp: 10 !important;
        display: -webkit-box !important;
    }

    article.truncate.expanded {
        -webkit-line-clamp: unset !important;
    }
</style>