<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

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

use Bitrix\Main\Diag\Debug;
use Dev\Catalog;

$section = '';
$sectionName = '';
$sectionProps = '';
$elementAlsoIDs = '';
$elementBenefits = false;
$elementServices = false;
try {
    $section = Catalog::getSectionByCode($arParams['IBLOCK_ID'], $arResult['VARIABLES']['SECTION_CODE']);
    $sectionName = $section['IBLOCK_SECTION_ID'] ? Catalog::getSectionByID($section['IBLOCK_SECTION_ID'])['NAME'] : $section['NAME'];
    $sectionProps = Catalog::getSectionProps($arParams['IBLOCK_ID'], $section['IBLOCK_SECTION_ID'] ?: $section['ID']);

	if ($sectionProps['UF_ID_PRODUCT_TO_BUYS']) {
        $elementAlsoIDs = $sectionProps['UF_ID_PRODUCT_TO_BUYS'];
    }

    if ($sectionProps['UF_BENEFITS']) {
        $elementBenefits = Catalog::getElementList(37, '', [], 2, ['ID' => $sectionProps['UF_BENEFITS']]);
    }
    if ($sectionProps['UF_SERVICES']) {
        $elementServices = $sectionProps['UF_SERVICES'];
    }
    if ($sectionProps['UF_YOUTUBE']) {
        $elementYouTube = $sectionProps['UF_YOUTUBE'];
    }
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}
?>
<div class="product-wrap">
    <?php
    $elementId = $APPLICATION->IncludeComponent(
        'bitrix:catalog.element',
        '',
        [
            'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
            'IBLOCK_ID' => $arParams['IBLOCK_ID'],
            'PROPERTY_CODE' => ($arParams['DETAIL_PROPERTY_CODE'] ?? []),
            'META_KEYWORDS' => $arParams['DETAIL_META_KEYWORDS'],
            'META_DESCRIPTION' => $arParams['DETAIL_META_DESCRIPTION'],
            'BROWSER_TITLE' => $arParams['DETAIL_BROWSER_TITLE'],
            'SET_CANONICAL_URL' => $arParams['DETAIL_SET_CANONICAL_URL'],
            'BASKET_URL' => $arParams['BASKET_URL'],
            'SHOW_SKU_DESCRIPTION' => $arParams['SHOW_SKU_DESCRIPTION'],
            'ACTION_VARIABLE' => $arParams['ACTION_VARIABLE'],
            'PRODUCT_ID_VARIABLE' => $arParams['PRODUCT_ID_VARIABLE'],
            'SECTION_ID_VARIABLE' => $arParams['SECTION_ID_VARIABLE'],
            'CHECK_SECTION_ID_VARIABLE' => ($arParams['DETAIL_CHECK_SECTION_ID_VARIABLE'] ?? ''),
            'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
            'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
            'CACHE_TYPE' => $arParams['CACHE_TYPE'],
            'CACHE_TIME' => $arParams['CACHE_TIME'],
            'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
            'SET_TITLE' => $arParams['SET_TITLE'],
            'SET_LAST_MODIFIED' => $arParams['SET_LAST_MODIFIED'],
            'MESSAGE_404' => $arParams['~MESSAGE_404'],
            'SET_STATUS_404' => $arParams['SET_STATUS_404'],
            'SHOW_404' => $arParams['SHOW_404'],
            'FILE_404' => $arParams['FILE_404'],
            'PRICE_CODE' => $arParams['~PRICE_CODE'],
            'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
            'SHOW_PRICE_COUNT' => $arParams['SHOW_PRICE_COUNT'],
            'PRICE_VAT_INCLUDE' => $arParams['PRICE_VAT_INCLUDE'],
            'PRICE_VAT_SHOW_VALUE' => $arParams['PRICE_VAT_SHOW_VALUE'],
            'USE_PRODUCT_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
            'PRODUCT_PROPERTIES' => ($arParams['PRODUCT_PROPERTIES'] ?? []),
            'ADD_PROPERTIES_TO_BASKET' => ($arParams['ADD_PROPERTIES_TO_BASKET'] ?? ''),
            'PARTIAL_PRODUCT_PROPERTIES' => ($arParams['PARTIAL_PRODUCT_PROPERTIES'] ?? ''),
            'LINK_IBLOCK_TYPE' => $arParams['LINK_IBLOCK_TYPE'],
            'LINK_IBLOCK_ID' => $arParams['LINK_IBLOCK_ID'],
            'LINK_PROPERTY_SID' => $arParams['LINK_PROPERTY_SID'],
            'LINK_ELEMENTS_URL' => $arParams['LINK_ELEMENTS_URL'],

            'OFFERS_CART_PROPERTIES' => ($arParams['OFFERS_CART_PROPERTIES'] ?? []),
            'OFFERS_FIELD_CODE' => $arParams['DETAIL_OFFERS_FIELD_CODE'],
            'OFFERS_PROPERTY_CODE' => ($arParams['DETAIL_OFFERS_PROPERTY_CODE'] ?? []),
            'OFFERS_SORT_FIELD' => $arParams['OFFERS_SORT_FIELD'],
            'OFFERS_SORT_ORDER' => $arParams['OFFERS_SORT_ORDER'],
            'OFFERS_SORT_FIELD2' => $arParams['OFFERS_SORT_FIELD2'],
            'OFFERS_SORT_ORDER2' => $arParams['OFFERS_SORT_ORDER2'],

            'ELEMENT_ID' => $arResult['VARIABLES']['ELEMENT_ID'],
            'ELEMENT_CODE' => $arResult['VARIABLES']['ELEMENT_CODE'],
            'SECTION_ID' => $arResult['VARIABLES']['SECTION_ID'],
            'SECTION_CODE' => $arResult['VARIABLES']['SECTION_CODE'],
            'SECTION_URL' => $arResult['FOLDER'] . $arResult['URL_TEMPLATES']['section'],
            'DETAIL_URL' => $arResult['FOLDER'] . $arResult['URL_TEMPLATES']['element'],
            'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
            'CURRENCY_ID' => $arParams['CURRENCY_ID'],
            'HIDE_NOT_AVAILABLE' => $arParams['HIDE_NOT_AVAILABLE'],
            'HIDE_NOT_AVAILABLE_OFFERS' => $arParams['HIDE_NOT_AVAILABLE_OFFERS'],
            'USE_ELEMENT_COUNTER' => $arParams['USE_ELEMENT_COUNTER'],
            'SHOW_DEACTIVATED' => $arParams['SHOW_DEACTIVATED'],
            'USE_MAIN_ELEMENT_SECTION' => $arParams['USE_MAIN_ELEMENT_SECTION'],
            'STRICT_SECTION_CHECK' => ($arParams['DETAIL_STRICT_SECTION_CHECK'] ?? ''),
            'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
            'LABEL_PROP' => $arParams['LABEL_PROP'],
            'LABEL_PROP_MOBILE' => $arParams['LABEL_PROP_MOBILE'],
            'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],
            'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
            'OFFER_TREE_PROPS' => ($arParams['OFFER_TREE_PROPS'] ?? []),
            'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
            'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
            'DISCOUNT_PERCENT_POSITION' => ($arParams['DISCOUNT_PERCENT_POSITION'] ?? ''),
            'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
            'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
            'MESS_SHOW_MAX_QUANTITY' => ($arParams['~MESS_SHOW_MAX_QUANTITY'] ?? ''),
            'RELATIVE_QUANTITY_FACTOR' => ($arParams['RELATIVE_QUANTITY_FACTOR'] ?? ''),
            'MESS_RELATIVE_QUANTITY_MANY' => ($arParams['~MESS_RELATIVE_QUANTITY_MANY'] ?? ''),
            'MESS_RELATIVE_QUANTITY_FEW' => ($arParams['~MESS_RELATIVE_QUANTITY_FEW'] ?? ''),
            'MESS_BTN_BUY' => ($arParams['~MESS_BTN_BUY'] ?? ''),
            'MESS_BTN_ADD_TO_BASKET' => ($arParams['~MESS_BTN_ADD_TO_BASKET'] ?? ''),
            'MESS_BTN_SUBSCRIBE' => ($arParams['~MESS_BTN_SUBSCRIBE'] ?? ''),
            'MESS_BTN_DETAIL' => ($arParams['~MESS_BTN_DETAIL'] ?? ''),
            'MESS_NOT_AVAILABLE' => ($arParams['~MESS_NOT_AVAILABLE'] ?? ''),
            'MESS_BTN_COMPARE' => ($arParams['~MESS_BTN_COMPARE'] ?? ''),
            'MESS_PRICE_RANGES_TITLE' => ($arParams['~MESS_PRICE_RANGES_TITLE'] ?? ''),
            'MESS_DESCRIPTION_TAB' => ($arParams['~MESS_DESCRIPTION_TAB'] ?? ''),
            'MESS_PROPERTIES_TAB' => ($arParams['~MESS_PROPERTIES_TAB'] ?? ''),
            'MESS_COMMENTS_TAB' => ($arParams['~MESS_COMMENTS_TAB'] ?? ''),
            'MAIN_BLOCK_PROPERTY_CODE' => ($arParams['DETAIL_MAIN_BLOCK_PROPERTY_CODE'] ?? ''),
            'MAIN_BLOCK_OFFERS_PROPERTY_CODE' => ($arParams['DETAIL_MAIN_BLOCK_OFFERS_PROPERTY_CODE'] ?? ''),
            'USE_VOTE_RATING' => $arParams['DETAIL_USE_VOTE_RATING'],
            'VOTE_DISPLAY_AS_RATING' => ($arParams['DETAIL_VOTE_DISPLAY_AS_RATING'] ?? ''),
            'USE_COMMENTS' => $arParams['DETAIL_USE_COMMENTS'],
            'BLOG_USE' => ($arParams['DETAIL_BLOG_USE'] ?? ''),
            'BLOG_URL' => ($arParams['DETAIL_BLOG_URL'] ?? ''),
            'BLOG_EMAIL_NOTIFY' => ($arParams['DETAIL_BLOG_EMAIL_NOTIFY'] ?? ''),
            'VK_USE' => ($arParams['DETAIL_VK_USE'] ?? ''),
            'VK_API_ID' => ($arParams['DETAIL_VK_API_ID'] ?? 'API_ID'),
            'FB_USE' => ($arParams['DETAIL_FB_USE'] ?? ''),
            'FB_APP_ID' => ($arParams['DETAIL_FB_APP_ID'] ?? ''),
            'BRAND_USE' => ($arParams['DETAIL_BRAND_USE'] ?? 'N'),
            'BRAND_PROP_CODE' => ($arParams['DETAIL_BRAND_PROP_CODE'] ?? ''),
            'DISPLAY_NAME' => ($arParams['DETAIL_DISPLAY_NAME'] ?? ''),
            'IMAGE_RESOLUTION' => ($arParams['DETAIL_IMAGE_RESOLUTION'] ?? ''),
            'PRODUCT_INFO_BLOCK_ORDER' => ($arParams['DETAIL_PRODUCT_INFO_BLOCK_ORDER'] ?? ''),
            'PRODUCT_PAY_BLOCK_ORDER' => ($arParams['DETAIL_PRODUCT_PAY_BLOCK_ORDER'] ?? ''),
            'ADD_DETAIL_TO_SLIDER' => ($arParams['DETAIL_ADD_DETAIL_TO_SLIDER'] ?? ''),
            'TEMPLATE_THEME' => ($arParams['TEMPLATE_THEME'] ?? ''),
            'ADD_SECTIONS_CHAIN' => ($arParams['ADD_SECTIONS_CHAIN'] ?? ''),
            'ADD_ELEMENT_CHAIN' => ($arParams['ADD_ELEMENT_CHAIN'] ?? ''),
            'DISPLAY_PREVIEW_TEXT_MODE' => ($arParams['DETAIL_DISPLAY_PREVIEW_TEXT_MODE'] ?? ''),
            'DETAIL_PICTURE_MODE' => ($arParams['DETAIL_DETAIL_PICTURE_MODE'] ?? []),
            'ADD_TO_BASKET_ACTION_PRIMARY' => ($arParams['DETAIL_ADD_TO_BASKET_ACTION_PRIMARY'] ?? null),
            'SHOW_CLOSE_POPUP' => $arParams['COMMON_SHOW_CLOSE_POPUP'] ?? '',
            'DISPLAY_COMPARE' => ($arParams['USE_COMPARE'] ?? ''),
            'COMPARE_PATH' => $arResult['FOLDER'] . $arResult['URL_TEMPLATES']['compare'],
            'USE_COMPARE_LIST' => 'Y',
            'BACKGROUND_IMAGE' => ($arParams['DETAIL_BACKGROUND_IMAGE'] ?? ''),
            'COMPATIBLE_MODE' => ($arParams['COMPATIBLE_MODE'] ?? ''),
            'DISABLE_INIT_JS_IN_COMPONENT' => ($arParams['DISABLE_INIT_JS_IN_COMPONENT'] ?? ''),
            'SET_VIEWED_IN_COMPONENT' => ($arParams['DETAIL_SET_VIEWED_IN_COMPONENT'] ?? ''),
            'SHOW_SLIDER' => ($arParams['DETAIL_SHOW_SLIDER'] ?? ''),
            'SLIDER_INTERVAL' => ($arParams['DETAIL_SLIDER_INTERVAL'] ?? ''),
            'SLIDER_PROGRESS' => ($arParams['DETAIL_SLIDER_PROGRESS'] ?? ''),
            'USE_ENHANCED_ECOMMERCE' => ($arParams['USE_ENHANCED_ECOMMERCE'] ?? ''),
            'DATA_LAYER_NAME' => ($arParams['DATA_LAYER_NAME'] ?? ''),
            'BRAND_PROPERTY' => ($arParams['BRAND_PROPERTY'] ?? ''),

            'USE_GIFTS_DETAIL' => $arParams['USE_GIFTS_DETAIL'] ?: 'Y',
            'USE_GIFTS_MAIN_PR_SECTION_LIST' => $arParams['USE_GIFTS_MAIN_PR_SECTION_LIST'] ?: 'Y',
            'GIFTS_SHOW_DISCOUNT_PERCENT' => $arParams['GIFTS_SHOW_DISCOUNT_PERCENT'],
            'GIFTS_SHOW_OLD_PRICE' => $arParams['GIFTS_SHOW_OLD_PRICE'],
            'GIFTS_DETAIL_PAGE_ELEMENT_COUNT' => $arParams['GIFTS_DETAIL_PAGE_ELEMENT_COUNT'],
            'GIFTS_DETAIL_HIDE_BLOCK_TITLE' => $arParams['GIFTS_DETAIL_HIDE_BLOCK_TITLE'],
            'GIFTS_DETAIL_TEXT_LABEL_GIFT' => $arParams['GIFTS_DETAIL_TEXT_LABEL_GIFT'],
            'GIFTS_DETAIL_BLOCK_TITLE' => $arParams['GIFTS_DETAIL_BLOCK_TITLE'],
            'GIFTS_SHOW_NAME' => $arParams['GIFTS_SHOW_NAME'],
            'GIFTS_SHOW_IMAGE' => $arParams['GIFTS_SHOW_IMAGE'],
            'GIFTS_MESS_BTN_BUY' => $arParams['~GIFTS_MESS_BTN_BUY'],
            'GIFTS_PRODUCT_BLOCKS_ORDER' => $arParams['LIST_PRODUCT_BLOCKS_ORDER'],
            'GIFTS_SHOW_SLIDER' => $arParams['LIST_SHOW_SLIDER'],
            'GIFTS_SLIDER_INTERVAL' => $arParams['LIST_SLIDER_INTERVAL'] ?? '',
            'GIFTS_SLIDER_PROGRESS' => $arParams['LIST_SLIDER_PROGRESS'] ?? '',

            'GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT' => $arParams['GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT'],
            'GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE' => $arParams['GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE'],
            'GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE' => $arParams['GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE'],
            'BENEFITS' => $elementBenefits ?? null,
            'YOUTUBE' => $elementYouTube ?? null,
        ],
        $component
    );
    $GLOBALS['CATALOG_CURRENT_ELEMENT_ID'] = $elementId;
    ?>
