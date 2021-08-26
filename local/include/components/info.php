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
    $arResult['IBLOCK'] = Catalog::getIBlock($arParams['IBLOCK_ID']);
    $arResult['ITEMS'] = Catalog::getElementList($arParams['IBLOCK_ID']);
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}
if (count($arResult['ITEMS']) == 0) return;
?>
<section class="information">
    <div class="content">
        <div class="heading">
            <div class="heading__content">
                <h2><?= $arResult['IBLOCK']['NAME'] ?></h2>
            </div>
        </div>
        <div class="information-items information-items_size-2 items">
            <?php foreach ($arResult['ITEMS'] as $item): ?>
                <div class="information-item item">
                    <div class="box">
                        <div class="information-item__icon">
                            <img src="<?= CFile::GetPath($item['PROPERTIES']['ICO']['VALUE']) ?>" alt="ico">
                        </div>
                        <h4><?= $item['NAME'] ?></h4>
                        <?php if (!empty($item['PREVIEW_TEXT'])): ?>
                            <p><?= $item['PREVIEW_TEXT'] ?></p>
                        <?php endif ?>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>