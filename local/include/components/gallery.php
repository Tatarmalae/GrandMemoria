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
    $arResult['IBLOCK'] = Catalog::getIBlock(17);
    $arResult['ITEMS'] = Catalog::getElementList(17);
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}
if (count($arResult['ITEMS']) == 0) return;
?>
<section class="section_padding section_black-haze gallery">
    <div class="content">
        <div class="heading">
            <div class="heading__content">
                <h2><?= $arResult['IBLOCK']['NAME'] ?></h2>
            </div>
        </div>
        <div class="gallery-items items">
            <div class="swiper-container base-slider" data-count="2">
                <div class="slider-wrap swiper-wrapper">
                    <?php foreach ($arResult['ITEMS'] as $key => $item): ?>
                        <div class="slider-slide swiper-slide">
                            <a class="gallery-item item" href="#" data-toggle="modal" data-target="#modalGallery_<?= $key ?>">
                                <div class="gallery-item__img img img-16by9">
                                    <div class="gallery__zoom">
                                        <div class="gallery__zoom-inner">
                                            <svg class="icon__search" width="14" height="14">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#search"></use>
                                            </svg>
                                            <span>Смотреть</span>
                                        </div>
                                    </div>
                                    <div class="img__inner object-fit">
                                        <img class="lazy" data-src="<?= CFile::GetPath($item['PREVIEW_PICTURE']) ?>" alt="<?= $item['NAME'] ?>" src="">
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
<?php foreach ($arResult['ITEMS'] as $key => $item): ?>
    <div class="modal fade" id="modalGallery_<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="modalGalleryLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button class="modal-close" type="button" data-dismiss="modal" aria-label="Close">
                    <svg class="icon__close-modal" width="48" height="48">
                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#close-modal"></use>
                    </svg>
                </button>
                <div class="modal-body">
                    <a class="logo-link" href="<?= SITE_DIR ?>">
                        <div class="logo">
                            <img src="<?= SITE_STYLE_PATH ?>/img/general/logo.svg" alt="<?= SITE_SERVER_NAME ?>"/>
                        </div>
                    </a>
                    <div class="modal-scroll">
                        <div class="modal-scroll__inner">
                            <div class="modal-gallery">
                                <div class="modal-gallery__img">
                                    <div class="gallery-item">
                                        <div class="gallery-item__img img img-1by1">
                                            <div class="img__inner object-fit">
                                                <img class="lazy" src="" data-src="<?= CFile::GetPath($item['PREVIEW_PICTURE']) ?>" alt="<?= $item['NAME'] ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
