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
    $arResult['IBLOCK'] = Catalog::getIBlock(16);
    $arResult['ITEMS'] = Catalog::getElementList(16);
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}
if (count($arResult['ITEMS']) == 0) return;
?>
<section class="section_padding section_black-haze docs">
    <div class="content">
        <div class="heading">
            <div class="heading__content">
                <h2><?= $arResult['IBLOCK']['NAME'] ?></h2>
            </div>
        </div>
        <div class="docs-items items">
            <div class="swiper-container base-slider" data-count="4">
                <div class="slider-wrap swiper-wrapper">
                    <?php foreach ($arResult['ITEMS'] as $item): ?>
                        <?php $file = CFile::GetFileArray($item['PROPERTIES']['FILE']['VALUE']); ?>
                        <div class="slider-slide swiper-slide">
                            <a class="docs-item item link-item" target="_blank" href="<?= CFile::GetPath($item['PROPERTIES']['FILE']['VALUE']) ?>">
                                <div class="box">
                                    <div class="docs-item__inner">
                                        <h5><?= $item['NAME'] ?></h5>
                                        <span class="docs-item__info"><?= strtoupper(pathinfo($file['FILE_NAME'], PATHINFO_EXTENSION)) ?>, <?= Dev\Utilities::formatBytes($file['FILE_SIZE']) ?></span>
                                        <span class="docs-item__icon">
                                            <svg class="icon__doc" width="24" height="24">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#doc"></use>
                                            </svg>
                                        </span>
                                    </div>
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