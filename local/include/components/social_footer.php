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
    $arResult['IBLOCK'] = Catalog::getIBlock(23);
    $arResult['ITEMS'] = Catalog::getElementList(23);
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}
if (count($arResult['ITEMS']) == 0) return;
?>
<div class="footer__list">
    <span class="footer__list-title">
        <?= $arResult['IBLOCK']['NAME'] ?>:
    </span>
    <div class="footer__contacts">
        <?php foreach ($arResult['ITEMS'] as $key => $item): ?>
            <div class="footer__contacts-item">
                <a rel="nofollow" class="footer__contacts-link" href="<?= !empty($item['PROPERTIES']['LINK']['VALUE']) ? $item['PROPERTIES']['LINK']['VALUE'] : '#' ?>" target="_blank">
                    <span>
                        <?= file_get_contents($_SERVER['DOCUMENT_ROOT'] . CFile::GetPath($item['PROPERTIES']['ICO']['VALUE'])) ?>
                    </span>
                    <?= $item['NAME'] ?>
                </a>
            </div>
        <?php endforeach ?>
    </div>
</div>