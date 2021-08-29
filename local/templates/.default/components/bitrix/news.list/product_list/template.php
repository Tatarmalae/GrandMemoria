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
<section class="catalog">
    <div class="content">
        <div class="heading">
            <div class="heading__content">
                <h2><?= $arParams['TITLE'] ?></h2>
            </div>
        </div>
        <div class="catalog-items items" data-type="column">
            <div class="swiper-container base-slider" data-count="4">
                <div class="slider-wrap swiper-wrapper">
                    <?php foreach ($arResult["ITEMS"] as $arItem): ?>
                        <?php
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), ["CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]);
                        $thumb = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'], [
                            'width' => 270,
                            'height' => 270,
                        ], BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true, []);
                        ?>
                        <div class="slider-slide swiper-slide">
                            <a class="catalog-item item link-item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>" href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
                                <div class="catalog-item__img img">
                                    <div class="img__inner object-fit">
                                        <img class="lazy" data-src="<?= $thumb['src'] ?>" alt="<?= $arItem['NAME'] ?>" src="">
                                    </div>
                                    <div class="catalog-item__labels label-wrap">
                                        <?php if ($arItem['PROPERTIES']['NEW']['VALUE']): ?>
                                            <span class="label label_small label_bg label_fiery-rose">
                                                Новинки
                                            </span>
                                        <?php endif ?>
                                        <span class="label label_small label_bg label_fiery-rose">
                                            -<?= ceil((($arItem['PROPERTIES']['OLD_PRICE']['VALUE'] - $arItem['PROPERTIES']['PRICE']['VALUE']) * 100) / $arItem['PROPERTIES']['PRICE']['VALUE']); ?>%
                                        </span>
                                    </div>
                                </div>
                                <div class="catalog-item__content">
                                    <span class="label label_small label_fiery-rose">
                                        В наличии
                                    </span>
                                    <h4><?= $arItem['NAME'] ?></h4>
                                    <div class="price price_small">
                                        <span class="price-now">от <?= number_format($arItem['PROPERTIES']['PRICE']['VALUE'], 0, ' ', ' ') ?> ₽</span>
                                        <?php if (!empty($arItem['PROPERTIES']['OLD_PRICE']['VALUE'])): ?>
                                            <s class="price-old">от <?= number_format($arItem['PROPERTIES']['OLD_PRICE']['VALUE'], 0, ' ', ' ') ?> ₽</s>
                                        <?php endif ?>
                                    </div>
                                    <div class="more-btn">
                                        <button class="btn btn-blue small" type="button" data-toggle="modal" data-target="#modalBasket<?php // TODO: передать id?>">
                                            <span class="btn__text">
                                                <span data-text="В корзину">В корзину</span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
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