</div>

<?php $this->SetViewTarget('after_parent_sect'); ?>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/whatsapp.php", [], ["SHOW_BORDER" => true]); ?>

<?php
/**
 * Зададим фильтр по ID раздела И св-ву "Принадлежность".
 *
 * OWN - Принадлежность
 * FORM_MONUMENTS - Форма
 * ORIENTATION - Ориентация
 *
 */
$elementProps = Catalog::getElement($elementId);
global $arrFilterSimilar;
$arrFilterSimilar = [
    '!ID' => $elementId,
    'SECTION_ID' => $section['ID'],
    'PROPERTY_OWN_VALUE' => $elementProps['PROPERTIES']['OWN'][0]['VALUE_ENUM'],
    /*[
        'LOGIC' => 'OR',
        ['DATE_ACTIVE_TO' => false],
        ['>DATE_ACTIVE_TO' => ConvertTimeStamp(time(), 'FULL')],

    ],*/
];
$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "product_list",
    [
        "COMPONENT_TEMPLATE" => "product",
        "IBLOCK_TYPE" => "catalog",
        "IBLOCK_ID" => "12",
        "NEWS_COUNT" => "10",
        "SORT_BY1" => "",
        "SORT_ORDER1" => "ASC",
        "SORT_BY2" => "SORT",
        "SORT_ORDER2" => "ASC",
        "FILTER_NAME" => "arrFilterSimilar",
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
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "INCLUDE_SUBSECTIONS" => "Y",
        "STRICT_SECTION_CHECK" => "N",
        "PAGER_TEMPLATE" => "pager",
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
        "TITLE" => "Похожие товары",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "MESSAGE_404" => "",
    ],
    false
);
unset($arrFilterSimilar, $elementProps);
?>

