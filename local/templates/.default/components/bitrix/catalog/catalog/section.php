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
/** @var array $arCurSection */
$this->setFrameMode(true);
?>

<?php $this->SetViewTarget('before_parent_sect'); ?>
<?php
$APPLICATION->IncludeComponent(
    "bitrix:catalog.section.list",
    "categories",
    [
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
        "COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
        "TOP_DEPTH" => 1,
        "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
        "VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
        "SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
        "HIDE_SECTION_NAME" => ($arParams["SECTIONS_HIDE_SECTION_NAME"] ?? "N"),
        "ADD_SECTIONS_CHAIN" => ($arParams["ADD_SECTIONS_CHAIN"] ?? ''),
    ],
    $component,
    ($arParams["SHOW_TOP_ELEMENTS"] !== "N" ? ["HIDE_ICONS" => "Y"] : [])
);
?>
<?php $this->EndViewTarget() ?>

<div class="filter">

    <div class="filter-item filter-item_top">
        <?php
        $APPLICATION->IncludeComponent(
            "bitrix:catalog.section.list",
            "list",
            [
                "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
                "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
                "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                "CACHE_TIME" => $arParams["CACHE_TIME"],
                "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                "COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
                "TOP_DEPTH" => 1,
                "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
                "VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
                "SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
                "HIDE_SECTION_NAME" => ($arParams["SECTIONS_HIDE_SECTION_NAME"] ?? "N"),
                "ADD_SECTIONS_CHAIN" => ($arParams["ADD_SECTIONS_CHAIN"] ?? ''),
            ],
            $component,
            ["HIDE_ICONS" => "Y"]
        );
        ?>
    </div>

    <?php //TODO: фильтр ?>
    <div class="filter-item filter-item_center filter-fixed">
        <div class="filter-fixed__top">
            <div class="filter-fixed__back">
                <svg class="icon__arrow-right" width="32" height="32">
                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                </svg>
            </div>
            <div class="filter-fixed__top-title" data-text="Фильтры">Фильтры</div>
            <div class="filter-fixed__close">
                <svg class="icon__close-modal" width="32" height="32">
                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#close-modal"></use>
                </svg>
            </div>
        </div>
        <div class="filter-fixed__clear">
            <span>Сбросить все</span>
        </div>
        <div class="filter-fixed__inner">
            <div class="filter-row">
                <div class="filter-column">
                    <div class="filter-fixed__label">
                        <span>Количество людей</span>
                        <svg class="icon__arrow-right" width="32" height="32">
                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                        </svg>
                    </div>
                    <div class="dropdown">
                        <input type="hidden" value="Количество людей">
                        <div class="dropdown-label" id="filterDrop1" data-toggle="dropdown" aria-expanded="false">
                            <svg class="icon__arrow-drop" width="32" height="32">
                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                            </svg>
                            <div class="dropdown-value" data-value="Количество людей">Количество людей</div>
                        </div>
                        <ul class="dropdown-menu" aria-labelledby="filterDrop1">
                            <li data-value="Количество людей 1">Количество людей 1</li>
                            <li data-value="Количество людей 2">Количество людей 2</li>
                            <li data-value="Количество людей 3">Количество людей 3</li>
                        </ul>
                    </div>
                    <div class="filter-fixed__items">
                        <div class="filter-fixed__items-inner">
                            <div class="checkbox">
                                <input type="checkbox" name="checkbox" id="filterFixed1_1">
                                <label for="filterFixed1_1">
                                    <span class="checkbox__box"></span>
                                    Количество людей 1</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" name="checkbox" id="filterFixed1_2">
                                <label for="filterFixed1_2">
                                    <span class="checkbox__box"></span>
                                    Количество людей 2</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" name="checkbox" id="filterFixed1_3">
                                <label for="filterFixed1_3">
                                    <span class="checkbox__box"></span>
                                    Количество людей 3</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter-column">
                    <div class="filter-fixed__label">
                        <span>Цвета</span>
                        <svg class="icon__arrow-right" width="32" height="32">
                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                        </svg>
                    </div>
                    <div class="dropdown">
                        <input type="hidden" value="Цвета">
                        <div class="dropdown-label" id="filterDrop2" data-toggle="dropdown" aria-expanded="false">
                            <svg class="icon__arrow-drop" width="32" height="32">
                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                            </svg>
                            <div class="dropdown-value" data-value="Цвета">Цвета</div>
                        </div>
                        <ul class="dropdown-menu" aria-labelledby="filterDrop2">
                            <li data-value="Цвета 1">Цвета 1</li>
                            <li data-value="Цвета 2">Цвета 2</li>
                            <li data-value="Цвета 3">Цвета 3</li>
                        </ul>
                    </div>
                    <div class="filter-fixed__items">
                        <div class="filter-fixed__items-inner">
                            <div class="checkbox">
                                <input type="checkbox" name="checkbox" id="filterFixed2_1">
                                <label for="filterFixed2_1">
                                    <span class="checkbox__box"></span>
                                    Цвета 1</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" name="checkbox" id="filterFixed2_2">
                                <label for="filterFixed2_2">
                                    <span class="checkbox__box"></span>
                                    Цвета 2</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" name="checkbox" id="filterFixed2_3">
                                <label for="filterFixed2_3">
                                    <span class="checkbox__box"></span>
                                    Цвета 3</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter-column">
                    <div class="filter-fixed__label">
                        <span>Принадлежность</span>
                        <svg class="icon__arrow-right" width="32" height="32">
                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                        </svg>
                    </div>
                    <div class="dropdown">
                        <input type="hidden" value="Принадлежность">
                        <div class="dropdown-label" id="filterDrop3" data-toggle="dropdown" aria-expanded="false">
                            <svg class="icon__arrow-drop" width="32" height="32">
                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                            </svg>
                            <div class="dropdown-value" data-value="Принадлежность">Принадлежность</div>
                        </div>
                        <ul class="dropdown-menu" aria-labelledby="filterDrop3">
                            <li data-value="Принадлежность 1">Принадлежность 1</li>
                            <li data-value="Принадлежность 2">Принадлежность 2</li>
                            <li data-value="Принадлежность 3">Принадлежность 3</li>
                        </ul>
                    </div>
                    <div class="filter-fixed__items">
                        <div class="filter-fixed__items-inner">
                            <div class="checkbox">
                                <input type="checkbox" name="checkbox" id="filterFixed3_1">
                                <label for="filterFixed3_1">
                                    <span class="checkbox__box"></span>
                                    Принадлежность 1</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" name="checkbox" id="filterFixed3_2">
                                <label for="filterFixed3_2">
                                    <span class="checkbox__box"></span>
                                    Принадлежность 2</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" name="checkbox" id="filterFixed3_3">
                                <label for="filterFixed3_3">
                                    <span class="checkbox__box"></span>
                                    Принадлежность 3</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter-column">
                    <div class="filter-fixed__label">
                        <span>Ориентация</span>
                        <svg class="icon__arrow-right" width="32" height="32">
                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                        </svg>
                    </div>
                    <div class="dropdown">
                        <input type="hidden" value="Ориентация">
                        <div class="dropdown-label" id="filterDrop4" data-toggle="dropdown" aria-expanded="false">
                            <svg class="icon__arrow-drop" width="32" height="32">
                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                            </svg>
                            <div class="dropdown-value" data-value="Ориентация">Ориентация</div>
                        </div>
                        <ul class="dropdown-menu" aria-labelledby="filterDrop4">
                            <li data-value="Ориентация 1">Ориентация 1</li>
                            <li data-value="Ориентация 2">Ориентация 2</li>
                            <li data-value="Ориентация 3">Ориентация 3</li>
                        </ul>
                    </div>
                    <div class="filter-fixed__items">
                        <div class="filter-fixed__items-inner">
                            <div class="checkbox">
                                <input type="checkbox" name="checkbox" id="filterFixed4_1">
                                <label for="filterFixed4_1">
                                    <span class="checkbox__box"></span>
                                    Ориентация 1</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" name="checkbox" id="filterFixed4_2">
                                <label for="filterFixed4_2">
                                    <span class="checkbox__box"></span>
                                    Ориентация 2</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" name="checkbox" id="filterFixed4_3">
                                <label for="filterFixed4_3">
                                    <span class="checkbox__box"></span>
                                    Ориентация 3</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter-column">
                    <div class="filter-fixed__label">
                        <span>Форма</span>
                        <svg class="icon__arrow-right" width="32" height="32">
                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                        </svg>
                    </div>
                    <div class="dropdown">
                        <input type="hidden" value="Форма">
                        <div class="dropdown-label" id="filterDrop5" data-toggle="dropdown" aria-expanded="false">
                            <svg class="icon__arrow-drop" width="32" height="32">
                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                            </svg>
                            <div class="dropdown-value" data-value="Форма">Форма</div>
                        </div>
                        <ul class="dropdown-menu" aria-labelledby="filterDrop5">
                            <li data-value="Форма 1">Форма 1</li>
                            <li data-value="Форма 2">Форма 2</li>
                            <li data-value="Форма 3">Форма 3</li>
                        </ul>
                    </div>
                    <div class="filter-fixed__items">
                        <div class="filter-fixed__items-inner">
                            <div class="checkbox">
                                <input type="checkbox" name="checkbox" id="filterFixed5_1">
                                <label for="filterFixed5_1">
                                    <span class="checkbox__box"></span>
                                    Форма 1</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" name="checkbox" id="filterFixed5_2">
                                <label for="filterFixed5_2">
                                    <span class="checkbox__box"></span>
                                    Форма 2</label>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" name="checkbox" id="filterFixed5_3">
                                <label for="filterFixed5_3">
                                    <span class="checkbox__box"></span>
                                    Форма 3</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter-column">
                    <div class="filter-fixed__label">
                        <span>Цена</span>
                        <svg class="icon__arrow-right" width="32" height="32">
                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                        </svg>
                    </div>
                    <div class="filter-fixed__items filter-fixed__items_static">
                        <div class="filter-fixed__items-inner">
                            <div class="filter-interval">
                                <div class="interval">
                                    <div id="slider" data-type="range" data-size="small"></div>
                                </div>
                                <div class="filter-interval__item">
                                    <span class="filter-interval__label">От</span>
                                    <input id="input-with-keypress-0" value="0">
                                </div>
                                <div class="filter-interval__item">
                                    <span class="filter-interval__label">До</span>
                                    <input id="input-with-keypress-1" value="0">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter-column filter-column_check">
                    <div class="checkbox-line">
                        <div class="checkbox">
                            <input type="checkbox" name="checkbox" id="filterCheck1">
                            <label for="filterCheck1">
                                <span class="checkbox__box"></span>
                                Новинки</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" name="checkbox" id="filterCheck2">
                            <label for="filterCheck2">
                                <span class="checkbox__box"></span>
                                Акции и скидки</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="filter-fixed__btn">
            <button class="btn btn-blue small btn-block" type="button">
                <span class="btn__text">
                    <span data-text="Посмотреть 748 товаров">Посмотреть 748 товаров</span>
                </span>
            </button>
        </div>
    </div>
    <div class="filter-item filter-item_bottom">
        <div class="filter-row">
            <div class="filter-column filter-column_btn">
                <div class="filter-btn">
                    <svg class="icon__filter" width="32" height="32">
                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#filter"></use>
                    </svg>
                    <span>Фильтры</span>
                </div>
            </div>
            <div class="filter-column filter-column_count">
                <div class="filter-count">748 товара</div>
            </div>
            <div class="filter-column">
                <div class="dropdown">
                    <input type="hidden" value="По популярности">
                    <div class="dropdown-label" id="filterDrop6" data-toggle="dropdown" aria-expanded="false">
                        <svg class="icon__arrow-drop" width="32" height="32">
                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                        </svg>

                        <div class="dropdown-value" data-value="По популярности">По популярности</div>
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="filterDrop6">
                        <li data-value="По популярности 1">По популярности 1</li>
                        <li data-value="По популярности 2">По популярности 2</li>
                        <li data-value="По популярности 3">По популярности 3</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "product",
    [
        "COMPONENT_TEMPLATE" => "product",
        "IBLOCK_TYPE" => "catalog",
        "IBLOCK_ID" => "12",
        "NEWS_COUNT" => "12",
        "SORT_BY1" => "PROPERTY_PRICE",
        "SORT_ORDER1" => "ASC",
        "SORT_BY2" => "SORT",
        "SORT_ORDER2" => "ASC",
        "FILTER_NAME" => "",
        "FIELD_CODE" => [
            0 => "ID",
            1 => "CODE",
            2 => "XML_ID",
            3 => "NAME",
            4 => "TAGS",
            5 => "SORT",
            6 => "PREVIEW_TEXT",
            7 => "PREVIEW_PICTURE",
            8 => "DETAIL_TEXT",
            9 => "DETAIL_PICTURE",
            10 => "DATE_ACTIVE_FROM",
            11 => "ACTIVE_FROM",
            12 => "DATE_ACTIVE_TO",
            13 => "ACTIVE_TO",
            14 => "SHOW_COUNTER",
            15 => "SHOW_COUNTER_START",
            16 => "IBLOCK_TYPE_ID",
            17 => "IBLOCK_ID",
            18 => "IBLOCK_CODE",
            19 => "IBLOCK_NAME",
            20 => "IBLOCK_EXTERNAL_ID",
            21 => "DATE_CREATE",
            22 => "CREATED_BY",
            23 => "CREATED_USER_NAME",
            24 => "TIMESTAMP_X",
            25 => "MODIFIED_BY",
            26 => "USER_NAME",
            27 => "",
        ],
        "PROPERTY_CODE" => [
            0 => "PRICE",
            1 => "OLD_PRICE",
            2 => "NEW",
        ],
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "N",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "PREVIEW_TRUNCATE_LEN" => "",
        "ACTIVE_DATE_FORMAT" => "",
        "SET_TITLE" => "N",
        "SET_BROWSER_TITLE" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_LAST_MODIFIED" => "N",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "PARENT_SECTION" => $arResult['VARIABLES']['SECTION_ID'],
        "PARENT_SECTION_CODE" => "",
        "INCLUDE_SUBSECTIONS" => "Y",
        "STRICT_SECTION_CHECK" => "N",
        "PAGER_TEMPLATE" => "pager",
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "Y",
        "PAGER_TITLE" => "",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "SET_STATUS_404" => "Y",
        "SHOW_404" => "Y",
        "FILE_404" => "",
        "TITLE" => "Акции",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "MESSAGE_404" => "",
    ],
    false
);
?>

