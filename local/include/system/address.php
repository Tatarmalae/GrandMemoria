<?php

use Bitrix\Main\Diag\Debug;
use Dev\Catalog;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var $arResult
 * @var $APPLICATION
 */

try {
    $arResult['CONTRACTS'] = Catalog::getElementList(1);
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}
?>

<?php if (!empty($arResult['CONTRACTS'])): ?>
    <?php $arAddress = [] ?>
    <section class="address">
        <div class="content">
            <div class="heading">
                <div class="heading__content">
                    <h2>Оформить из офиса</h2>
                </div>
            </div>
            <div class="map-wrap">
                <div class="map-items items">
                    <div class="swiper-container base-slider" data-count="4">
                        <div class="slider-wrap swiper-wrapper">
                            <?php foreach ($arResult['CONTRACTS'] as $key => $arItem): ?>
                                <?php $arAddress[][] = $arItem['PROPERTIES']['ADDRESS']['VALUE']; ?>
                                <div class="slider-slide swiper-slide">
                                    <div class="map-item item">
                                        <div class="box">
                                            <?php // TODO: не учли что выводится из контактов и там нет названия Офис №1, телефона ниже и адрес с индексом и длиннее ?>
                                            <h5>Офис №<?= $key + 1 ?></h5>
                                            <div class="map-addresses">
                                                <div class="map-address">
                                                    <div class="map-address">
                                                        <svg class="icon__address" width="14" height="14">
                                                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#address"></use>
                                                        </svg>
                                                        <span class="map-address__desc"><?= $arItem['NAME'] ?></span>
                                                    </div>
                                                </div>
                                                <?php if (!empty($arItem['PROPERTIES']['PHONE']['VALUE'])): ?>
                                                    <a class="map-address" href="tel:<?= preg_replace('~\D+~', '', $arItem['PROPERTIES']['PHONE']['VALUE']) ?>">
                                                        <svg class="icon__phone" width="14" height="14">
                                                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#phone"></use>
                                                        </svg>
                                                        <span class="map-address__desc"><?= $arItem['PROPERTIES']['PHONE']['VALUE'] ?></span>
                                                    </a>
                                                <?php endif ?>
                                            </div>
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
                <?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/map.php", [
                    'ID' => 'map',
                    'ADDRESS' => $arAddress,
                ], ["SHOW_BORDER" => true]); ?>
                <?php unset($arAddress) ?>
            </div>
        </div>
    </section>
<?php endif ?>