<?php if (!empty($sectionProps['UF_STOCK_SLIDER'])): ?>
    <?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/components/stock_slider.php", ['STOCK_SLIDER' => $sectionProps['UF_STOCK_SLIDER']], ['SHOW_BORDER' => true]); ?>
<?php endif ?>

<?php
	if(!empty($elementAlsoIDs)){
global $arrFilterAlso;
$arrFilterAlso = [
    'ID' => $elementAlsoIDs,
];
$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "product_list",
    [
        "COMPONENT_TEMPLATE" => "product",
        "IBLOCK_TYPE" => "catalog",
        "IBLOCK_ID" => "12",
        "NEWS_COUNT" => "10",
        "SORT_BY1" => "",
        "SORT_ORDER1" => "ASC",
        "SORT_BY2" => "SORT",
        "SORT_ORDER2" => "ASC",
        "FILTER_NAME" => "arrFilterAlso",
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
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "INCLUDE_SUBSECTIONS" => "Y",
        "STRICT_SECTION_CHECK" => "N",
        "PAGER_TEMPLATE" => "pager",
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
        "TITLE" => "С этим товаром также заказывают",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "MESSAGE_404" => "",
    ],
    false
);
unset($arrFilterAlso);
}
?>

<?php
if ($elementServices) {
    global $arrFilterServices;
    $arrFilterServices = [
        'ID' => $elementServices,
    ];
    $APPLICATION->IncludeComponent(
        "bitrix:news.list",
        "services_slider",
        [
            "COMPONENT_TEMPLATE" => "services_slider",
            "IBLOCK_TYPE" => "content",
            "IBLOCK_ID" => "15",
            "NEWS_COUNT" => "10",
            "SORT_BY1" => "",
            "SORT_ORDER1" => "ASC",
            "SORT_BY2" => "SORT",
            "SORT_ORDER2" => "ASC",
            "FILTER_NAME" => "arrFilterServices",
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
                1 => "PRICE_LIST",
                2 => "PHOTO",
                3 => "SEO",
                4 => "PRODUCTS",
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
            "PAGER_TEMPLATE" => "pager",
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
            "TITLE" => "Сопутствующие услуги",
            "DISPLAY_DATE" => "Y",
            "DISPLAY_NAME" => "Y",
            "DISPLAY_PICTURE" => "Y",
            "DISPLAY_PREVIEW_TEXT" => "Y",
            "MESSAGE_404" => "",
        ],
        false
    );
    unset($arrFilterServices);
}
?>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/installment_banner.php", [], ["SHOW_BORDER" => true]); ?>

