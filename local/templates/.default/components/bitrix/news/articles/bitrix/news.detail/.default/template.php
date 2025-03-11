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
$this->SetViewTarget('no_bg');
echo ' title_not-bg';
$this->EndViewTarget();
?>
<?php if (!empty($arResult['PREVIEW_PICTURE']['ID'])): ?>
    <?php $this->SetViewTarget('before_parent_sect') ?>
    <div class="article-bg">
        <div class="img">
            <div class="img__inner object-fit">
                <img src="" class="lazy" data-src="<?= CFile::GetPath($arResult['PREVIEW_PICTURE']['ID']) ?>"
                     alt="<?= $arResult['NAME'] ?>">
            </div>
        </div>
    </div>
<?php endif ?>
<?php $this->EndViewTarget() ?>
<article>
    <?= $arResult['DETAIL_TEXT'] ?>
</article>
<?php if (!empty($arResult['PROPERTIES']['STOCK_SLIDER']['VALUE'])): ?>
    <?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/components/stock_slider.php", ['STOCK_SLIDER' => $arResult['PROPERTIES']['STOCK_SLIDER']['VALUE'], 'SLIDER_CATALOG' => 'Y'], ['SHOW_BORDER' => true]); ?>
<?php endif ?>
<?php if (!empty($arResult['PROPERTIES']['DETAIL_SECOND']['VALUE']['TEXT'])): ?>
    <article>
        <?= $arResult['PROPERTIES']['DETAIL_SECOND']['~VALUE']['TEXT'] ?>
    </article>
<?php endif ?>
<?php /* if ($arParams["USE_SHARE"] == "Y"): ?>
    <div class="article-socials">
        <span class="h4">Поделиться в соц. сетях:</span>
        <noindex>
            <div class="socials socials_big">
                <?php
                $APPLICATION->IncludeComponent(
                    "bitrix:main.share",
                    $arParams["SHARE_TEMPLATE"],
                    [
                        "HANDLERS" => $arParams["SHARE_HANDLERS"],
                        "PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
                        "PAGE_TITLE" => $arResult["~NAME"],
                        "SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
                        "SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
                        "HIDE" => $arParams["SHARE_HIDE"],
                    ],
                    $component,
                    ["HIDE_ICONS" => "Y"]
                ); ?>
            </div>
        </noindex>
    </div>
<?php endif */?>