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

use Bitrix\Main\Config\Option;

$this->setFrameMode(true);
?>
<section class="section_padding bg_black-haze services">
    <div class="content">
        <div class="heading heading_more">
            <div class="heading__content">
                <h2>Ритуальные услуги</h2>
            </div>
            <div class="more">
                <a class="more__link" href="<?= current($arResult['ITEMS'])['LIST_PAGE_URL'] ?>">
                    <span>Все услуги</span>
                    <svg class="icon__arrow-right" width="24" height="24">
                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                    </svg>
                </a>
            </div>
        </div>
        <a class="phone phone_xs" href="tel:+<?= preg_replace('~\D+~', '', Option::get("askaron.settings", "UF_PHONE")) ?>">
            <div class="content">
                <div class="phone-inner">
                    <svg class="icon__phone" width="40" height="40">
                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#phone"></use>
                    </svg>
                    <div class="phone-content">
                        <span class="phone__number">
                            <?= Option::get("askaron.settings", "UF_PHONE"); ?>
                        </span>
                        <strong>Ритуальные услуги</strong>
                    </div>
                </div>
            </div>
        </a>
        <div class="services-items items" data-type="column">
            <?php foreach ($arResult["ITEMS"] as $arItem): ?>
                <?php
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), ["CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]);
                ?>
                <a class="services-item item link-item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>" href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
                    <div class="services-item__img img">
                        <div class="img__inner object-fit">
                            <img class="lazy" data-src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt="<?= $arItem['NAME'] ?>" src="">
                        </div>
                    </div>
                    <div class="services-item__content">
                        <h4><?= $arItem['NAME'] ?></h4>
                        <?php if (!empty($arItem['PROPERTIES']['PRICE']['VALUE'])): ?>
                            <div class="price price_small">
                                <span class="price-now"><?= $arItem['PROPERTIES']['PRICE']['VALUE'] ?> ₽</span>
                            </div>
                        <?php endif ?>
                    </div>
                </a>
            <?php endforeach ?>
        </div>
    </div>
</section>