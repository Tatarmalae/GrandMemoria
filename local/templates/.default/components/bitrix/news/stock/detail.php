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
?>
<?php $ElementID = $APPLICATION->IncludeComponent(
    "bitrix:news.detail",
    "",
    [
        "DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
        "DISPLAY_NAME" => $arParams["DISPLAY_NAME"],
        "DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
        "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "FIELD_CODE" => $arParams["DETAIL_FIELD_CODE"],
        "PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
        "DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["detail"],
        "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
        "META_KEYWORDS" => $arParams["META_KEYWORDS"],
        "META_DESCRIPTION" => $arParams["META_DESCRIPTION"],
        "BROWSER_TITLE" => $arParams["BROWSER_TITLE"],
        "SET_CANONICAL_URL" => $arParams["DETAIL_SET_CANONICAL_URL"],
        "DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
        "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
        "SET_TITLE" => $arParams["SET_TITLE"],
        "MESSAGE_404" => $arParams["MESSAGE_404"],
        "SET_STATUS_404" => $arParams["SET_STATUS_404"],
        "SHOW_404" => $arParams["SHOW_404"],
        "FILE_404" => $arParams["FILE_404"],
        "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
        "ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
        "ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
        "USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
        "GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
        "DISPLAY_TOP_PAGER" => $arParams["DETAIL_DISPLAY_TOP_PAGER"],
        "DISPLAY_BOTTOM_PAGER" => $arParams["DETAIL_DISPLAY_BOTTOM_PAGER"],
        "PAGER_TITLE" => $arParams["DETAIL_PAGER_TITLE"],
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => $arParams["DETAIL_PAGER_TEMPLATE"],
        "PAGER_SHOW_ALL" => $arParams["DETAIL_PAGER_SHOW_ALL"],
        "CHECK_DATES" => $arParams["CHECK_DATES"],
        "ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
        "ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
        "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
        "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
        "IBLOCK_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["news"],
        "USE_SHARE" => $arParams["USE_SHARE"],
        "SHARE_HIDE" => $arParams["SHARE_HIDE"],
        "SHARE_TEMPLATE" => $arParams["SHARE_TEMPLATE"],
        "SHARE_HANDLERS" => $arParams["SHARE_HANDLERS"],
        "SHARE_SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
        "SHARE_SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
        "ADD_ELEMENT_CHAIN" => (isset($arParams["ADD_ELEMENT_CHAIN"]) ? $arParams["ADD_ELEMENT_CHAIN"] : ''),
        'STRICT_SECTION_CHECK' => (isset($arParams['STRICT_SECTION_CHECK']) ? $arParams['STRICT_SECTION_CHECK'] : ''),
    ],
    $component
); ?>

