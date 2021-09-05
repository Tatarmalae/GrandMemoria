<?php

use Bitrix\Main\Diag\Debug;
use Dev\Catalog;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var $arResult
 * @var $arParams
 * @var $APPLICATION
 */

try {
    $arResult['IBLOCK'] = Catalog::getIBlock(21);
    $arResult['ITEMS'] = Catalog::getElementList(21);
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}
if (count($arResult['ITEMS']) == 0) return;
?>
<section class="team">
    <div class="content">
        <div class="heading">
            <div class="heading__content">
                <h2><?= $arResult['IBLOCK']['NAME'] ?></h2>
            </div>
        </div>
        <div class="team-items items">
            <div class="swiper-container base-slider" data-count="4">
                <div class="slider-wrap swiper-wrapper">
                    <?php foreach ($arResult['ITEMS'] as $item): ?>
                        <div class="slider-slide swiper-slide">
                            <a class="team-item item link-item" href="javascript:void(0);">
                                <div class="team-item__img img img-1by1">
                                    <div class="img__inner object-fit">
                                        <img class="lazy" data-src="<?= CFile::GetPath($item['PREVIEW_PICTURE']) ?>" alt="<?= $item['NAME'] ?>" src="">
                                    </div>
                                </div>
                                <div class="team-item__content">
                                    <h4><?= $item['NAME'] ?></h4>
                                    <?php if (!empty($item['PREVIEW_TEXT'])): ?>
                                        <p><?= $item['PREVIEW_TEXT'] ?></p>
                                    <?php endif ?>
                                </div>
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
</section>