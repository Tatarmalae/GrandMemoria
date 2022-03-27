<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
if (empty($arResult)) return;
?>
<div class="categories">
    <div class="categories-center">
        <div class="categories-slider__wrapper">
            <div class="swiper-container categories-slider">
                <ul class="nav nav-tabs categories-items swiper-wrapper" id="catalogTab" role="tablist">
                    <?php foreach ($arResult['SECTIONS'] as $key => $sections): ?>
                        <?php if (mb_strpos($sections['SECTION_PAGE_URL'], 'ustanovka-pamyatnikov') || mb_strpos($sections['SECTION_PAGE_URL'], 'gravirovka-pamyatnikov')) {
                            continue;
                        } ?>
                        <li class="nav-item categories-li swiper-slide">
                            <a class="nav-link categories-item<?= $arParams['ID'] === $sections['ID'] ? ' active' : '' ?>"
                               href="<?= $sections['SECTION_PAGE_URL'] ?>">
                                <span><?= $sections['NAME'] ?></span>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
            <div class="slider-arrows slider-arrows_prev">
                <div class="slider-btn slider-btn_prev slider-btn_light">
                    <svg class="icon__slider-prev" width="32" height="32">
                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-prev"></use>
                    </svg>
                </div>
            </div>
            <div class="slider-arrows slider-arrows_next">
                <div class="slider-btn slider-btn_next slider-btn_light">
                    <svg class="icon__slider-next" width="32" height="32">
                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-next"></use>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>