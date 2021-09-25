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

use Bitrix\Main\Application;

$request = Application::getInstance()->getContext()->getRequest();
?>
<?php if (!empty($arResult['TAGS'])): ?>
    <div class="tags-wrap ajax__tabs" data-iblock="<?= $arParams['IBLOCK_ID'] ?>">
        <div class="tags">
            <a class="tags-item<?= empty($request->getQuery('PARENT_SECTION')) ? ' tags-item_active' : '' ?>" data-id="false" href="javascript:void(0);">
                <span>Все</span>
            </a>
            <?php foreach ($arResult['TAGS'] as $tag): ?>
                <a class="tags-item<?= $request->getQuery('PARENT_SECTION') == $tag['ID'] ? ' tags-item_active' : '' ?>" data-id="<?= $tag['ID'] ?>" href="javascript:void(0);">
                    <span><?= $tag['NAME'] ?></span>
                </a>
            <?php endforeach ?>
        </div>
    </div>
<?php endif ?>
<div class="accordion-wrap ajax__items">
    <?php foreach ($arResult["ITEMS"] as $arItem): ?>
        <?php
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), ["CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]);
        ?>
        <div class="accordion box" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <div class="box__inner">
                <div class="accordion-title">
                    <h4><?= $arItem['NAME'] ?></h4>
                    <?php if (!empty($arItem['IBLOCK_SECTION']['NAME'])): ?>
                        <span class="label label_small label_marengo">
                            <?= $arItem['IBLOCK_SECTION']['NAME'] ?>
                        </span>
                    <?php endif ?>
                    <span class="accordion-title__icon">
                        <svg class="icon__slider-next" width="24" height="24">
                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-next"></use>
                        </svg>
                        <svg class="icon__close-modal" width="24" height="24">
                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#close-modal"></use>
                        </svg>
                    </span>
                </div>
                <?php if (!empty($arItem['PREVIEW_TEXT']) || !empty($arItem['PROPERTIES']['LINKS']['VALUE'])): ?>
                    <div class="accordion-content">
                        <div class="accordion-article">
                            <?= $arItem['~PREVIEW_TEXT'] ?>
                            <?php if (!empty($arItem['PROPERTIES']['LINKS']['VALUE'])): ?>
                                <h5>Ссылки по теме:</h5>
                                <div class="article-links">
                                    <?php foreach ($arItem['PROPERTIES']['LINKS']['VALUE'] as $key => $link): ?>
                                        <div class="article-links__item">
                                            <a class="article-link" href="<?= $link ?>">
                                                <svg class="icon__link-next" width="24" height="24">
                                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#link-next"></use>
                                                </svg>
                                                <span><?= $arItem['PROPERTIES']['LINKS']['DESCRIPTION'][$key] ?></span>
                                            </a>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                <?php endif ?>
            </div>
        </div>
    <?php endforeach ?>
</div>
<?php if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <?= $arResult["NAV_STRING"] ?>
<?php endif; ?>
<div class="banner-box bg_pippin">
    <div class="banner-bg">
        <img class="lazy" src="" data-src="<?= SITE_STYLE_PATH ?>/img/content/banner/5.svg" alt="questions">
    </div>
    <div class="banner-inner">
        <div class="banner-content">
            <h3>Не нашли ответ</h3>
            <p>Напишите нам, мы с удовольствием вам поможем</p>
            <div class="more-btn">
                <a class="btn btn-red big" href="#" data-toggle="modal" data-target="#modalQuestion">
                    <span class="btn__text">
                        <span data-text="Задать вопрос">Задать вопрос</span>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>