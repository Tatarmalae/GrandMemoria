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
    $arResult['IBLOCK'] = Catalog::getIBlock(1);
    $arResult['ITEMS'] = Catalog::getElementList(1);
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}
if (count($arResult['ITEMS']) == 0) return;
?>
<div class="footer__list">
    <span class="footer__list-title">
        <?= $arResult['IBLOCK']['NAME'] ?>:
    </span>
    <div class="footer__contacts footer__contacts_address">
        <?php foreach ($arResult['ITEMS'] as $key => $item): ?>
            <div class="footer__contacts-item">
                <a class="footer__contacts-link" href="/contacts/">
                    <span>
                        <svg class="icon__address" width="28" height="28">
                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#address"></use>
                        </svg>
                    </span>
                    <?= $item['PROPERTIES']['SHORT_NAME']['VALUE'] ?>
                </a>
            </div>
        <?php endforeach ?>
    </div>
</div>