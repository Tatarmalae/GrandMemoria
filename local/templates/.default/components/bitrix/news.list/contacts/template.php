<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Config\Option;

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
<section class="contacts">
    <div class="content">
        <div class="contacts-items items">
            <div class="contacts-item item">
                <div class="contacts-info bg_glitter">
                    <div class="contacts-info__bg">
                        <img class="lazy" src="" data-src="<?= SITE_STYLE_PATH ?>/img/content/contacts/bg-1.svg" alt="">
                    </div>
                    <div class="contacts-info__content">
                        <span>Единый номер для связи</span>
                        <a href="tel:+<?= preg_replace('~\D+~', '', Option::get("askaron.settings", "UF_PHONE")) ?>">
                            <?= Option::get("askaron.settings", "UF_PHONE"); ?>
                        </a>
                    </div>
                </div>
            </div>
            <div class="contacts-item item">
                <div class="contacts-info bg_pippin">
                    <div class="contacts-info__bg">
                        <img class="lazy" src="" data-src="<?= SITE_STYLE_PATH ?>/img/content/contacts/bg-2.svg" alt="">
                    </div>
                    <div class="contacts-info__content">
                        <span>Почтовый ящик для писем</span>
                        <a href="mailto:<?= Option::get("askaron.settings", "UF_EMAIL"); ?>">
                            <?= Option::get("askaron.settings", "UF_EMAIL"); ?>
                        </a>
                    </div>
                </div>
            </div>
            <?php foreach ($arResult["ITEMS"] as $arItem): ?>
                <?php
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), ["CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]);
                $arAddress[][] = $arItem['PROPERTIES']['ADDRESS']['VALUE'];
                ?>
                <div class="contacts-item item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <div class="box">
                        <div class="box__inner">
                            <div class="contacts-addresses">
                                <div class="contacts-address">
                                    <svg class="icon__address" width="24" height="24">
                                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#address"></use>
                                    </svg>
                                    <span class="contacts-address__label">Адрес:</span>
                                    <a class="contacts-address__desc" href="#target-address"><?= $arItem['NAME'] ?></a>
                                </div>
                                <?php if (!empty($arItem['PROPERTIES']['SCHEDULES']['VALUE'])): ?>
                                    <div class="contacts-address">
                                        <svg class="icon__time" width="24" height="24">
                                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#time"></use>
                                        </svg>
                                        <span class="contacts-address__label"><?= $arItem['PROPERTIES']['SCHEDULES']['NAME'] ?>:</span>
                                        <span class="contacts-address__desc">
                                            <?= $arItem['PROPERTIES']['SCHEDULES']['VALUE'] ?>
                                        </span>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($arItem['PROPERTIES']['PARKING']['VALUE'])): ?>
                                    <div class="contacts-address">
                                        <svg class="icon__parking" width="24" height="24">
                                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#parking"></use>
                                        </svg>
                                        <span class="contacts-address__label"><?= $arItem['PROPERTIES']['PARKING']['NAME'] ?>:</span>
                                        <span class="contacts-address__desc">
                                        <?= $arItem['PROPERTIES']['PARKING']['VALUE'] ?>
                                    </span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($arItem['PROPERTIES']['PHOTO']['VALUE'])): ?>
                                <div class="contacts-photo">
                                    <?php foreach ($arItem['PROPERTIES']['PHOTO']['VALUE'] as $key => $photo): ?>
                                        <div class="contacts-photo__item">
                                            <?php //TODO: fancybox неправильно работает. Показывает все фото подряд ?>
                                            <a class="contacts-photo__item-img img img-1by1" href="javascript:void(0);" data-fancybox="gallery" data-options="{&quot;src&quot;:&quot;<?= CFile::GetPath($photo) ?>&quot;}">
                                                <div class="img__inner object-fit">
                                                    <img class="lazy" src="" data-src="<?= CFile::GetPath($photo) ?>" alt="<?= $arItem['PROPERTIES']['PHOTO']['DESCRIPTION'][$key] ?>">
                                                </div>
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($arItem['PROPERTIES']['TAXI']['VALUE'])): ?>
                                <a class="contacts-taxi" href="<?= $arItem['PROPERTIES']['TAXI']['VALUE'] ?>" target="_blank">
                                    <div class="contacts-taxi__icon">
                                        <img src="<?= SITE_STYLE_PATH ?>/img/content/contacts/taxi.svg" alt="taxi">
                                    </div>
                                    <div class="contacts-taxi__content">
                                        <h5>Вызвать такси</h5>
                                        <?php if (!empty($arItem['PROPERTIES']['TAXI']['DESCRIPTION'])): ?>
                                            <p><?= $arItem['PROPERTIES']['TAXI']['DESCRIPTION'] ?></p>
                                        <?php endif; ?>
                                    </div>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php $this->SetViewTarget('after_parent_sect'); ?>
<section class="section_padding section_black-haze address" id="target-address">
    <div class="content">
        <div class="heading">
            <div class="heading__content">
                <h2>Адреса на карте</h2>
            </div>
        </div>
        <div class="map-wrap">
            <?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/map.php", ['ID' => 'mapAddresses', 'ADDRESS' => $arAddress], ["SHOW_BORDER" => true]); ?>
        </div>
    </div>
</section>
<div class="banner">
    <?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/callback_banner.php", [], ["SHOW_BORDER" => true]); ?>
</div>
<?php $this->EndViewTarget(); ?>
<?php unset($arAddress) ?>
