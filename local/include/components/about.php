<?php

use Bitrix\Main\Diag\Debug;
use Dev\Catalog;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var $arResult
 * @var $arParams
 * @var $APPLICATION
 */

try {
    $arResult['IBLOCK'] = Catalog::getIBlock(9);
    $arResult['ITEMS'] = Catalog::getElementList(9);
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}
if (count($arResult['ITEMS']) == 0) return;
?>
<div class="adv-box bg_pippin mob-0">
    <div class="adv-info items">
        <div class="adv-info__column item">
            <div class="adv-info__left">
                <a class="logo-link" href="<?= SITE_DIR ?>">
                    <div class="logo">
                        <img src="<?= SITE_STYLE_PATH ?>/img/general/logo.svg" width="280" height="115" alt="<?= SITE_SERVER_NAME ?>"/>
                    </div>
                </a>
            </div>
        </div>
        <div class="adv-info__column item">
            <h3><?= $arResult['IBLOCK']['NAME'] ?></h3>
            <p>
                <?= $arResult['IBLOCK']['DESCRIPTION'] ?>
            </p>
            <div class="more">
                <a class="more__link" href="/info/about/">
                    <span>Подробнее</span>
                    <svg class="icon__arrow-right" width="24" height="24">
                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                    </svg>
                </a>
            </div>
            <div class="adv-counts items">
                <?php foreach ($arResult['ITEMS'] as $arItem): ?>
                    <?php if (!$arItem['PROPERTIES']['SHOW_INDEX']['VALUE']) continue ?>
                    <div class="adv-counts__item item">
                        <span class="adv-counts__count"><?= $arItem['DETAIL_TEXT'] ?></span>
                        <span class="adv-counts__desc"><?= $arItem['NAME'] ?></span>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>
