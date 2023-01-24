<?php

use Bitrix\Main\Diag\Debug;
use Dev\Catalog;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var $arResult
 * @var $arParams
 * @var $APPLICATION
 */

$arResult['STOCK_SLIDER'] = [];
if ($arParams['STOCK_SLIDER']) {
    try {
        $arResult['STOCK_SLIDER'] = Catalog::getElementList(14, '', [], null, ['=ID' => $arParams['STOCK_SLIDER']]);
    } catch (Throwable $e) {
        Debug::dumpToFile($e->getMessage());
    }
}
if (count($arResult['STOCK_SLIDER']) == 0) return;
?>
<div class="poster<?= $arParams['SLIDER_CATALOG'] ? ' poster--catalog' : '' ?>">
    <?= !$arParams['SLIDER_CATALOG'] ? '<div class="content">' : '' ?>
    <div class="poster-wrap">
        <div class="swiper-container poster-slider">
            <div class="slider-wrap swiper-wrapper">
                <?php foreach ($arResult['STOCK_SLIDER'] as $slider): ?>
                    <div class="slider-slide swiper-slide">
                        <a class="poster-box" href="<?= $slider['DETAIL_PAGE_URL'] ?>">
                            <div class="poster-box__bg img">
                                <div class="img__inner object-fit">
                                    <picture>
                                        <source media="(max-width:1279px)" data-srcset="<?= CFile::GetPath($slider['PROPERTIES']['SLIDE_MOBILE']['VALUE']) ?>" srcset="">
                                        <img class="lazy" data-src="<?= CFile::GetPath($slider['PROPERTIES']['SLIDE_DESKTOP']['VALUE']) ?>" alt="<?= $slider['NAME'] ?>" src="">
                                    </picture>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="slider-arrows slider-arrows_prev">
                <div class="slider-btn slider-btn_prev poster-slider__btn" data-type="prev">
                    <svg class="icon__slider-prev" width="32" height="32">
                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-prev"></use>
                    </svg>
                </div>
            </div>
            <div class="slider-arrows slider-arrows_next">
                <div class="slider-btn slider-btn_next poster-slider__btn" data-type="next">
                    <svg class="icon__slider-next" width="32" height="32">
                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-next"></use>
                    </svg>
                </div>
            </div>
        </div>
        <div class="poster-counts">
            <div class="poster-counts__inner">
                <span class="poster-counts__now">00</span>
                /
                <span class="poster-counts__all">00</span>
            </div>
        </div>
    </div>
    <?= !$arParams['SLIDER_CATALOG'] ? '</div>' : '' ?>
</div>