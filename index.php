<?php 
// ini_set ('xdebug.collect_return', 1);
// ini_set ('xdebug.collect_params', 4);
// if ($_SERVER['REMOTE_ADDR'] == "217.197.229.110") {
//     xdebug_start_trace('xlog'.rand().'.log');
//     }



require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Официальный сайт агентства ГрандМемориа Казань");
/**
 * @var $APPLICATION
 */
$APPLICATION->SetTitle("Ритуальное агентство ГрандМемориа Казань");
?>
<?php
global $arrFilterFaq;
$arrFilterFaq = [
    'SECTION_ID' => 6,
];
$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "faq_list",
    [
        "COMPONENT_TEMPLATE" => "faq_list",
        "IBLOCK_TYPE" => "info",
        "IBLOCK_ID" => "3",
        "NEWS_COUNT" => "3",
        "SORT_BY1" => "SORT",
        "SORT_ORDER1" => "ASC",
        "SORT_BY2" => "SORT",
        "SORT_ORDER2" => "ASC",
        "FILTER_NAME" => "arrFilterFaq",
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
            0 => "LINKS",
            1 => "",
            2 => "",
            3 => "",
            4 => "",
            5 => "",
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
        "TITLE" => "Часто задаваемые вопросы",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "MESSAGE_404" => "",
    ],
    false
);
?>
<?php unset($arrFilterFaq) ?>
<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>