<?php $this->SetViewTarget('after_parent_sect') ?>
<?php //TODO: Товары участвующие в акции ?>
<section class="catalog">
    <div class="content">
        <div class="heading heading_more">
            <div class="heading__content">
                <h2>Товары участвующие в акции</h2>
            </div>
            <div class="more">
                <a class="more__link" href="#">
                    <span>Все товары</span>
                    <svg class="icon__arrow-right" width="24" height="24">
                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                    </svg>
                </a>
            </div>
        </div>
        <div class="catalog-items items" data-type="column">
            <div class="swiper-container base-slider s0 swiper-container-initialized swiper-container-horizontal swiper-container-free-mode" data-count="4">
                <div class="slider-wrap swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                    <div class="slider-slide swiper-slide swiper-slide-visible swiper-slide-active" style="width: 310px;">
                        <a class="catalog-item item link-item" href="#">
                            <div class="catalog-item__img img">
                                <div class="img__inner object-fit">
                                    <img class="lazy loaded" data-src="<?= SITE_STYLE_PATH ?>/img/content/catalog/1.jpg" alt="" src="<?= SITE_STYLE_PATH ?>/img/content/catalog/1.jpg" data-was-processed="true">
                                </div>
                                <div class="catalog-item__labels label-wrap">
                                    <span class="label label_small label_bg label_fiery-rose">Новинки</span>
                                    <span class="label label_small label_bg label_fiery-rose">-15%</span>
                                </div>
                            </div>
                            <div class="catalog-item__content">
                                <span class="label label_small label_fiery-rose">В наличие</span>
                                <h4>Гранитный БК-1</h4>
                                <div class="price price_small">
                                    <span class="price-now">от 4 000 ₽</span>
                                    <s class="price-old">от 5 200 ₽</s>
                                </div>
                                <div class="more-btn">
                                    <button class="btn btn-blue small" type="button">
                                        <span class="btn__text"><span data-text="В корзину">В корзину</span></span>
                                    </button>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="slider-slide swiper-slide swiper-slide-visible swiper-slide-next" style="width: 310px;">
                        <a class="catalog-item item link-item" href="#">
                            <div class="catalog-item__img img">
                                <div class="img__inner object-fit">
                                    <img class="lazy loaded" data-src="<?= SITE_STYLE_PATH ?>/img/content/catalog/2.jpg" alt="" src="<?= SITE_STYLE_PATH ?>/img/content/catalog/2.jpg" data-was-processed="true">
                                </div>
                                <div class="catalog-item__labels label-wrap">
                                    <span class="label label_small label_bg label_fiery-rose">Новинки</span>
                                </div>
                            </div>
                            <div class="catalog-item__content">
                                <span class="label label_small label_fiery-rose">В наличие</span>
                                <h4>Гранитный БР-1</h4>
                                <div class="price price_small">
                                    <span class="price-now">от 5 000 ₽</span>
                                </div>
                                <div class="more-btn">
                                    <button class="btn btn-blue small" type="button">
                                        <span class="btn__text"><span data-text="В корзину">В корзину</span></span>
                                    </button>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="slider-slide swiper-slide swiper-slide-visible" style="width: 310px;">
                        <a class="catalog-item item link-item" href="#">
                            <div class="catalog-item__img img">
                                <div class="img__inner object-fit">
                                    <img class="lazy loaded" data-src="<?= SITE_STYLE_PATH ?>/img/content/catalog/3.jpg" alt="" src="<?= SITE_STYLE_PATH ?>/img/content/catalog/3.jpg" data-was-processed="true">
                                </div>
                            </div>
                            <div class="catalog-item__content">
                                <span class="label label_small label_fiery-rose">В наличие</span>
                                <h4>Гранитный ВП-1</h4>
                                <div class="price price_small">
                                    <span class="price-now">от 7 000 ₽</span>
                                </div>
                                <div class="more-btn">
                                    <button class="btn btn-blue small" type="button">
                                        <span class="btn__text"><span data-text="В корзину">В корзину</span></span>
                                    </button>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="slider-slide swiper-slide swiper-slide-visible" style="width: 310px;">
                        <a class="catalog-item item link-item" href="#">
                            <div class="catalog-item__img img">
                                <div class="img__inner object-fit">
                                    <img class="lazy loaded" data-src="<?= SITE_STYLE_PATH ?>/img/content/catalog/4.jpg" alt="" src="<?= SITE_STYLE_PATH ?>/img/content/catalog/4.jpg" data-was-processed="true">
                                </div>
                                <div class="catalog-item__labels label-wrap">
                                    <span class="label label_small label_bg label_fiery-rose">Новинки</span>
                                    <span class="label label_small label_bg label_fiery-rose">-21%</span>
                                </div>
                            </div>
                            <div class="catalog-item__content">
                                <span class="label label_small label_fiery-rose">В наличие</span>
                                <h4>Гранитный ДС-1</h4>
                                <div class="price price_small">
                                    <span class="price-now">от 5 000 ₽</span>
                                    <s class="price-old">от 6 200 ₽</s>
                                </div>
                                <div class="more-btn">
                                    <button class="btn btn-blue small" type="button">
                                        <span class="btn__text"><span data-text="В корзину">В корзину</span></span>
                                    </button>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="slider-slide swiper-slide" style="width: 310px;">
                        <a class="catalog-item item link-item" href="#">
                            <div class="catalog-item__img img">
                                <div class="img__inner object-fit">
                                    <img class="lazy loaded" data-src="<?= SITE_STYLE_PATH ?>/img/content/catalog/1.jpg" alt="" src="<?= SITE_STYLE_PATH ?>/img/content/catalog/1.jpg" data-was-processed="true">
                                </div>
                                <div class="catalog-item__labels label-wrap">
                                    <span class="label label_small label_bg label_fiery-rose">Новинки</span>
                                    <span class="label label_small label_bg label_fiery-rose">-15%</span>
                                </div>
                            </div>
                            <div class="catalog-item__content">
                                <span class="label label_small label_fiery-rose">В наличие</span>
                                <h4>Гранитный БК-1</h4>
                                <div class="price price_small">
                                    <span class="price-now">от 4 000 ₽</span>
                                    <s class="price-old">от 5 200 ₽</s>
                                </div>
                                <div class="more-btn">
                                    <button class="btn btn-blue small" type="button">
                                        <span class="btn__text"><span data-text="В корзину">В корзину</span></span>
                                    </button>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="slider-arrows slider-arrows_prev">
                    <div class="slider-btn slider-btn_prev l0 swiper-button-disabled" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true">
                        <svg class="icon__slider-prev" width="32" height="32">
                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-prev"></use>
                        </svg>
                    </div>
                </div>
                <div class="slider-arrows slider-arrows_next">
                    <div class="slider-btn slider-btn_next r0" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false">
                        <svg class="icon__slider-next" width="32" height="32">
                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-next"></use>
                        </svg>
                    </div>
                </div>
                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
            </div>
        </div>
    </div>
</section>
<?php
global $arrFilterNews;
$arrFilterNews = [
    '!ID' => $ElementID,
];
$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "list",
    [
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "NEWS_COUNT" => 5,
        "SORT_BY1" => $arParams["SORT_BY1"],
        "SORT_ORDER1" => $arParams["SORT_ORDER1"],
        "SORT_BY2" => $arParams["SORT_BY2"],
        "SORT_ORDER2" => $arParams["SORT_ORDER2"],
        "FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
        "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
        "DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["detail"],
        "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
        "IBLOCK_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["news"],
        "DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
        "SET_TITLE" => "N",
        "SET_LAST_MODIFIED" => "N",
        "MESSAGE_404" => $arParams["MESSAGE_404"],
        "SET_STATUS_404" => "N",
        "SHOW_404" => "N",
        "FILE_404" => $arParams["FILE_404"],
        "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "CACHE_FILTER" => $arParams["CACHE_FILTER"],
        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "PAGER_TITLE" => $arParams["PAGER_TITLE"],
        "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
        "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
        "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
        "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
        "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
        "PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
        "PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
        "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
        "DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
        "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
        "PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
        "ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
        "USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
        "GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
        "FILTER_NAME" => "arrFilterNews",
        "HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
        "CHECK_DATES" => $arParams["CHECK_DATES"],
    ],
    $component
);
unset($arrFilterNews);
?>
<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/adv.php", [], ["SHOW_BORDER" => true]); ?>
<?php $this->EndViewTarget() ?>
