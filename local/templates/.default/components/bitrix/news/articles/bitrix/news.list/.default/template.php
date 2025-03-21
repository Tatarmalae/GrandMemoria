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
<?php if (!empty($arResult['TAGS'])): ?>
    <div class="tags-wrap ajax__tabs" data-iblock="<?= $arParams['IBLOCK_ID'] ?>">
        <div class="tags">
            <a class="tags-item tags-item_active" data-id="false" href="javascript:void(0);">
                <span>Все</span>
            </a>
            <?php foreach ($arResult['TAGS'] as $tag): ?>
                <a class="tags-item" data-id="<?= $tag['ID'] ?>" href="javascript:void(0);">
                    <span><?= $tag['NAME'] ?></span>
                </a>
            <?php endforeach ?>
        </div>
    </div>
<?php else: ?>
    <div class="ajax__tabs" data-iblock="<?= $arParams['IBLOCK_ID'] ?>"></div>
<?php endif ?>
<div class="articles-items items ajax__items">
    <?php foreach ($arResult["ITEMS"] as $key => $arItem): ?>
        <?php
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), ["CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]);
        $class = '';
        if ($key === 0) {
            $class .= ' articles-item_big';
            if (!empty($arItem['PREVIEW_PICTURE']['SRC'])) {
                $class .= ' white';
            }
        }
        ?>
        <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>"
           class="articles-item item link-item<?= $class ?>"
           id="<?= $this->GetEditAreaId($arItem['ID']); ?>"
           data-img="<?= empty($arItem['PREVIEW_PICTURE']['SRC']) ? 'not' : '' ?>"
        >
            <?php if ($key === 0): ?>
                <div class="articles-big">
                    <?php if (!empty($arItem['PREVIEW_PICTURE']['SRC'])): ?>
                        <div class="articles-item__img img">
                            <div class="img__inner object-fit">
                                <img src="" class="lazy" data-src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt="<?= $arItem['NAME'] ?>">
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="articles-bg">
                            <img src="" class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/articles/bg.svg" alt="bg">
                        </div>
                    <?php endif ?>
                    <div class="articles-item__content">
                        <?php if (!empty($arItem['IBLOCK_SECTION']['NAME'])): ?>
                            <span class="label label_small label_marengo">
                                <?= $arItem['IBLOCK_SECTION']['NAME'] ?>
                            </span>
                        <?php endif ?>
                        <h3><?= $arItem['NAME'] ?></h3>
                        <div class="more">
                            <span class="more__link link-static">
                                <span>Подробнее</span>
                                <svg class="icon__arrow-right" width="24" height="24">
                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <?php if (!empty($arItem['PREVIEW_PICTURE']['SRC'])): ?>
                    <div class="box">
                        <div class="articles-item__img img">
                            <div class="img__inner object-fit">
                                <img src="" class="lazy" data-src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>" alt="<?= $arItem['NAME'] ?>">
                            </div>
                        </div>
                        <div class="articles-item__content">
                            <?php if (!empty($arItem['IBLOCK_SECTION']['NAME'])): ?>
                                <span class="label label_small label_marengo">
                                    <?= $arItem['IBLOCK_SECTION']['NAME'] ?>
                                </span>
                            <?php endif ?>
                            <span class="h4"><?= $arItem['NAME'] ?></span>
                            <div class="more">
                                <span class="more__link link-static">
                                    <span>Подробнее</span>
                                    <svg class="icon__arrow-right" width="24" height="24">
                                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="articles-info">
                        <div class="articles-bg">
                            <img src="" class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/articles/bg.svg" alt="bg">
                        </div>
                        <div class="articles-item__content">
                            <?php if (!empty($arItem['IBLOCK_SECTION']['NAME'])): ?>
                                <span class="label label_small label_marengo">
                                    <?= $arItem['IBLOCK_SECTION']['NAME'] ?>
                                </span>
                            <?php endif ?>
                            <h3><?= $arItem['NAME'] ?></h3>
                            <div class="more">
                                <span class="more__link link-static">
                                    <span>Подробнее</span>
                                    <svg class="icon__arrow-right" width="24" height="24">
                                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
            <?php endif ?>
        </a>
    <?php endforeach; ?>
</div>
<?php if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <?= $arResult["NAV_STRING"] ?>
<?php endif; ?>
