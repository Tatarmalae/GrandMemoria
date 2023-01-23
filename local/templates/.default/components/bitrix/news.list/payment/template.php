<?php

use Bitrix\Main\Config\Option;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

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

<?php if (!empty($arResult[0]['ELEMENTS'])): ?>
    <div class="heading">
        <div class="heading__content">
            <h2><?= $arResult[0]['NAME'] ?></h2>
        </div>
    </div>
    <div class="information-items information-items_size-2 items">
        <?php foreach ($arResult[0]['ELEMENTS'] as $element): ?>
            <div class="information-item item">
                <div class="box">
                    <?php if (!empty($element['PROPERTIES']['ICO']['VALUE'])): ?>
                        <div class="information-item__icon">
                            <img src="<?= CFile::GetPath($element['PROPERTIES']['ICO']['VALUE']) ?>" alt="ico">
                        </div>
                    <?php endif ?>
                    <span class="h4"><?= $element['NAME'] ?></span>
                    <p><?= $element['PREVIEW_TEXT'] ?></p>
                </div>
            </div>
        <?php endforeach ?>
    </div>
<?php endif ?>

<div class="information-contacts">
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
    </div>
</div>

<?php $this->SetViewTarget('after_parent_sect'); ?>

<?php if (!empty($arResult[1]['ELEMENTS'])): ?>
    <section class="payment">
        <div class="content">
            <div class="payment-wrap items">
                <div class="payment-column item">
                    <h2><?= $arResult[1]['NAME'] ?></h2>
                    <div class="payment-contacts">
                        <p>
                            <?= current($arResult[1]['ELEMENTS']['PREVIEW_TEXT']) ?>
                        </p>
                    </div>
                    <div class="payment-items">
                        <?php foreach ($arResult[1]['ELEMENTS'] as $element): ?>
                            <div class="payment-item">
                                <span><?= $element['NAME'] ?>:</span>
                                <p><?= $element['PREVIEW_TEXT'] ?></p>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="payment-column item">
                    <span class="h4">Принимаем к оплате карты<br>MasterCard, Visa, МИР.</span>
                    <div class="payment-cards">
                        <div class="payment-card">
                            <img src="<?= SITE_STYLE_PATH ?>/img/content/payment/mastercard.svg" alt="">
                        </div>
                        <div class="payment-card">
                            <img src="<?= SITE_STYLE_PATH ?>/img/content/payment/visa.svg" alt="">
                        </div>
                        <div class="payment-card">
                            <img src="<?= SITE_STYLE_PATH ?>/img/content/payment/mir.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>

<?php if (!empty($arResult[2]['ELEMENTS'])): ?>
    <section class="section_padding section_black-haze information">
        <div class="content">
            <div class="heading">
                <div class="heading__content">
                    <h2><?= $arResult[2]['NAME'] ?></h2>
                </div>
            </div>
            <div class="information-items information-items_size-2 items">
                <?php foreach ($arResult[2]['ELEMENTS'] as $element): ?>
                    <div class="information-item item">
                        <div class="box">
                            <?php if (!empty($element['PROPERTIES']['ICO']['VALUE'])): ?>
                                <div class="information-item__icon">
                                    <img src="<?= CFile::GetPath($element['PROPERTIES']['ICO']['VALUE']) ?>" alt="ico">
                                </div>
                            <?php endif ?>
                            <span class="h4"><?= $element['NAME'] ?></span>
                            <p><?= $element['PREVIEW_TEXT'] ?></p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
<?php endif ?>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/address.php", ['TITLE' => 'Наши адреса'], ["SHOW_BORDER" => true]); ?>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/feedback_form.php", [], ["SHOW_BORDER" => true]); ?>

<?php $this->EndViewTarget(); ?>