<?php
$arSelect = Array("ID", "NAME", "PROPERTY_SEO_TEXT");
$arFilter = Array("IBLOCK_ID"=>$arParam["IBLOCK_ID"],"ID" => $elementId, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
if($ob = $res->GetNextElement())
{
	$arFields = $ob->GetFields();
}

?>
<section class="article">
    <div class="content">
        <article>
		<?echo htmlspecialcharsback($arFields["PROPERTY_SEO_TEXT_VALUE"]["TEXT"])?>
       </article>
    </div>
</section>
<?

$galleryElementIDs = '';
try {
    $sectionGalleryCode = Catalog::getSectionByName(4, $sectionName);
    if ($sectionGalleryCode) {
        $galleryElementIDs = Catalog::getElementIDsBySectionID(4, (string)$sectionGalleryCode);
    }
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}
global $arrFilterGallery;
$arrFilterGallery = [
    'ID' => $galleryElementIDs,
];
$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "gallery_list",
    [
        "COMPONENT_TEMPLATE" => "gallery_list",
        "IBLOCK_TYPE" => "info",
        "IBLOCK_ID" => "4",
        "NEWS_COUNT" => "50",
        "SORT_BY1" => "SORT",
        "SORT_ORDER1" => "ASC",
        "SORT_BY2" => "SORT",
        "SORT_ORDER2" => "ASC",
        "FILTER_NAME" => "arrFilterGallery",
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
        "TITLE" => "Акции",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "MESSAGE_404" => "",
        "DATA_COUNT" => "4",
        "CLASS" => " section_padding section_black-haze",
    ],
    false
);
unset($arrFilterGallery);
?>

