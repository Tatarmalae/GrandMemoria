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
$arAddress = [];
?>
<?php if (!empty($arResult['TAGS'])): ?>
    <?php $this->SetViewTarget('before_parent_sect'); ?>
    <div class="categories">
        <div class="content">
            <ul class="nav nav-tabs categories-items" id="addressesTab" role="tablist">
                <?php foreach ($arResult['TAGS'] as $key => $tag): ?>
                    <li class="nav-item categories-li">
                        <a class="nav-link categories-item<?= $key == 0 ? ' active' : '' ?>" id="tab-<?= $key + 1 ?>" href="#tab<?= $key + 1 ?>" data-toggle="tab" role="tab" aria-controls="tab<?= $key + 1 ?>" aria-selected="<?= $key == 0 ? 'true' : 'false' ?>">
                            <span><?= $tag['NAME'] ?></span>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
    <?php $this->EndViewTarget(); ?>
<?php endif ?>
<div class="content">
    <div class="tab-content" id="addressesTabContent">
        <?php foreach ($arResult['TAGS'] as $key => $tag): ?>
            <div class="tab-pane fade<?= $key == 0 ? ' show active' : '' ?>" id="tab<?= $key + 1 ?>" role="tabpanel" aria-labelledby="tab-<?= $key + 1 ?>">
                <div class="map-wrap">
                    <div class="map-items items">
                        <div class="swiper-container base-slider" data-count="4">
                            <div class="slider-wrap swiper-wrapper">
                                <?php foreach ($arResult["ITEMS"] as $arItem): ?>
                                    <?php
                                    if ($arItem['IBLOCK_SECTION_ID'] !== $tag['ID']) continue;
                                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), ["CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]);
                                    $arAddress[][] = $arItem['PROPERTIES']['COORDINATES']['VALUE'];
                                    ?>
                                    <div class="slider-slide swiper-slide" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                                        <div class="map-item item">
                                            <div class="box">
                                                <h5><?= $arItem['NAME'] ?></h5>
                                                <div class="map-addresses">
                                                    <?php if (!empty($arItem['PROPERTIES']['ADDRESS']['VALUE'])): ?>
                                                        <div class="map-address">
                                                            <svg class="icon__address" width="14" height="14">
                                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#address"></use>
                                                            </svg>
                                                            <span class="map-address__desc"><?= $arItem['PROPERTIES']['ADDRESS']['VALUE'] ?></span>
                                                        </div>
                                                    <?php endif ?>
                                                    <?php if (!empty($arItem['PROPERTIES']['SCHEDULES']['VALUE'])): ?>
                                                        <div class="map-address">
                                                            <svg class="icon__time" width="14" height="14">
                                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#time"></use>
                                                            </svg>
                                                            <span class="map-address__desc"><?= $arItem['PROPERTIES']['SCHEDULES']['VALUE'] ?></span>
                                                        </div>
                                                    <?php endif ?>
                                                    <?php if (!empty($arItem['PROPERTIES']['PHONE']['VALUE'])): ?>
                                                        <a class="map-address" href="tel:8 (843) 558-00-82">
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
                        'ID' => 'map1' . ($key + 1),
                        'ADDRESS' => $arAddress,
                    ], ["SHOW_BORDER" => true]); ?>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/feedback_form.php", [], ["SHOW_BORDER" => true]); ?>
<?php unset($arAddress) ?>
