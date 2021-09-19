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

use Bitrix\Main\Config\Option;

if (empty($arResult)) return;
?>
<section class="catalog">
    <div class="content">
        <div class="heading heading_more">
            <div class="heading__content">
                <h2>Каталог товаров</h2>
            </div>
            <div class="more">
                <a class="more__link" href="/catalog/">
                    <span>Все товары</span>
                    <svg class="icon__arrow-right" width="24" height="24">
                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                    </svg>
                </a>
            </div>
        </div>
        <a class="phone phone_xs" href="tel:+<?= preg_replace('~\D+~', '', Option::get("askaron.settings", "UF_PHONE")) ?>">
            <div class="content">
                <div class="phone-inner">
                    <svg class="icon__phone" width="40" height="40">
                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#phone"></use>
                    </svg>
                    <div class="phone-content">
                        <span class="phone__number">
                            <?= Option::get("askaron.settings", "UF_PHONE"); ?>
                        </span>
                        <strong>Ритуальные товары</strong>
                    </div>
                </div>
            </div>
        </a>
        <div class="catalog-items items" data-type="column">
            <?php foreach ($arResult['SECTIONS'] as $sections): ?>
                <div class="catalog-item item link-item">
                    <a class="catalog-item__img img" href="<?= $sections['SECTION_PAGE_URL'] ?>">
                        <div class="img__inner object-fit">
                            <img class="lazy" data-src="<?= CFile::GetPath($sections['PICTURE']['ID']) ?>" alt="<?= $sections['NAME'] ?>" src="">
                        </div>
                    </a>
                    <div class="catalog-item__content">
                        <h4>
                            <a href="<?= $sections['SECTION_PAGE_URL'] ?>">
                                <?= $sections['NAME'] ?>
                            </a>
                        </h4>
                        <?php if (!empty($sections['ITEMS'])): ?>
                            <ul>
                                <?php foreach ($sections['ITEMS'] as $item): ?>
                                    <li>
                                        <a href="<?= $item['SECTION_PAGE_URL'] ?>">
                                            <?= $item['NAME'] ?>
                                        </a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        <?php endif ?>
                        <div class="price price_small">
                            <span class="price-now">
                                от <?= number_format($sections['MIN_PRICE'], 0, ' ', ' ') ?> ₽
                            </span>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>