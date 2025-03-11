<?php

use Bitrix\Main\Application;
use Bitrix\Main\Diag\Debug;
use Dev\Catalog;
use Dev\Utilities;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var $arResult
 * @var $arParams
 * @var $APPLICATION
 */
$arResult['ELEMENTS'] = [];
if ($arParams['ELEMENT_LIST']) {
    try {
        $sort['BY'] = 'SORT';
        $arResult['ELEMENTS'] = Catalog::getElementList(12, '', [], null, ['=ID' => $arParams['ELEMENT_LIST']]);
    } catch (Throwable $e) {
        Debug::dumpToFile($e->getMessage());
    }
}
if (count($arResult['ELEMENTS']) == 0) return;
// Удалим дубликаты
$arResult['ELEMENTS'] = array_reduce($arResult['ELEMENTS'], function ($carry, $item) {
    $carry[$item['ID']] = $item;
    return $carry;
}, []);

// Отсортируем в порядке заполнения в элементе
$sort = array_flip($arParams['ELEMENT_LIST']);
uasort($arResult['ELEMENTS'], function ($a, $b) use ($sort) {
    return $sort[$a['ID']] - $sort[$b['ID']];
});

$request = Application::getInstance()->getContext()->getRequest();
if ($request->isAjaxRequest()) {
    if ($request->getPost('sort')['BY'] === 'PROPERTY_PRICE') {
        if ($request->getPost('sort')['ORDER'] === 'ASC') {
            uasort($arResult['ELEMENTS'], function ($a, $b) {
                return floatval($a['PROPERTIES']['PRICE']['VALUE']) <=> floatval($b['PROPERTIES']['PRICE']['VALUE']);
            });
        } else {
            uasort($arResult['ELEMENTS'], function ($a, $b) {
                return floatval($b['PROPERTIES']['PRICE']['VALUE']) <=> floatval($a['PROPERTIES']['PRICE']['VALUE']);
            });
        }
    }
    if ($request->getPost('props')['undefined'] === 'По умолчанию') {
        // Отсортируем в порядке заполнения в элементе
        $sort = array_flip($arParams['ELEMENT_LIST']);
        uasort($arResult['ELEMENTS'], function ($a, $b) use ($sort) {
            return $sort[$a['ID']] - $sort[$b['ID']];
        });
    } elseif ($request->getPost('props')['undefined'] === 'По популярности') {
        uasort($arResult['ELEMENTS'], function ($a, $b) {
            return floatval($b['SHOW_COUNTER']) <=> floatval($a['SHOW_COUNTER']);
        });
    }
}
?>
<div class="filter">
    <div class="filter-item filter-item_bottom">
        <div class="filter-row">
            <div class="filter-column">
                <div class="filter-count">
                    <?= Utilities::getWord(count($arResult["ELEMENTS"]), ['товар', 'товара', 'товаров']) ?>
                </div>
            </div>
            <div class="filter-column">
                <div class="dropdown">
                    <input type="hidden" value="По популярности">
                    <div class="dropdown-label" id="filterDrop6" data-toggle="dropdown" aria-expanded="false">
                        <svg class="icon__arrow-drop" width="32" height="32">
                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                        </svg>
                        <?php switch ($request->getPost('sort')['BY']) {
                            case 'PROPERTY_PRICE':
                                if ($request->getPost('sort')['ORDER'] === 'ASC') {
                                    $text = '(по возрастанию)';
                                } elseif ($request->getPost('sort')['ORDER'] === 'DESC') {
                                    $text = '(по убыванию)';
                                }
                                echo '<div class="dropdown-value" data-value="По цене ' . $text . '" data-sort="' . $request->getPost('sort')['BY'] . '" data-order="' . $request->getPost('sort')['ORDER'] . '">По цене ' . $text . '</div>';
                                break;
                            case 'SHOW_COUNTER':
                                echo '<div class="dropdown-value" data-value="По популярности" data-sort="SORT" data-order="ASC">По популярности</div>';
                                break;
                            default:
                                echo '<div class="dropdown-value" data-value="По умолчанию" data-sort="SORT" data-order="ASC">По умолчанию</div>';
                                break;
                        } ?>
                    </div>
                    <ul class="dropdown-menu ajax__sort" aria-labelledby="filterDrop6">
                        <?php if (!empty($request->getPost('sort'))): ?>
                            <li data-value="По умолчанию" data-sort="SORT"
                                data-order="ASC"<?= $request->getPost('sort')['BY'] === 'SORT' ? ' style="display:none"' : '' ?>>
                                По
                                умолчанию
                            </li>
                        <?php endif ?>
                        <li data-value="По популярности" data-sort="SHOW_COUNTER"
                            data-order="DESC"<?= $request->getPost('sort')['BY'] === 'SHOW_COUNTER' ? ' style="display:none"' : '' ?>>
                            По
                            популярности
                        </li>
                        <li data-value="По цене (по возрастанию)" data-sort="PROPERTY_PRICE"
                            data-order="ASC"<?= $request->getPost('sort')['BY'] === 'PROPERTY_PRICE' && $request->getPost('sort')['ORDER'] === 'ASC' ? ' style="display:none"' : '' ?>>
                            По цене (по возрастанию)
                        </li>
                        <li data-value="По цене (по убыванию)" data-sort="PROPERTY_PRICE"
                            data-order="DESC"<?= $request->getPost('sort')['BY'] === 'PROPERTY_PRICE' && $request->getPost('sort')['ORDER'] === 'DESC' ? ' style="display:none"' : '' ?>>
                            По цене (по убыванию)
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="catalog-items items ajax__items" data-type="column" data-view="border" data-wow="not">
    <?php foreach ($arResult["ELEMENTS"] as $arItem): ?>
        <?php
        $thumb = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE'], [
            'width' => 270,
            'height' => 270,
        ], BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true, []);
        ?>
        <div class="catalog-item item link-item">
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
                        <s class="price-old">от <?= number_format($arItem['PROPERTIES']['OLD_PRICE']['VALUE'], 0, ' ', ' ') ?>
                            ₽</s>
                    <?php endif ?>
                </div>
                <div class="more-btn">
                    <button class="btn btn-blue small" type="button" data-toggle="modal" data-target="#modalBasket"
                            data-id="<?= $arItem['ID'] ?>">
                            <span class="btn__text">
                                <span data-text="В корзину">В корзину</span>
                            </span>
                    </button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>