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
<section class="section_padding bg_black-haze questions">
    <div class="content">
        <div class="heading heading_more">
            <div class="heading__content">
                <h2><?= $arParams['TITLE'] ?></h2>
            </div>
            <div class="more">
                <a class="more__link" href="<?= current($arResult['ITEMS'])['LIST_PAGE_URL'] ?>"<?php //TODO: фильтр по разделу из перехода ?>>
                    <span>Подробнее</span>
                    <svg class="icon__arrow-right" width="24" height="24">
                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                    </svg>
                </a>
            </div>
        </div>
        <div class="accordion-wrap">
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
        <div class="questions-info">
            <a class="btn btn-red big" href="#" data-toggle="modal" data-target="#modalQuestion">
                <span class="btn__text">
                    <span data-text="Задать вопрос">Задать вопрос</span>
                </span>
            </a>
            <div class="questions-info__content">
                <h5>Не нашли ответ?</h5>
                <p>Напишите нам, мы всегда на связи</p>
            </div>
        </div>
    </div>
</section>