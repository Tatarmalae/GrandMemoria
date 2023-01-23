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
<section class="services">
    <div class="content">
        <div class="heading">
            <div class="heading__content">
                <h2><?= $arParams['TITLE'] ?></h2>
            </div>
        </div>
        <div class="services-items items" data-type="column">
            <div class="swiper-container base-slider" data-count="4">
                <div class="slider-wrap swiper-wrapper">
                    <?php foreach ($arResult["ITEMS"] as $arItem): ?>
                        <?php
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), ["CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]);
                        ?>
                        <div class="slider-slide swiper-slide" id="<?= $this->GetEditAreaId($arItem['ID']); ?>" href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
                            <a class="services-item item link-item" href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
                                <div class="services-item__img img">
                                    <div class="img__inner object-fit">
                                        <img class="lazy" data-src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt="<?= $arItem['NAME'] ?>" src="">
                                    </div>
                                </div>
                                <div class="services-item__content">
                                    <span class="h4"><?= $arItem['NAME'] ?></span>
                                    <?php if (!empty($arItem['PROPERTIES']['PRICE']['VALUE'])): ?>
                                        <div class="price price_small">
                                            <span class="price-now"><?= $arItem['PROPERTIES']['PRICE']['VALUE'] ?> ₽</span>
                                        </div>
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