<?php
$reviewsElementIDs = '';
try {
    $sectionReviewsCode = Catalog::getSectionByName(13, $sectionName);
    if ($sectionReviewsCode) {
        $reviewsElementIDs = Catalog::getElementIDsBySectionID(13, (string)$sectionReviewsCode);
    }
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}

global $arrFilterReviews;
$arrFilterReviews = [
    'ID' => $reviewsElementIDs,
];
$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "reviews_list",
    [
        "COMPONENT_TEMPLATE" => "reviews_list",
        "IBLOCK_TYPE" => "content",
        "IBLOCK_ID" => "13",
        "NEWS_COUNT" => "10",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "SORT_BY2" => "SORT",
        "SORT_ORDER2" => "ASC",
        "FILTER_NAME" => "arrFilterReviews",
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
            0 => "NAME",
            1 => "PHONE",
            2 => "EMAIL",
            3 => "PLACEMENT",
            4 => "",
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
        "TITLE" => "Акции",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "MESSAGE_404" => "",
    ],
    false
);
unset($arrFilterReviews);
?>

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
        "CLASS" => "white",
    ],
    false
);
?>

<?php
global $arrFilterFaq;
$arrFilterFaq = [
    'SECTION_ID' => '7',
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
        "TITLE" => "Вопрос–ответ",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "MESSAGE_404" => "",
    ],
    false
);
unset($arrFilterFaq);
?>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/feedback_form.php", [], ["SHOW_BORDER" => true]); ?>

<?php $this->EndViewTarget() ?>
