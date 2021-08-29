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
    $arResult['IBLOCK'] = Catalog::getIBlock(18);
    $arResult['ITEMS'] = Catalog::getElementList(18);
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}
if (count($arResult['ITEMS']) == 0) return;
?>
<section class="article">
    <div class="content">
        <article>
            <h2><?= $arResult['IBLOCK']['NAME'] ?></h2>
            <p><?= $arResult['IBLOCK']['DESCRIPTION'] ?></p>
            <div class="gallery">
                <div class="gallery-items items">
                    <?php foreach ($arResult['ITEMS'] as $item): ?>
                        <a class="gallery-item item" href="#" data-fancybox="gallery" data-options="{&quot;src&quot;:&quot;<?= $item['PREVIEW_PICTURE']['SRC'] ?>&quot;}">
                            <div class="gallery-item__img img img-1by1">
                                <div class="gallery__zoom">
                                    <div class="gallery__zoom-inner">
                                        <svg class="icon__search" width="14" height="14">
                                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#search"></use>
                                        </svg>
                                        <span>Смотреть</span>
                                    </div>
                                </div>
                                <div class="img__inner object-fit">
                                    <img class="lazy" data-src="<?= CFile::GetPath($item['PREVIEW_PICTURE']) ?>" alt="<?= $item['NAME'] ?>" src="">
                                </div>
                            </div>
                        </a>
                    <?php endforeach ?>
                </div>
            </div>
        </article>
    </div>
</section>