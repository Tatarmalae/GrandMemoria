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
    $arResult['IBLOCK'] = Catalog::getIBlock(19);
    $arResult['ITEMS'] = Catalog::getIBlockElementsGroupBySection(19, ['ACTIVE_FROM' => 'ASC']);
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}
if (count($arResult['ITEMS']) == 0) return;
?>
<section class="section_padding section_glitter history">
    <div class="content">
        <div class="heading">
            <div class="heading__content">
                <h2><?= $arResult['IBLOCK']['NAME'] ?></h2>
            </div>
        </div>
        <div class="categories categories_tabs">
            <ul class="nav nav-tabs categories-items" id="historyTab" role="tablist">
                <?php foreach ($arResult['ITEMS'] as $keyTab => $tabs): ?>
                    <li class="nav-item categories-li">
                        <a class="nav-link categories-item<?= $keyTab == 0 ? ' active' : '' ?>" id="tab-<?= $keyTab + 1 ?>" href="#tab<?= $keyTab + 1 ?>" data-toggle="tab" role="tab" aria-controls="tab<?= $keyTab + 1 ?>" aria-selected="true">
                            <span><?= $tabs['NAME'] ?></span>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
        <div class="tab-content" id="historyTabContent">
            <?php foreach ($arResult['ITEMS'] as $keyTab => $tabs): ?>
                <div class="tab-pane fade<?= $keyTab == 0 ? ' show active' : '' ?>" id="tab<?= $keyTab + 1 ?>" role="tabpanel" aria-labelledby="tab-<?= $keyTab + 1 ?>">
                    <div class="history-items items">
                        <div class="swiper-container base-slider" data-count="3">
                            <div class="slider-wrap swiper-wrapper">
                                <?php foreach ($tabs['ELEMENTS'] as $key => $item): ?>
                                    <div class="slider-slide swiper-slide">
                                        <div class="history-item item">
                                            <div class="box">
                                                <span class="label label_small label_marengo">
                                                    <?= FormatDate('f', MakeTimeStamp($item['ACTIVE_FROM'])) ?>
                                                </span>
                                                <h4><?= $item['NAME'] ?></h4>
                                                <?php if (!empty($item['PREVIEW_TEXT'])): ?>
                                                    <p><?= $item['PREVIEW_TEXT'] ?></p>
                                                <?php endif ?>
                                                <div class="more">
                                                    <a class="more__link" href="#" data-toggle="modal" data-target="#modalHistoryItem_<?= ($keyTab + 1) . ($key + 1) ?>">
                                                        <span>Читать целиком</span>
                                                        <svg class="icon__arrow-right" width="24" height="24">
                                                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            </div>
                            <div class="slider-arrows slider-arrows_prev">
                                <div class="slider-btn slider-btn_prev">
                                    <svg class="icon__slider-prev" width="32" height="32">
                                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-prev"></use>
                                    </svg>
                                </div>
                            </div>
                            <div class="slider-arrows slider-arrows_next">
                                <div class="slider-btn slider-btn_next">
                                    <svg class="icon__slider-next" width="32" height="32">
                                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-next"></use>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>
<?php foreach ($arResult['ITEMS'] as $keyTab => $tabs): ?>
    <?php foreach ($tabs['ELEMENTS'] as $key => $item): ?>
        <div class="modal fade" id="modalHistoryItem_<?= ($keyTab + 1) . ($key + 1) ?>" tabindex="-1" role="dialog" aria-labelledby="modalHistoryItemLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button class="modal-close" type="button" data-dismiss="modal" aria-label="Close">
                        <svg class="icon__close-modal" width="48" height="48">
                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#close-modal"></use>
                        </svg>
                    </button>
                    <div class="modal-body">
                        <a class="logo-link" href="<?= SITE_DIR ?>">
                            <div class="logo">
                                <img src="<?= SITE_STYLE_PATH ?>/img/general/logo.svg" alt="<?= SITE_SERVER_NAME ?>">
                            </div>
                        </a>
                        <div class="modal-scroll">
                            <div class="modal-scroll__inner">
                                <div class="modal-history">
                                    <div class="modal-history__item">
                                        <div class="history-item">
                                            <span class="label label_small label_marengo">
                                                <?= FormatDate('f', MakeTimeStamp($item['ACTIVE_FROM'])) ?>
                                            </span>
                                            <h4><?= $item['NAME'] ?></h4>
                                            <?php if (!empty($item['DETAIL_TEXT'])): ?>
                                                <p><?= $item['DETAIL_TEXT'] ?></p>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
<?php endforeach ?>
