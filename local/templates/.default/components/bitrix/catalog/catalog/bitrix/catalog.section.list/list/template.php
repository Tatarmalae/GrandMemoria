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
if (count($arResult['SECTIONS']) == 0) return;
?>
<div class="filter-item filter-item_top">
    <div class="filter-row">
        <div class="swiper-container filter-slider">
            <div class="swiper-wrapper">
                <?php foreach ($arResult['SECTIONS'] as $key => $sections): ?>
                    <div class="filter-column swiper-slide">
                        <a class="filter-type box filter-type_<?= $arParams['SECTION_CODE'] === $sections['CODE'] ? 'active' : '' ?>" href="<?= $sections['SECTION_PAGE_URL'] ?>">
                            <span><?= $sections['NAME'] ?></span>
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="slider-arrows slider-arrows_prev">
                <div class="slider-btn slider-btn_prev">
                    <svg class="icon__slider-prev" width="32" height="32">
                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-prev"></use>
                    </svg>
                </div>
            </div>
            <div class="slider-arrows slider-arrows_next">
                <div class="slider-btn slider-btn_next">
                    <svg class="icon__slider-next" width="32" height="32">
                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-next"></use>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>