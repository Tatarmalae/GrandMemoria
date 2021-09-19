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

use Bitrix\Iblock\SectionPropertyTable;
use Bitrix\Main\Application;
use Bitrix\Main\Diag\Debug;
use Dev\Catalog;

$request = Application::getInstance()->getContext()->getRequest();
if ($request->isAjaxRequest()) $APPLICATION->RestartBuffer();

$section = '';
try {
    $section = Catalog::getSectionByCode($arParams["IBLOCK_ID"], $arResult["VARIABLES"]["SECTION_CODE"]);
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}

$propertyList = SectionPropertyTable::getList([
    "select" => [
        "PROPERTY_ID",
    ],
    "filter" => [
        "=IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "=SMART_FILTER" => "Y",
    ],
]);
$propIDs = [];
while ($res = $propertyList->fetch()) {
    $propIDs[] = $res['PROPERTY_ID'];
}

$properties = [];
try {
    $elements = Catalog::getElementList($arParams["IBLOCK_ID"], $section["ID"]);
    foreach ($elements as $element) {
        foreach ($element['PROPERTIES'] as $property) {
            if (!in_array($property['ID'], $propIDs) || empty($property['VALUE'])) continue;
            $properties[$property['ID']]['NAME'] = $property['NAME'];
            $properties[$property['ID']]['CODE'] = $property['CODE'];
            $properties[$property['ID']]['VALUES'][] = $property['VALUE_ENUM'] ?: $property['VALUE'];
            $properties[$property['ID']]['LIST_TYPE'] = $property['LIST_TYPE'];
        }
    }
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}
?>

<?php $this->SetViewTarget('before_parent_sect'); ?>
<?php
$APPLICATION->IncludeComponent(
    "bitrix:catalog.section.list",
    "categories",
    [
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "ID" => $section['IBLOCK_SECTION_ID'] ?: $section["ID"],
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
    <?php
    $APPLICATION->IncludeComponent(
        "bitrix:catalog.section.list",
        "list",
        [
            "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
            "IBLOCK_ID" => $arParams["IBLOCK_ID"],
            "SECTION_ID" => $section['IBLOCK_SECTION_ID'],
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
            <?php // TODO: сбросить всё ?>
            <span>Сбросить все</span>
        </div>
        <div class="filter-fixed__inner">
            <div class="filter-row">
                <?php foreach ($properties as $prop): ?>
                    <?php $prop['VALUES'] = array_unique($prop['VALUES']) ?>
                    <?php if ($prop['CODE'] === 'PRICE') continue ?>
                    <div class="filter-column">
                        <div class="filter-fixed__label">
                            <span><?= $prop['NAME'] ?></span>
                            <svg class="icon__arrow-right" width="32" height="32">
                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                            </svg>
                        </div>
                        <div class="dropdown">
                            <input type="hidden" data-code="<?= $prop['CODE'] ?>" value="<?= $prop['NAME'] ?>">
                            <div class="dropdown-label" id="filterDrop_<?= $prop['CODE'] ?>" data-toggle="dropdown" aria-expanded="false">
                                <svg class="icon__arrow-drop" width="32" height="32">
                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                </svg>
                                <div class="dropdown-value" data-value="<?= $prop['NAME'] ?>"><?= $prop['NAME'] ?></div>
                            </div>
                            <ul class="dropdown-menu" aria-labelledby="filterDrop_<?= $prop['CODE'] ?>">
                                <?php foreach ($prop['VALUES'] as $value): ?>
                                    <li data-code="<?= $prop['CODE'] ?>" data-value="<?= $value ?>"><?= $value ?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <div class="filter-fixed__items">
                            <div class="filter-fixed__items-inner">
                                <?php foreach ($prop['VALUES'] as $value): ?>
                                    <div class="checkbox">
                                        <input type="checkbox" name="checkbox" id="<?= $prop['CODE'] ?>">
                                        <label for="<?= $prop['CODE'] ?>">
                                            <span class="checkbox__box"></span>
                                            <?= $value ?>
                                        </label>
                                    </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                <?php foreach ($properties as $prop): ?>
                    <?php if ($prop['CODE'] !== 'PRICE') continue ?>
                    <div class="filter-column">
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
                <?php endforeach ?>
                <div class="filter-column filter-column_check">
                    <div class="checkbox-line">
                        <div class="checkbox">
                            <input type="checkbox" name="checkbox" id="filterCheck1">
                            <label for="filterCheck1">
                                <span class="checkbox__box"></span>
                                Новинки<?php // TODO: Новинки ?>
                            </label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" name="checkbox" id="filterCheck2">
                            <label for="filterCheck2">
                                <span class="checkbox__box"></span>
                                Акции и скидки<?php // TODO: Акции и скидки ?>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="filter-fixed__btn">
            <button class="btn btn-blue small btn-block" type="button">
                <span class="btn__text ajax-count">
                    <span data-text="Посмотреть <?php $APPLICATION->ShowViewContent('catalog__count') ?>">
                        Посмотреть <?php $APPLICATION->ShowViewContent('catalog__count') ?>
                    </span>
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
                <div class="filter-count">
                    <?php $APPLICATION->ShowViewContent('catalog__count') ?>
                </div>
            </div>
            <div class="filter-column">
                <div class="dropdown">
                    <?php // TODO: сортировка ?>
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
if ($request->isAjaxRequest()) {
    global $arrFilter;
    $arrFilter = [];
    foreach ($request->getPostList() as $key => $item) {
        $arrFilter['PROPERTY_' . $key . '_VALUE'] = array_search($item, array_column($properties, 'NAME')) ? '' : $item;

    }
    \Dev\Utilities::DB($arrFilter);
}

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
        "FILTER_NAME" => "arrFilter",
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
        "PARENT_SECTION" => $section['ID'],
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

<?php if (!$request->isAjaxRequest()): ?>

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

<?php endif ?>

<?php if ($request->isAjaxRequest()) die(); ?>
