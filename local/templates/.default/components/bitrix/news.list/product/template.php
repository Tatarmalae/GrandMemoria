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

use Dev\Utilities;

?>
<?php $this->SetViewTarget('catalog__count'); ?>
<?= Utilities::getWord(count($arResult["ITEMS"]), [
    'товар',
    'товара',
    'товаров',
]) ?>
<?php $this->EndViewTarget() ?>
<div class="catalog-items items" data-type="column" data-view="border">
    <?php foreach ($arResult["ITEMS"] as $arItem): ?>
        <?php
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), ["CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]);
        $thumb = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'], [
            'width' => 270,
            'height' => 270,
        ], BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true, []);
        ?>
        <div class="catalog-item item link-item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <a class="catalog-item__img img" href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
                <div class="img__inner object-fit">
                    <img class="lazy" data-src="<?= $thumb['src'] ?>" alt="<?= $arItem['NAME'] ?>" src="">
                </div>
                <div class="catalog-item__labels label-wrap">
                    <?php if ($arItem['PROPERTIES']['NEW']['VALUE']): ?>
                        <span class="label label_small label_bg label_fiery-rose">
                            Новинки
                        </span>
                    <?php endif ?>
                    <?php if (!empty($arItem['PROPERTIES']['OLD_PRICE']['VALUE'])): ?>
                        <span class="label label_small label_bg label_fiery-rose">
                            -<?= ceil((($arItem['PROPERTIES']['OLD_PRICE']['VALUE'] - $arItem['PROPERTIES']['PRICE']['VALUE']) * 100) / $arItem['PROPERTIES']['OLD_PRICE']['VALUE']); ?>%
                        </span>
                    <?php endif ?>
                </div>
            </a>
            <div class="catalog-item__content">
                <span class="label label_small label_fiery-rose">
                    В наличии
                </span>
                <h4>
                    <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
                        <?= $arItem['NAME'] ?>
                    </a>
                </h4>
                <div class="price price_small">
                    <span class="price-now">от <?= number_format($arItem['PROPERTIES']['PRICE']['VALUE'], 0, ' ', ' ') ?> ₽</span>
                    <?php if (!empty($arItem['PROPERTIES']['OLD_PRICE']['VALUE'])): ?>
                        <s class="price-old">от <?= number_format($arItem['PROPERTIES']['OLD_PRICE']['VALUE'], 0, ' ', ' ') ?> ₽</s>
                    <?php endif ?>
                </div>
                <div class="more-btn">
                    <button class="btn btn-blue small" type="button" data-toggle="modal" data-target="#modalBasket" data-id="<?= $arItem['ID'] ?>">
                        <span class="btn__text">
                            <span data-text="В корзину">В корзину</span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <?= $arResult["NAV_STRING"] ?>
<?php endif; ?>
