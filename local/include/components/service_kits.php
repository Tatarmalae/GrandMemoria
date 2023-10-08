<?php

use Bitrix\Main\Config\Option;
use Bitrix\Main\Diag\Debug;
use Dev\Catalog;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var $arResult
 * @var $arParams
 * @var $APPLICATION
 */

try {
    $arResult['IBLOCK'] = Catalog::getIBlock(26);
    $arResult['ITEMS'] = Catalog::getElementList(26);
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}
if (count($arResult['ITEMS']) == 0) return;
?>
<section class="section_padding bg_glitter types">
    <div class="content">
        <div class="heading">
            <div class="heading__content">
                <h2><?= $arResult['IBLOCK']['NAME'] ?></h2>
                <p>Позвоните по телефону
                    <a href="tel:+<?= preg_replace('~\D+~', '', Option::get("askaron.settings", "UF_PHONE")) ?>">
                        <b><?= Option::get("askaron.settings", "UF_PHONE"); ?></b>
                    </a>
                    и ритуальный агент <b>БЕСПЛАТНО</b> приедет.
                </p>
            </div>
            <a class="btn btn-blue big" href="/calculation/">
                <span class="btn__text">
                    <span data-text="Расчет похорон">Расчет похорон</span>
                </span>
            </a>
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
        <div class="types-list">
            <div class="types-items items">
                <?php foreach ($arResult['ITEMS'] as $item): ?>
                    <div class="types-item item">
                        <div class="box">
                            <div class="box__inner">
                                <div class="types-item__icon">
                                    <img src="<?= CFile::GetPath($item['PROPERTIES']['ICO']['VALUE']) ?>" width="80" height="80" alt="ico">
                                </div>
                                <span class="h4"><?= $item['NAME'] ?></span>
                                <?php if (!empty($item['PROPERTIES']['PRICE']['VALUE'])): ?>
                                    <span class="label label_big label_fiery-rose">
                                        <?= number_format($item['PROPERTIES']['PRICE']['VALUE'], 0, ' ', ' ') ?> ₽
                                    </span>
                                <?php endif ?>
                                <?php if (!empty($item['PREVIEW_TEXT'])): ?>
                                    <p><?= $item['PREVIEW_TEXT'] ?></p>
                                <?php endif ?>
                                <div class="more-btn">
                                    <a href="#" class="btn btn-blue big btn-block" data-toggle="modal" data-target="#modalConsultation" data-theme="<?= $item['NAME'] ?>">
                                        <span class="btn__text">
                                            <span data-text="Получить консультацию">Получить консультацию</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>