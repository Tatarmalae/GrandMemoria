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

<div class="hello">
    <div class="swiper-container hello-slider">
        <div class="hello__wrapper swiper-wrapper">
            <?php foreach ($arResult["ITEMS"] as $arItem): ?>
                <?php
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), ["CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]);
                ?>
                <div class="hello__slide swiper-slide" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <div class="hello__item">
                        <div class="hello__bg">
                            <div class="hello__bg-inner object-fit">
                                <picture>
                                    <source media="(max-width:1279px)" data-srcset="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" srcset="">
                                    <img class="lazy" data-src="<?= $arItem['DETAIL_PICTURE']['SRC'] ?>" alt="<?= $arItem['NAME'] ?>" src="">
                                </picture>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="hello-arrow hello-arrow_prev">
            <div class="slider-btn slider-btn_white slider-btn_prev hello-slider__btn_prev">
                <svg class="icon__slider-prev" width="32" height="32">
                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-prev"></use>
                </svg>
            </div>
        </div>
        <div class="hello-arrow hello-arrow_next">
            <div class="slider-btn slider-btn_white slider-btn_next hello-slider__btn_next">
                <svg class="icon__slider-next" width="32" height="32">
                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-next"></use>
                </svg>
            </div>
        </div>
    </div>
    <div class="hello-counts">
        <div class="content">
            <div class="hello-counts__inner">
                <span class="hello-counts__now">00</span>
                /
                <span class="hello-counts__all">00</span>
            </div>
        </div>
    </div>
</div>
