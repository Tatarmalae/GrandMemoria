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

<?php if (!empty($arResult[0]['ELEMENTS'])): ?>
    <div class="installment-items items">
        <?php foreach ($arResult[0]['ELEMENTS'] as $element): ?>
            <div class="installment-item item">
                <?php if ($element['PROPERTIES']['VALUE']['VALUE'] !== ''): ?>
                    <span class="installment-item__count">
                        <big><?= $element['PROPERTIES']['VALUE']['VALUE'] ?></big> <?= $element['PROPERTIES']['VALUE']['DESCRIPTION'] ?>
                    </span>
                <?php endif ?>
                <span class="h4"><?= $element['NAME'] ?></span>
                <p><?= $element['DETAIL_TEXT'] ?></p>
            </div>
        <?php endforeach ?>
    </div>
<?php endif ?>

<?php $this->SetViewTarget('after_parent_sect'); ?>

<?php if (!empty($arResult[1]['ELEMENTS'])): ?>
    <section class="section_padding section_black-haze information">
        <div class="content">
            <div class="heading">
                <div class="heading__content">
                    <h2><?= $arResult[1]['NAME'] ?></h2>
                </div>
            </div>
            <div class="information-items items">
                <?php foreach ($arResult[1]['ELEMENTS'] as $element): ?>
                    <div class="information-item item">
                        <div class="box">
                            <?php if (!empty($element['PROPERTIES']['ICO']['VALUE'])): ?>
                                <div class="information-item__icon">
                                    <img src="<?= CFile::GetPath($element['PROPERTIES']['ICO']['VALUE']) ?>" alt="ico">
                                </div>
                            <?php endif ?>
                            <span class="h4"><?= $element['NAME'] ?></span>
                            <p><?= $element['PREVIEW_TEXT'] ?></p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
<?php endif ?>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/installment_banner.php", [], ["SHOW_BORDER" => true]); ?>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/calculator_installment.php", [], ["SHOW_BORDER" => true]); ?>
<?php
global $arrFilterHit;
$arrFilterHit = [
    'PROPERTY_HIT' => '1',
];
$APPLICATION->IncludeComponent(
    "bitrix:news.list",
    "hits_list",
    [
        "COMPONENT_TEMPLATE" => "product",
        "IBLOCK_TYPE" => "catalog",
        "IBLOCK_ID" => "12",
        "NEWS_COUNT" => "10",
        "SORT_BY1" => "",
        "SORT_ORDER1" => "ASC",
        "SORT_BY2" => "SORT",
        "SORT_ORDER2" => "ASC",
        "FILTER_NAME" => "arrFilterHit",
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
        "PARENT_SECTION" => "15",
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
        "TITLE" => "Хиты продаж памятников",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "MESSAGE_404" => "",
    ],
    false
);
unset($arrFilterHit);
?>
<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/address.php", ['TITLE' => 'Оформить из офиса', 'CLASS' => ' section_padding section_glitter'], ["SHOW_BORDER" => true]); ?>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/feedback_form.php", [], ["SHOW_BORDER" => true]); ?>

<?php $this->EndViewTarget(); ?>
