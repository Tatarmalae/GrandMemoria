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

//Получаем кол-во товаров/2 для вставки слайдера с акциями посередине списка
$place = (int)round(count($arResult["ITEMS"]) / 2);
foreach ($arResult["ITEMS"] as $arItem) {
    if ($place % 4 !== 0) {//Если не кратно 4, пропускаем пока не будет кратно. Необходимо, т.к. сетка по 4 товара.
        $place++;
    }
}
//Если товаров меньше или равно 4, то слайдер акций выводим после товаров
if (count($arResult["ITEMS"]) <= 4) {
    $place = count($arResult["ITEMS"]);
}
?>
<?php if (count($arResult["ITEMS"]) === 0): ?>
    <div class="catalog-items items">
        <br><br>
        <h2>По заданным параметрам, ничего не найдено</h2>
    </div>
<?php else: ?>
    <div class="catalog-items items ajax__items" data-type="column" data-view="border" data-wow="not">
        <?php foreach ($arResult["ITEMS"] as $key => $arItem): ?>
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
                        <img class="lazy" data-src="<?= $thumb['src'] ?>" alt="<?= $arItem['NAME'] ?>">
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
                    <span class="h4">
                        <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
                            <?= $arItem['NAME'] ?>
                        </a>
                    </span>
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
            <?php if (
                $key + 1 === $place
                && !empty($arParams['STOCK_SLIDER'])
            ): ?>
                <?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/components/stock_slider.php", ["STOCK_SLIDER" => $arParams['STOCK_SLIDER']], ["SHOW_BORDER" => true]); ?>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <?php if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
        <?= $arResult["NAV_STRING"] ?>
    <?php endif; ?>
<?php endif; ?>