<?php $this->SetViewTarget('after_parent_sect'); ?>

<?php
$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "stock_list",
    [
        "COMPONENT_TEMPLATE" => "stock_list",
        "IBLOCK_TYPE" => "content",
        "IBLOCK_ID" => "14",
        "NEWS_COUNT" => "5",
        "SORT_BY1" => "SORT",
        "SORT_ORDER1" => "ASC",
        "SORT_BY2" => "SORT",
        "SORT_ORDER2" => "ASC",
        "FILTER_NAME" => "",
        "FIELD_CODE" => [
            0 => "ID",
            1 => "CODE",
            2 => "XML_ID",
            3 => "NAME",
            4 => "TAGS",
            5 => "SORT",
            6 => "PREVIEW_TEXT",
            7 => "PREVIEW_PICTURE",
            8 => "DETAIL_TEXT",
            9 => "DETAIL_PICTURE",
            10 => "DATE_ACTIVE_FROM",
            11 => "ACTIVE_FROM",
            12 => "DATE_ACTIVE_TO",
            13 => "ACTIVE_TO",
            14 => "SHOW_COUNTER",
            15 => "SHOW_COUNTER_START",
            16 => "IBLOCK_TYPE_ID",
            17 => "IBLOCK_ID",
            18 => "IBLOCK_CODE",
            19 => "IBLOCK_NAME",
            20 => "IBLOCK_EXTERNAL_ID",
            21 => "DATE_CREATE",
            22 => "CREATED_BY",
            23 => "CREATED_USER_NAME",
            24 => "TIMESTAMP_X",
            25 => "MODIFIED_BY",
            26 => "USER_NAME",
            27 => "",
        ],
        "PROPERTY_CODE" => [
            0 => "",
            1 => "",
        ],
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "N",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "36000000",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "Y",
        "PREVIEW_TRUNCATE_LEN" => "",
        "ACTIVE_DATE_FORMAT" => "",
        "SET_TITLE" => "N",
        "SET_BROWSER_TITLE" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_LAST_MODIFIED" => "N",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "INCLUDE_SUBSECTIONS" => "Y",
        "STRICT_SECTION_CHECK" => "N",
        "PAGER_TEMPLATE" => "",
        "DISPLAY_TOP_PAGER" => "N",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "PAGER_TITLE" => "",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "SET_STATUS_404" => "N",
        "SHOW_404" => "N",
        "FILE_404" => "",
        "TITLE" => "Акции и скидки",
    ],
    false
);
?>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/feedback_form.php", [], ["SHOW_BORDER" => true]); ?>

<?php $this->EndViewTarget() ?>
