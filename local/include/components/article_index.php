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
    $arResult['IBLOCK'] = Catalog::getIBlock(11);
    $arResult['ITEMS'] = Catalog::getElementList(11);
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}
if (count($arResult['ITEMS']) == 0) return;

foreach ($arResult['ITEMS'] as $item) {
    if($item['PROPERTIES']['SHOW_INDEX']['VALUE'] == 1){
        $arResult['ITEMS'] = $item;
    }
}
?>

<section>
    <div class="content">
        <div class="banner-box banner-box_center bg_glitter">
            <div class="banner-inner">
                <div class="banner-content">
                    <h3>
                        <a href="<?= $arResult['ITEMS']['DETAIL_PAGE_URL'] ?>">
                            <?= $arResult['ITEMS']['NAME'] ?>
                        </a>
                    </h3>
                </div>
                <div class="banner-arrow">
                    <a class="slider-btn slider-btn_next" href="<?= $arResult['ITEMS']['DETAIL_PAGE_URL'] ?>">
                        <svg class="icon__slider-next" width="32" height="32">
                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-next"></use>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>