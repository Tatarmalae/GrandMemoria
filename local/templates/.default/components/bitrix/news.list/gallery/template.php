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
                <?//php \Dev\Utilities::DB($tag['PROPS']); ?>
                <a class="tags-item" data-section="<?= $tag['ID'] ?>" href="javascript:void(0);">
                    <span><?= $tag['NAME'] ?></span>
                </a>
            <?php endforeach ?>
        </div>
    </div>
<?php endif ?>
<div class="more-link box">
    <div class="box__inner">
        <div class="more-link__inner">
            <h3>Перейти в каталог</h3>
            <div class="more">
                <a class="more__link" href="<?php //TODO: для каждого раздела ссылка задаётся вручную ?>">
                    <span>Памятники</span>
                    <svg class="icon__arrow-right" width="24" height="24">
                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="gallery-items gallery-items_size-4 items">
    <?php foreach ($arResult["ITEMS"] as $key => $arItem): ?>
        <?php
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), ["CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]);
        ?>
        <a id="<?= $this->GetEditAreaId($arItem['ID']); ?>" class="gallery-item item" href="#" data-toggle="modal" data-target="#modalGallery_<?= $key ?>">
            <div class="gallery-item__img img img-1by1">
                <div class="img__inner object-fit">
                    <img class="lazy" src="" data-src="<?= CFile::GetPath($arItem['PREVIEW_PICTURE']['ID']) ?>" alt="<?= $arItem['NAME'] ?>">
                </div>
            </div>
        </a>
        <div class="modal fade" id="modalGallery_<?= $key ?>" tabindex="-1" role="dialog" aria-labelledby="modalGalleryLabel">
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
                                <div class="modal-gallery">
                                    <div class="modal-gallery__img">
                                        <div class="gallery-item">
                                            <div class="gallery-item__img img img-1by1">
                                                <div class="img__inner object-fit">
                                                    <img class="lazy" src="" data-src="<?= CFile::GetPath($arItem['PREVIEW_PICTURE']['ID']) ?>" alt="<?= $arItem['NAME'] ?>"/>
                                                </div>
                                            </div>
                                            <div class="gallery-item__content">
                                                <h4><?= $arItem['NAME'] ?></h4>
                                                <?php if (!empty($arItem['PROPERTIES']['PRODUCT']['VALUE'])): ?>
                                                    <div class="more-btn">
                                                        <a class="btn btn-blue big" href="<?= $arItem['PROPERTIES']['PRODUCT']['VALUE']  ?>">
                                                            <span class="btn__text">
                                                                <span data-text="Перейти к товару">Перейти к товару</span>
                                                            </span>
                                                        </a>
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
        </div>
    <?php endforeach ?>
</div>
<?php if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <?= $arResult["NAV_STRING"] ?>
<?php endif; ?>
