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
    <div class="tags-slider__wrapper ajax__tabs" data-iblock="<?= $arParams['IBLOCK_ID'] ?>">
        <div class="tags-wrap swiper-container tags-slider">
            <div class="tags swiper-wrapper">
                <a class="tags-item swiper-slide tags-item_active" data-id="false" href="javascript:void(0);">
                    <span>Все</span>
                </a>
                <?php foreach ($arResult['TAGS'] as $tag): ?>
                    <a class="tags-item swiper-slide" data-id="<?= $tag['ID'] ?>" href="javascript:void(0);">
                        <span><?= $tag['NAME'] ?></span>
                    </a>
                <?php endforeach ?>
            </div>
        </div>
        <div class="slider-arrows slider-arrows_prev">
            <div class="slider-btn slider-btn_prev slider-btn_light">
                <svg class="icon__slider-prev" width="32" height="32">
                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-prev"></use>
                </svg>
            </div>
        </div>
        <div class="slider-arrows slider-arrows_next">
            <div class="slider-btn slider-btn_next slider-btn_light">
                <svg class="icon__slider-next" width="32" height="32">
                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-next"></use>
                </svg>
            </div>
        </div>
    </div>
<?php endif ?>
<div class="reviews-items items ajax__items">
    <?php foreach ($arResult["ITEMS"] as $key => $arItem): ?>
        <?php
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), ["CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]);
        ?>
        <div class="reviews-item item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <div class="box">
                <div class="reviews-item__top">
                    <div class="reviews-item__top-info">
                        <span class="h4">
                            <a class="modal-ajax" href="#" data-toggle="modal" data-target="#modalReviewsItem" data-key="<?= $key ?>">
                                <?= $arItem['PROPERTIES']['NAME']['VALUE'] ?>
                            </a>
                        </span>
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
                    <p class="dotdotdot-text">
                        <?= $arItem['PREVIEW_TEXT'] ?>
                    </p>
                </div>
                <div class="reviews-item__bottom">
                    <div class="more">
                        <a class="more__link link-static modal-ajax" href="#" data-toggle="modal" data-target="#modalReviewsItem" data-key="<?= $key ?>">
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
        <div style="display:none; opacity; 0">
            <div class="modal-dialog_<?= $key ?>" role="document">
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
                                                    <span class="h4"><?= $arItem['PROPERTIES']['NAME']['VALUE'] ?></span>
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
</div>
<?php if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <?= $arResult["NAV_STRING"] ?>
<?php endif; ?>
<?php $this->SetViewTarget('after_parent_sect'); ?>
<div class="banner">
    <div class="content">
        <div class="banner-box bg_pippin">
            <div class="banner-bg">
                <img src="" class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/banner/3.svg" alt="bg">
            </div>
            <div class="banner-inner">
                <div class="banner-content">
                    <h3>Уделите минуту и мы станем лучше для Вас</h3>
                    <p>Поделитесь отзывам о нашей работе</p>
                    <div class="more-btn">
                        <a class="btn btn-red big" href="#" data-toggle="modal" data-target="#modalReviews">
                        <span class="btn__text">
                            <span data-text="Оставить отзыв">Оставить отзыв</span>
                        </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/rating.php", ["TITLE" => "Рейтинг отзывов на площадка"], ["SHOW_BORDER" => true]); ?>
<?php $this->EndViewTarget(); ?>
