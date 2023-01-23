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
    $arResult['IBLOCK'] = Catalog::getIBlock(22);
    $arResult['ITEMS'] = Catalog::getElementList(22);
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}
if (count($arResult['ITEMS']) == 0) return;
?>
<section class="section_padding section_black-haze article">
    <div class="content">
        <article>
            <h2><?= $arResult['IBLOCK']['NAME'] ?></h2>
            <p><?= $arResult['IBLOCK']['DESCRIPTION'] ?></p>
            <div class="directions-items items">
                <?php foreach ($arResult['ITEMS'] as $item): ?>
                    <a class="directions-item item link-item" href="<?= $item['PROPERTIES']['DIRECTIONS']['VALUE'] ?>">
                        <div class="directions-item__img img img-1by1">
                            <div class="img__inner object-fit">
                                <img class="lazy" data-src="<?= CFile::GetPath($item['PREVIEW_PICTURE']) ?>" alt="<?= $item['NAME'] ?>" src="">
                            </div>
                        </div>
                        <div class="directions-item__content">
                            <span class="h5"><?= $item['NAME'] ?></span>
                        </div>
                    </a>
                <?php endforeach ?>
            </div>
        </article>
    </div>
</section>