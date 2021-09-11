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
if (count($arResult["ITEMS"]) == 0) return;
?>
<section class="gallery<?= !empty($arParams['CLASS']) ? $arParams['CLASS'] : '' ?>">
    <div class="content">
        <div class="heading">
            <div class="heading__content">
                <h2>Наши работы</h2>
            </div>
        </div>
        <div class="gallery-items items<?= !empty($arParams['DATA_COUNT']) ? ' gallery-items_size-' . $arParams['DATA_COUNT'] : '' ?>">
            <div class="swiper-container base-slider" data-count="<?= !empty($arParams['DATA_COUNT']) ? $arParams['DATA_COUNT'] : '2' ?>">
                <div class="slider-wrap swiper-wrapper">
                    <?php foreach ($arResult["ITEMS"] as $key => $arItem): ?>
                        <?php
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), ["CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]);
                        ?>
                        <div id="<?= $this->GetEditAreaId($arItem['ID']); ?>" class="slider-slide swiper-slide">
                            <a class="gallery-item item" href="#" data-fancybox="gallery" data-options="{&quot;src&quot; : &quot;<?= CFile::GetPath($arItem['PREVIEW_PICTURE']['ID']) ?>&quot;}">
                                <div class="gallery-item__img img img-<?= !empty($arParams['DATA_COUNT']) ? '1by1' : '16by9' ?>">
                                    <div class="gallery__zoom">
                                        <div class="gallery__zoom-inner">
                                            <svg class="icon__search" width="14" height="14">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#search"></use>
                                            </svg>
                                            <span>Смотреть</span>
                                        </div>
                                    </div>
                                    <div class="img__inner object-fit">
                                        <img class="lazy" data-src="<?= CFile::GetPath($arItem['PREVIEW_PICTURE']['ID']) ?>" alt="<?= $arItem['NAME'] ?>" src="">
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
