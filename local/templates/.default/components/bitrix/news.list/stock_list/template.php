<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $arResult
 * @var $arParams
 */
?>
<?php if (count($arResult["ITEMS"]) > 0): ?>
    <section class="<?= ($arParams['CLASS'] !== 'white') ? 'section_padding bg_black-haze ' : '' ?>stock">
        <div class="content">
            <div class="heading">
                <div class="heading__content">
                    <h2><?= $arParams['TITLE'] ?></h2>
                </div>
            </div>
            <div class="stock-items items" data-type="slider">
                <div class="swiper-container base-slider" data-count="2">
                    <div class="slider-wrap swiper-wrapper">
                        <?php foreach ($arResult["ITEMS"] as $arItem): ?>
                            <div class="slider-slide swiper-slide">
                                <div class="stock-item item">
                                    <div class="<?= !empty($arItem['PREVIEW_PICTURE']['ID']) ? 'box' : 'stock-info' ?>">
                                        <?php if (!empty($arItem['PREVIEW_PICTURE']['ID'])): ?>
                                            <div class="stock-item__img img">
                                                <div class="img__inner object-fit">
                                                    <picture>
                                                        <source media="(max-width:1279px)" data-srcset="<?= CFile::GetPath($arItem['PREVIEW_PICTURE']['ID']) ?>" srcset="">
                                                        <img class="lazy" data-src="<?= CFile::GetPath($arItem['PREVIEW_PICTURE']['ID']) ?>" alt="<?= $arItem['NAME'] ?>" src="">
                                                    </picture>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <div class="stock-bg">
                                                <picture>
                                                    <source media="(max-width:1279px)" data-srcset="<?= SITE_STYLE_PATH ?>/img/content/articles/bg.svg" srcset="">
                                                    <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/articles/bg.svg" alt="<?= $arItem['NAME'] ?>" src="">
                                                </picture>
                                            </div>
                                        <?php endif ?>
                                        <div class="stock-item__content">
                                            <?php if (!empty($arItem['IBLOCK_SECTION']['NAME'])): ?>
                                                <span class="label label_small label_marengo">
                                                    <?= $arItem['IBLOCK_SECTION']['NAME'] ?>
                                                </span>
                                            <?php endif ?>
                                            <h4>
                                                <?= $arItem['NAME'] ?>
                                            </h4>
                                            <?php if (!empty($arItem['PREVIEW_TEXT'])): ?>
                                                <?= $arItem['PREVIEW_TEXT'] ?>
                                            <?php endif ?>
                                            <div class="more-btn">
                                                <a class="btn btn-blue big btn-block" href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                                                    <span class="btn__text">
                                                        <span data-text="Посмотреть">Посмотреть</span>
                                                    </span>
                                                </a>
                                            </div>
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
        </div>
    </section>
<?php endif ?>
