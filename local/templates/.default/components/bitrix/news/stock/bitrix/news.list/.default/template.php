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
<?php if (!empty($arResult['TAGS'])): //TODO: ajax-подгрузка. Проверить в пагинации ?>
    <div class="tags-wrap">
        <div class="tags">
            <a class="tags-item tags-item_active" data-section="" href="javascript:void(0);">
                <span>Все</span>
            </a>
            <?php foreach ($arResult['TAGS'] as $tag): ?>
                <a class="tags-item" data-section="<?= $tag['ID'] ?>" href="javascript:void(0);">
                    <span><?= $tag['NAME'] ?></span>
                </a>
            <?php endforeach ?>
        </div>
    </div>
<?php endif ?>
<div class="stock-items items">
    <?php foreach ($arResult["ITEMS"] as $key => $arItem): ?>
        <?php
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), ["CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]);
        ?>
        <?php if ($key === 0): ?>
            <a class="stock-item stock-item_big item" href="<?= $arItem['DETAIL_PAGE_URL'] ?>" id="<?= $this->GetEditAreaId($arItem['ID']) ?>">
                <?php if (!empty($arItem['PREVIEW_PICTURE']['ID'])): ?>
                    <div class="stock-item__img img">
                        <div class="img__inner object-fit">
                            <picture>
                                <source media="(max-width:1279px)" data-srcset="<?= CFile::GetPath($arItem['PREVIEW_PICTURE']['ID']) ?>" srcset="">
                                <img class="lazy" data-src="<?= CFile::GetPath($arItem['PREVIEW_PICTURE']['ID']) ?>" alt="<?= $arItem['NAME'] ?>" src="">
                            </picture>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="stock-bg">
                        <picture>
                            <source media="(max-width:1279px)" data-srcset="<?= SITE_STYLE_PATH ?>/img/content/articles/bg.svg" srcset="">
                            <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/articles/bg.svg" alt="bg" src="">
                        </picture>
                    </div>
                <?php endif ?>
            </a>
        <?php else: ?>
            <div class="stock-item item link-ite" id="<?= $this->GetEditAreaId($arItem['ID']) ?>">
                <div class="box">
                    <?php if (!empty($arItem['PREVIEW_PICTURE']['ID'])): ?>
                        <div class="stock-item__img img">
                            <div class="img__inner object-fit">
                                <picture>
                                    <source media="(max-width:1279px)" data-srcset="<?= CFile::GetPath($arItem['PREVIEW_PICTURE']['ID']) ?>" srcset="">
                                    <img class="lazy" data-src="<?= CFile::GetPath($arItem['PREVIEW_PICTURE']['ID']) ?>" alt="<?= $arItem['NAME'] ?>" src="">
                                </picture>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="stock-bg">
                            <picture>
                                <source media="(max-width:1279px)" data-srcset="<?= SITE_STYLE_PATH ?>/img/content/articles/bg.svg" srcset="">
                                <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/articles/bg.svg" alt="bg" src="">
                            </picture>
                        </div>
                    <?php endif ?>
                    <div class="stock-item__content">
                        <?php if (!empty($arItem['IBLOCK_SECTION']['NAME'])): ?>
                            <span class="label label_small label_marengo">
                                <?= $arItem['IBLOCK_SECTION']['NAME'] ?>
                            </span>
                        <?php endif ?>
                        <h4>
                            <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
                                <?= $arItem['NAME'] ?>
                            </a>
                        </h4>
                        <?php if (!empty($arItem['PREVIEW_TEXT'])): ?>
                            <?= $arItem['PREVIEW_TEXT'] ?>
                        <?php endif ?>
                        <div class="more-btn">
                            <a class="btn btn-blue big btn-block" href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
                                <span class="btn__text">
                                    <span data-text="Посмотреть">Посмотреть</span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
    <?php endforeach ?>
</div>
<?php if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <?= $arResult["NAV_STRING"] ?>
<?php endif; ?>
