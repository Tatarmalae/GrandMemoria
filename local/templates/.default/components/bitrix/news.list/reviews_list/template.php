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
<section class="reviews">
    <div class="content">
        <div class="heading">
            <div class="heading__content">
                <h2>Отзывы</h2>
            </div>
        </div>
        <div class="reviews-items items" data-type="slider">
            <div class="swiper-container base-slider" data-count="2">
                <div class="slider-wrap swiper-wrapper">
                    <?php foreach ($arResult["ITEMS"] as $key => $arItem): ?>
                        <?php
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), ["CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]);
                        ?>
                        <div id="<?= $this->GetEditAreaId($arItem['ID']); ?>" class="slider-slide swiper-slide">
                            <div class="reviews-item item">
                                <div class="box">
                                    <div class="reviews-item__top">
                                        <div class="reviews-item__top-info">
                                            <h4>
                                                <a href="#" data-toggle="modal" data-target="#modalReviewsItem_<?= $key ?>">
                                                    <?= $arItem['PROPERTIES']['NAME']['VALUE'] ?>
                                                </a>
                                            </h4>
                                            <?php if (!empty($arItem['DATE_ACTIVE_FROM'])): ?>
                                                <time datetime="<?= $arItem['DATE_ACTIVE_FROM'] ?>">
                                                    <?= $arItem['DATE_ACTIVE_FROM'] ?>
                                                </time>
                                            <?php endif ?>
                                            <?php if (!empty($arItem['PROPERTIES']['FILE']['VALUE'])): ?>
                                                <span class="reviews-photo">
                                                     <svg class="icon__photo" width="24" height="24">
                                                         <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#photo"></use>
                                                     </svg>
                                                    1
                                                </span>
                                            <?php endif ?>
                                        </div>
                                        <?php if (!empty($arItem['IBLOCK_SECTION']['NAME'])): ?>
                                            <span class="label label_small label_marengo">
                                                <?= $arItem['IBLOCK_SECTION']['NAME'] ?>
                                            </span>
                                        <?php endif ?>
                                    </div>
                                    <div class="reviews-item__content">
                                        <p>
                                            <?= $arItem['PREVIEW_TEXT'] ?>
                                        </p>
                                    </div>
                                    <div class="reviews-item__bottom">
                                        <div class="more">
                                            <a class="more__link link-static" href="#" data-toggle="modal" data-target="#modalReviewsItem_<?= $key ?>">
                                                <span>Читать целиком</span>
                                                <svg class="icon__arrow-right" width="24" height="24">
                                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                                                </svg>
                                            </a>
                                        </div>
                                        <?php if (!empty($arItem['PROPERTIES']['PLACEMENT']['VALUE'])): ?>
                                            <div class="logo-link">
                                                <div class="logo">
                                                    <img src="<?= CFile::GetPath($arItem['PROPERTIES']['PLACEMENT']['VALUE']['UF_FILE']) ?>" alt="<?= CFile::GetPath($arItem['PROPERTIES']['PLACEMENT']['VALUE']['UF_NAME']) ?>">
                                                </div>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="slider-arrows slider-arrows_prev">
                    <div class="slider-btn slider-btn_prev">
                        <svg class="icon__slider-prev" width="32" height="32">
                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-prev"></use>
                        </svg>
                    </div>
                </div>
                <div class="slider-arrows slider-arrows_next">
                    <div class="slider-btn slider-btn_next">
                        <svg class="icon__slider-next" width="32" height="32">
                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-next"></use>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php foreach ($arResult["ITEMS"] as $key => $arItem): ?>
    <div class="modal fade" id="modalReviewsItem_<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="modalReviewsItemLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <button class="modal-close" type="button" data-dismiss="modal" aria-label="Close">
                    <svg class="icon__close-modal" width="48" height="48">
                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#close-modal"></use>
                    </svg>
                </button>
                <div class="modal-body">
                    <a class="logo-link" href="<?= SITE_DIR ?>">
                        <div class="logo">
                            <img src="<?= SITE_STYLE_PATH ?>/img/general/logo.svg" alt="<?= SITE_SERVER_NAME ?>"/>
                        </div>
                    </a>
                    <div class="modal-scroll">
                        <div class="modal-scroll__inner">
                            <div class="modal-review">
                                <div class="modal-reviews__item">
                                    <div class="reviews-item reviews-item_interior">
                                        <?php if (!empty($arItem['PROPERTIES']['FILE']['VALUE'])): ?>
                                            <div class="reviews-item__img img img-1by1">
                                                <div class="img__inner object-fit">
                                                    <img src="" class="lazy" data-src="<?= CFile::GetPath($arItem['PROPERTIES']['FILE']['VALUE']) ?>" alt="<?= $arItem['NAME'] ?>"/>
                                                </div>
                                            </div>
                                        <?php endif ?>
                                        <div class="reviews-item__top">
                                            <div class="reviews-item__top-info">
                                                <h4><?= $arItem['PROPERTIES']['NAME']['VALUE'] ?></h4>
                                                <?php if (!empty($arItem['DATE_ACTIVE_FROM'])): ?>
                                                    <time datetime="<?= $arItem['DATE_ACTIVE_FROM'] ?>">
                                                        <?= $arItem['DATE_ACTIVE_FROM'] ?>
                                                    </time>
                                                <?php endif ?>
                                                <?php if (!empty($arItem['PROPERTIES']['FILE']['VALUE'])): ?>
                                                    <span class="reviews-photo">
                                                         <svg class="icon__photo" width="24" height="24">
                                                             <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#photo"></use>
                                                         </svg>
                                                        1
                                                    </span>
                                                <?php endif ?>
                                            </div>
                                            <?php if (!empty($arItem['IBLOCK_SECTION']['NAME'])): ?>
                                                <span class="label label_small label_marengo">
                                                    <?= $arItem['IBLOCK_SECTION']['NAME'] ?>
                                                </span>
                                            <?php endif ?>
                                        </div>
                                        <div class="reviews-item__content">
                                            <p>
                                                <?= $arItem['~PREVIEW_TEXT'] ?>
                                            </p>
                                        </div>
                                        <?php if (!empty($arItem['PROPERTIES']['PLACEMENT']['VALUE'])): ?>
                                            <div class="reviews-item__bottom">
                                                <span class="reviews-item__bottom-label"><?= $arItem['PROPERTIES']['PLACEMENT']['NAME'] ?>:</span>
                                                <div class="logo-link">
                                                    <div class="logo">
                                                        <img src="<?= CFile::GetPath($arItem['PROPERTIES']['PLACEMENT']['VALUE']['UF_FILE']) ?>" alt="<?= CFile::GetPath($arItem['PROPERTIES']['PLACEMENT']['VALUE']['UF_NAME']) ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
