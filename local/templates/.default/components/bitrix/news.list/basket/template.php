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

use Dev\Basket;

$sum = 0;
$installment = true;
?>
<?php if (count($arResult['ITEMS']) > 0): ?>
    <div class="basket-wrap items">
        <div class="basket-column item">
            <div class="basket-cards">
                <?php foreach ($arResult['ITEMS'] as $item): ?>
                    <?php
                    $sum += $item['PROPERTIES']['PRICE']['VALUE'] * Basket::getBasket()[$item['ID']];
                    if ($item['IBLOCK_SECTION_PARENT_ID'] != 15) {
                        $installment = false;
                    }
                    ?>
                    <div class="basket-card box">
                        <div class="basket-card__wrap">
                            <div class="basket-card__left">
                                <a class="basket-card__img img" href="<?= $item['DETAIL_PAGE_URL'] ?>">
                                    <div class="img__inner object-fit">
                                        <img class="lazy" data-src="<?= $item['PREVIEW_PICTURE']['SRC'] ?>" alt="<?= $item['NAME'] ?>">
                                    </div>
                                    <div class="basket-card__labels label-wrap">
                                        <?php if ($item['PROPERTIES']['NEW']['VALUE']): ?>
                                            <span class="label label_small label_bg label_fiery-rose">
                                                Новинки
                                            </span>
                                        <?php endif ?>
                                        <?php if (!empty($item['PROPERTIES']['OLD_PRICE']['VALUE'])): ?>
                                            <span class="label label_small label_bg label_fiery-rose">
                                                -<?= ceil((($item['PROPERTIES']['OLD_PRICE']['VALUE'] - $item['PROPERTIES']['PRICE']['VALUE']) * 100) / $item['PROPERTIES']['OLD_PRICE']['VALUE']); ?>%
                                            </span>
                                        <?php endif ?>
                                    </div>
                                </a>
                            </div>
                            <div class="basket-card__right">
                                <div class="basket-card__column">
                                    <h5>
                                        <a href="<?= $item['DETAIL_PAGE_URL'] ?>"><?= $item['NAME'] ?></a>
                                    </h5>
                                </div>
                                <div class="basket-card__column">
                                    <span class="basket-label">Кол–во:</span>
                                    <div class="count" data-id="<?= $item['ID'] ?>">
                                        <input type="hidden">
                                        <span class="count__nav el-minus">-</span>
                                        <input class="count__control" value="<?= Basket::getBasket()[$item['ID']] ?>">
                                        <span class="count__nav el-plus">+</span>
                                    </div>
                                </div>
                                <div class="basket-card__column">
                                    <span class="basket-label">Цена:</span>
                                    <div class="price price_small price_column">
                                        <?php if (!empty($item['PROPERTIES']['OLD_PRICE']['VALUE'])): ?>
                                            <s class="price-old">от <?= number_format($item['PROPERTIES']['OLD_PRICE']['VALUE'], 0, ' ', ' ') ?> ₽</s>
                                        <?php endif ?>
                                        <span class="price-now">от <?= number_format($item['PROPERTIES']['PRICE']['VALUE'], 0, ' ', ' ') ?> ₽</span>
                                    </div>
                                </div>
                                <div class="basket-card__column">
                                    <span class="basket-card__delete" data-id="<?= $item['ID'] ?>">
                                        <svg class="icon__delete" width="32" height="32">
                                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#delete"></use>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="basket-column item">
            <div class="basket-info">
                <div class="basket-info__items">
                    <div class="basket-info__item">
                        <span class="basket-label">Кол–во товаров:</span>
                        <div class="price price_small">
                            <span class="price-base counter"><?= count($arResult['ITEMS']) ?> шт.</span>
                        </div>
                    </div>
                    <div class="basket-info__item">
                        <span class="basket-label">Товаров на сумму:</span>
                        <div class="price price_small">
                            <span class="price-base sum">от <?= number_format($sum, 0, ' ', ' ') ?> ₽</span>
                        </div>
                    </div>
                </div>
                <?php if ($installment): ?>
                    <div class="checkbox-wrap">
                        <div class="checkbox">
                            <input type="checkbox" name="installment" id="basketCheck">
                            <label for="basketCheck">
                                <span class="checkbox__box"></span>
                                <div class="checkbox-content">
                                    <h5>Оформить рассрочку</h5>
                                    <span>Ваши товары доступны в рассрочку</span>
                                </div>
                            </label>
                        </div>
                    </div>
                <?php endif ?>
                <div class="more-btn">
                    <a class="btn btn-blue big btn-block" href="#" data-toggle="modal" data-target="#modalCheckout">
                        <span class="btn__text">
                            <span data-text="Оформить заказ">Оформить заказ</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="basket-empty" style="display: none">
        <div class="basket-empty__inner">
            <div class="basket-empty__icon">
                <img src="<?= SITE_STYLE_PATH ?>/img/content/basket/shopping.svg" alt="basket">
            </div>
            <h2>В корзине пока ничего нет</h2>
            <p>Вы можете начать свой выбор с главной страницы, посмотреть акции или воспользоваться поиском, если ищете что-то конкретное</p>
            <div class="more-btn">
                <a class="btn btn-blue big" href="/catalog/">
                    <span class="btn__text">
                        <span data-text="Каталог товаров">Каталог товаров</span>
                    </span>
                </a>
                <a class="btn btn-blue-light big" href="/stock/">
                    <span class="btn__text">
                        <span data-text="Акции и скидки">Акции и скидки</span>
                    </span>
                </a>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="basket-empty">
        <div class="basket-empty__inner">
            <div class="basket-empty__icon">
                <img src="<?= SITE_STYLE_PATH ?>/img/content/basket/shopping.svg" alt="basket">
            </div>
            <h2>В корзине пока ничего нет</h2>
            <p>Вы можете начать свой выбор с главной страницы, посмотреть акции или воспользоваться поиском, если ищете что-то конкретное</p>
            <div class="more-btn">
                <a class="btn btn-blue big" href="/catalog/">
                    <span class="btn__text">
                        <span data-text="Каталог товаров">Каталог товаров</span>
                    </span>
                </a>
                <a class="btn btn-blue-light big" href="/stock/">
                    <span class="btn__text">
                        <span data-text="Акции и скидки">Акции и скидки</span>
                    </span>
                </a>
            </div>
        </div>
    </div>
<?php endif ?>