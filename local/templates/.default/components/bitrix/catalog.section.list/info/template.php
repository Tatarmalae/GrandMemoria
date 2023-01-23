<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<?php if (!empty($arResult)): ?>
    <div class="information-items information-items_btn items">
        <?php foreach ($arResult as $item): ?>
            <a class="information-item item link-item" href="<?= \CIBlock::ReplaceDetailUrl($item['LIST_PAGE_URL'], [], true, 'S') ?>">
                <div class="box">
                    <?php if (!empty($item['ICO'])): ?>
                        <div class="information-item__icon">
                            <img src="<?= CFile::GetPath($item['ICO']) ?>" alt="<?= $item['NAME'] ?>">
                        </div>
                    <?php endif ?>
                    <span class="h4"><?= $item['NAME'] ?></span>
                    <?php if (!empty($item['DESCRIPTION'])): ?>
                        <p><?= $item['DESCRIPTION'] ?></p>
                    <?php endif ?>
                    <div class="more-btn">
                        <button class="slider-btn slider-btn_next" type="button">
                            <svg class="icon__slider-next" width="32" height="32">
                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-next"></use>
                            </svg>
                        </button>
                    </div>
                </div>
            </a>
        <?php endforeach ?>
    </div>
<?php endif ?>
