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
    $arResult['IBLOCK'] = Catalog::getIBlock(25);
    $arResult['ITEMS'] = Catalog::getElementList(25);
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}
if (count($arResult['ITEMS']) == 0) return;
?>
<div class="adv">
    <div class="content">
        <div class="adv-box bg_pippin">
            <div class="heading">
                <h3><?= $arResult['IBLOCK']['NAME'] ?></h3>
            </div>
            <div class="adv-items items">
                <?php foreach ($arResult['ITEMS'] as $arItem): ?>
                    <div class="adv-item item">
                        <div class="adv-item__icon">
                            <img src="<?= SITE_STYLE_PATH ?>/img/content/adv/icon.svg" alt="">
                        </div>
                        <p><?= $arItem['NAME'] ?></p>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="more-btn">
                <a class="btn btn-red big" href="<?php //TODO: Куда ссылка ?>">
                    <span class="btn__text">
                        <span data-text="Позвонить">Позвонить</span>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>