<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Diag\Debug;
use Dev\Catalog;

/**
 * @var $arResult
 * @var $arParams
 * @var $APPLICATION
 */

try {
    $arResult['IBLOCK'] = Catalog::getIBlock(41);
    $arResult['ITEMS'] = Catalog::getElementList(41);
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}
if (count($arResult['ITEMS']) == 0) return;
?>
<section class="topical bg_black-haze section_padding">
    <div class="content">
        <div class="heading">
            <div class="heading__content">
                <h2><?= $arResult['IBLOCK']['NAME'] ?></h2>
            </div>
        </div>
        <div class="topical-items items" data-type="slider">
            <div class="swiper-container base-slider" data-count="3">
                <div class="slider-wrap swiper-wrapper">
                    <?php foreach ($arResult['ITEMS'] as $item): ?>
                        <div class="slider-slide swiper-slide">
                            <div class="topical-item item">
                                <div class="box">
                                    <time datetime="<?= (new \DateTime($item['ACTIVE_FROM']))->format('d.m.Y') ?>">
                                        <?= (new \DateTime($item['ACTIVE_FROM']))->format('d.m.Y') ?>
                                    </time>
                                    <p><?= $item['PREVIEW_TEXT'] ?></p>
                                    <?php if ($item['PROPERTIES']['BUTTON_TEXT']['VALUE']): ?>
                                        <div class="more">
                                            <a class="more__link" href="<?= $item['PROPERTIES']['LINK']['VALUE'] ?>"<?= $item['PROPERTIES']['TARGET']['VALUE'] ? " target='_blank'" : '' ?>>
                                                <span><?= $item['PROPERTIES']['BUTTON_TEXT']['VALUE'] ?></span>
                                                <svg class="icon__arrow-right" width="24" height="24">
                                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                                                </svg>
                                            </a>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
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