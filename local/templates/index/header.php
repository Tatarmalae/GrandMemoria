<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $APPLICATION
 */
?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID ?>">
<head>
    <?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/head.php", [], ["SHOW_BORDER" => false]); ?>
    <?php $APPLICATION->ShowHead(); ?>
</head>
<body>
<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/scripts_after_body.php", [], ["SHOW_BORDER" => false]); ?>
<div id="panel"><?php $APPLICATION->ShowPanel(); ?></div>
<div class="main-wrapper">
    <?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/header.php", [], ["SHOW_BORDER" => false]); ?>
    <div class="container">

        <?php $APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "slider",
            [
                "ACTIVE_DATE_FORMAT" => "",
                "ADD_SECTIONS_CHAIN" => "N",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "N",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "CACHE_TIME" => "36000000",
                "CACHE_TYPE" => "A",
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "DISPLAY_DATE" => "Y",
                "DISPLAY_NAME" => "Y",
                "DISPLAY_PICTURE" => "Y",
                "DISPLAY_PREVIEW_TEXT" => "Y",
                "DISPLAY_TOP_PAGER" => "N",
                "FIELD_CODE" => [
                    0 => "ID",
                    1 => "CODE",
                    2 => "XML_ID",
                    3 => "NAME",
                    4 => "TAGS",
                    5 => "SORT",
                    6 => "PREVIEW_TEXT",
                    7 => "PREVIEW_PICTURE",
                    8 => "DETAIL_TEXT",
                    9 => "DETAIL_PICTURE",
                    10 => "DATE_ACTIVE_FROM",
                    11 => "ACTIVE_FROM",
                    12 => "DATE_ACTIVE_TO",
                    13 => "ACTIVE_TO",
                    14 => "SHOW_COUNTER",
                    15 => "SHOW_COUNTER_START",
                    16 => "IBLOCK_TYPE_ID",
                    17 => "IBLOCK_ID",
                    18 => "IBLOCK_CODE",
                    19 => "IBLOCK_NAME",
                    20 => "IBLOCK_EXTERNAL_ID",
                    21 => "DATE_CREATE",
                    22 => "CREATED_BY",
                    23 => "CREATED_USER_NAME",
                    24 => "TIMESTAMP_X",
                    25 => "MODIFIED_BY",
                    26 => "USER_NAME",
                    27 => "",
                ],
                "FILTER_NAME" => "",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "IBLOCK_ID" => "24",
                "IBLOCK_TYPE" => "widgets",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "INCLUDE_SUBSECTIONS" => "Y",
                "MESSAGE_404" => "",
                "NEWS_COUNT" => "10",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => "",
                "PAGER_TITLE" => "",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "PREVIEW_TRUNCATE_LEN" => "",
                "PROPERTY_CODE" => [
                    0 => "",
                    1 => "",
                ],
                "SET_BROWSER_TITLE" => "N",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "SORT_BY1" => "SORT",
                "SORT_BY2" => "SORT",
                "SORT_ORDER1" => "ASC",
                "SORT_ORDER2" => "ASC",
                "STRICT_SECTION_CHECK" => "N",
                "COMPONENT_TEMPLATE" => "slider",
            ],
            false
        ); ?>

        <?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/types.php", [], ["SHOW_BORDER" => true]); ?>

        <?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/components/article_index.php", [], ["SHOW_BORDER" => true]); ?>

        <section class="catalog">
            <div class="content">
                <div class="heading heading_more">
                    <div class="heading__content">
                        <h2>Хиты продаж памятников</h2>
                    </div>
                    <div class="more">
                        <a class="more__link" href="#">
                            <span>Все памятники</span>
                            <svg class="icon__arrow-right" width="24" height="24">
                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                            </svg>
                        </a>
                    </div>
                </div>
                <a class="phone" href="#">
                    <div class="content">
                        <div class="phone-inner">
                            <svg class="icon__phone" width="40" height="40">
                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#phone"></use>
                            </svg>
                            <div class="phone-content">
                                <span class="phone__number">8 (843) 558-00-82</span>
                                <strong>Заказать памятники</strong>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="catalog-items items" data-type="column">
                    <div class="swiper-container base-slider" data-count="4">
                        <div class="slider-wrap swiper-wrapper">
                            <div class="slider-slide swiper-slide">
                                <a class="catalog-item item link-item" href="#">
                                    <div class="catalog-item__img img">
                                        <div class="img__inner object-fit">
                                            <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/catalog/1.jpg" alt="">
                                        </div>
                                        <div class="catalog-item__labels label-wrap">
                                            <span class="label label_small label_bg label_fiery-rose">Новинки</span>
                                            <span class="label label_small label_bg label_fiery-rose">-15%</span>
                                        </div>
                                    </div>
                                    <div class="catalog-item__content">
                                        <span class="label label_small label_fiery-rose">В наличие</span>
                                        <h4>Гранитный БК-1</h4>
                                        <div class="price price_small">
                                            <span class="price-now">от 4 000 ₽</span>
                                            <s class="price-old">от 5 200 ₽</s>
                                        </div>
                                        <div class="more-btn">
                                            <button class="btn btn-blue small" type="button">
                                                <span class="btn__text">
                                                    <span data-text="В корзину">В корзину</span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="slider-slide swiper-slide">
                                <a class="catalog-item item link-item" href="#">
                                    <div class="catalog-item__img img">
                                        <div class="img__inner object-fit">
                                            <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/catalog/2.jpg" alt="">
                                        </div>
                                        <div class="catalog-item__labels label-wrap">
                                            <span class="label label_small label_bg label_fiery-rose">Новинки</span>
                                        </div>
                                    </div>
                                    <div class="catalog-item__content">
                                        <span class="label label_small label_fiery-rose">В наличие</span>
                                        <h4>Гранитный БР-1</h4>
                                        <div class="price price_small">
                                            <span class="price-now">от 5 000 ₽</span>
                                        </div>
                                        <div class="more-btn">
                                            <button class="btn btn-blue small" type="button">
                                                <span class="btn__text">
                                                    <span data-text="В корзину">В корзину</span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="slider-slide swiper-slide">
                                <a class="catalog-item item link-item" href="#">
                                    <div class="catalog-item__img img">
                                        <div class="img__inner object-fit">
                                            <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/catalog/3.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="catalog-item__content">
                                        <span class="label label_small label_fiery-rose">В наличие</span>
                                        <h4>Гранитный ВП-1</h4>
                                        <div class="price price_small">
                                            <span class="price-now">от 7 000 ₽</span>
                                        </div>
                                        <div class="more-btn">
                                            <button class="btn btn-blue small" type="button">
                                                <span class="btn__text">
                                                    <span data-text="В корзину">В корзину</span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="slider-slide swiper-slide">
                                <a class="catalog-item item link-item" href="#">
                                    <div class="catalog-item__img img">
                                        <div class="img__inner object-fit">
                                            <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/catalog/4.jpg" alt="">
                                        </div>
                                        <div class="catalog-item__labels label-wrap">
                                            <span class="label label_small label_bg label_fiery-rose">Новинки</span>
                                            <span class="label label_small label_bg label_fiery-rose">-21%</span>
                                        </div>
                                    </div>
                                    <div class="catalog-item__content">
                                        <span class="label label_small label_fiery-rose">В наличие</span>
                                        <h4>Гранитный ДС-1</h4>
                                        <div class="price price_small">
                                            <span class="price-now">от 5 000 ₽</span>
                                            <s class="price-old">от 6 200 ₽</s>
                                        </div>
                                        <div class="more-btn">
                                            <button class="btn btn-blue small" type="button">
                                                <span class="btn__text">
                                                    <span data-text="В корзину">В корзину</span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="slider-slide swiper-slide">
                                <a class="catalog-item item link-item" href="#">
                                    <div class="catalog-item__img img">
                                        <div class="img__inner object-fit">
                                            <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/catalog/1.jpg" alt="">
                                        </div>
                                        <div class="catalog-item__labels label-wrap">
                                            <span class="label label_small label_bg label_fiery-rose">Новинки</span>
                                            <span class="label label_small label_bg label_fiery-rose">-15%</span>
                                        </div>
                                    </div>
                                    <div class="catalog-item__content">
                                        <span class="label label_small label_fiery-rose">В наличие</span>
                                        <h4>Гранитный БК-1</h4>
                                        <div class="price price_small">
                                            <span class="price-now">от 4 000 ₽</span>
                                            <s class="price-old">от 5 200 ₽</s>
                                        </div>
                                        <div class="more-btn">
                                            <button class="btn btn-blue small" type="button">
                                                <span class="btn__text">
                                                    <span data-text="В корзину">В корзину</span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </a>
                            </div>
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

        <section class="section_padding bg_glitter types">
            <div class="content">
                <div class="heading">
                    <div class="heading__content">
                        <h2>Комплекты ритуальных услуг</h2>
                        <p>Позвоните по телефону
                            <a href="tel:8 (843) 558-00-82"><b>8 (843) 558-00-82</b></a>
                            и ритуальный агент <b>БЕСПЛАТНО</b> приедет.
                        </p>
                    </div>
                    <a class="btn btn-blue big" href="#">
                        <span class="btn__text">
                            <span data-text="Расчет похорон">Расчет похорон</span>
                        </span>
                    </a>
                </div>
                <a class="phone phone_xs" href="#">
                    <div class="content">
                        <div class="phone-inner">
                            <svg class="icon__phone" width="40" height="40">
                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#phone"></use>
                            </svg>

                            <div class="phone-content">
                                <span class="phone__number">8 (843) 558-00-82</span>
                                <strong>Ритуальные услуги</strong>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="types-list">
                    <div class="types-items items">
                        <div class="types-item item">
                            <div class="box">
                                <div class="box__inner">
                                    <div class="types-item__icon">
                                        <img src="<?= SITE_STYLE_PATH ?>/img/content/types/1.svg" alt="">
                                    </div>
                                    <h3>Православные похороны</h3>
                                    <span class="label label_big label_fiery-rose">6 700 ₽</span>
                                    <ul>
                                        <li>– Катафалка</li>
                                        <li>– Гроб</li>
                                        <li>– Крест и табличка</li>
                                        <li>– Венок и принадлежности</li>
                                    </ul>
                                    <div class="more-btn">
                                        <a class="btn btn-blue big btn-block" href="#">
                                            <span class="btn__text">
                                                <span data-text="Получить консультацию">Получить консультацию</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="types-item item">
                            <div class="box">
                                <div class="box__inner">
                                    <div class="types-item__icon">
                                        <img src="<?= SITE_STYLE_PATH ?>/img/content/types/2.svg" alt="">
                                    </div>
                                    <h3>Мусульманские похороны</h3>
                                    <span class="label label_big label_fiery-rose">5 200 ₽</span>
                                    <ul>
                                        <li>– Катафалка</li>
                                        <li>– Ткань</li>
                                        <li>– Доски и обелиски</li>
                                        <li>– Табличка</li>
                                    </ul>
                                    <div class="more-btn">
                                        <a class="btn btn-blue big btn-block" href="#">
                                            <span class="btn__text">
                                                <span data-text="Получить консультацию">Получить консультацию</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/adv.php", [], ["SHOW_BORDER" => true]); ?>

        <section class="section_padding bg_black-haze services">
            <div class="content">
                <div class="heading heading_more">
                    <div class="heading__content">
                        <h2>Ритуальные услуги</h2>
                    </div>
                    <div class="more">
                        <a class="more__link" href="#">
                            <span>Все услуги</span>
                            <svg class="icon__arrow-right" width="24" height="24">
                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                            </svg>
                        </a>
                    </div>
                </div>
                <a class="phone phone_xs" href="#">
                    <div class="content">
                        <div class="phone-inner">
                            <svg class="icon__phone" width="40" height="40">
                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#phone"></use>
                            </svg>
                            <div class="phone-content">
                                <span class="phone__number">8 (843) 558-00-82</span>
                                <strong>Ритуальные услуги</strong>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="services-items items" data-type="column">
                    <a class="services-item item link-item" href="#">
                        <div class="services-item__img img">
                            <div class="img__inner object-fit">
                                <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/services/1.jpg" alt="">
                            </div>
                        </div>
                        <div class="services-item__content">
                            <h4>Организация похорон</h4>
                            <div class="price price_small">
                                <span class="price-now">от 4 000 ₽</span>
                            </div>
                        </div>
                    </a>
                    <a class="services-item item link-item" href="#">
                        <div class="services-item__img img">
                            <div class="img__inner object-fit">
                                <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/services/2.jpg" alt="">
                            </div>
                        </div>
                        <div class="services-item__content">
                            <h4>Кремация тела умершего</h4>
                            <div class="price price_small">
                                <span class="price-now">от 5 000 ₽</span>
                            </div>
                        </div>
                    </a>
                    <a class="services-item item link-item" href="#">
                        <div class="services-item__img img">
                            <div class="img__inner object-fit">
                                <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/services/3.jpg" alt="">
                            </div>
                        </div>
                        <div class="services-item__content">
                            <h4>Перевозка тела умершего</h4>
                            <div class="price price_small">
                                <span class="price-now">от 1 000 ₽</span>
                            </div>
                        </div>
                    </a>
                    <a class="services-item item link-item" href="#">
                        <div class="services-item__img img">
                            <div class="img__inner object-fit">
                                <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/services/4.jpg" alt="">
                            </div>
                        </div>
                        <div class="services-item__content">
                            <h4>Омовение тела умерешего</h4>
                            <div class="price price_small">
                                <span class="price-now">от 2 500 ₽</span>
                            </div>
                        </div>
                    </a>
                    <a class="services-item item link-item" href="#">
                        <div class="services-item__img img">
                            <div class="img__inner object-fit">
                                <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/services/5.jpg" alt="">
                            </div>
                        </div>
                        <div class="services-item__content">
                            <h4>Оформление бумаг о смерти</h4>
                            <div class="price price_small">
                                <span class="price-now">от 1 500 ₽</span>
                            </div>
                        </div>
                    </a>
                    <a class="services-item item link-item" href="#">
                        <div class="services-item__img img">
                            <div class="img__inner object-fit">
                                <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/services/6.jpg" alt="">
                            </div>
                        </div>
                        <div class="services-item__content">
                            <h4>Установка памятников</h4>
                            <div class="price price_small">
                                <span class="price-now">от 3 000 ₽</span>
                            </div>
                        </div>
                    </a>
                    <a class="services-item item link-item" href="#">
                        <div class="services-item__img img">
                            <div class="img__inner object-fit">
                                <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/services/7.jpg" alt="">
                            </div>
                        </div>
                        <div class="services-item__content">
                            <h4>Услуги священнослужителя</h4>
                            <div class="price price_small">
                                <span class="price-now">от 1 000 ₽</span>
                            </div>
                        </div>
                    </a>
                    <a class="services-item item link-item" href="#">
                        <div class="services-item__img img">
                            <div class="img__inner object-fit">
                                <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/services/8.jpg" alt="">
                            </div>
                        </div>
                        <div class="services-item__content">
                            <h4>Похороны Ветеранов ВОВ</h4>
                            <div class="price price_small">
                                <span class="price-now">от 4 000 ₽</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <section class="rating">
            <div class="content">
                <div class="heading">
                    <div class="heading__content">
                        <h2>Рейтинг отзывов</h2>
                    </div>
                </div>
                <div class="rating-items items">
                    <div class="rating-item item">
                        <div class="rating-wrap">
                            <div class="rating-item__icon">
                                <img src="<?= SITE_STYLE_PATH ?>/img/content/rating/google.svg" alt="">
                            </div>
                            <div class="rating-info">
                                <span class="rating-info__count">5.0</span>
                                <div class="rating-info__stars">
                                    <div class="stars">
                                        <div class="star">
                                            <svg class="icon__star" width="28" height="28">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#star"></use>
                                            </svg>
                                        </div>
                                        <div class="star">
                                            <svg class="icon__star" width="28" height="28">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#star"></use>
                                            </svg>
                                        </div>
                                        <div class="star">
                                            <svg class="icon__star" width="28" height="28">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#star"></use>
                                            </svg>
                                        </div>
                                        <div class="star">
                                            <svg class="icon__star" width="28" height="28">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#star"></use>
                                            </svg>
                                        </div>
                                        <div class="star">
                                            <svg class="icon__star" width="28" height="28">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#star"></use>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="rating-info__sum">Отзывов: 23</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rating-item item">
                        <div class="rating-wrap">
                            <div class="rating-item__icon">
                                <img src="<?= SITE_STYLE_PATH ?>/img/content/rating/yandex.svg" alt="">
                            </div>
                            <div class="rating-info">
                                <span class="rating-info__count">4.9</span>
                                <div class="rating-info__stars">
                                    <div class="stars">
                                        <div class="star">
                                            <svg class="icon__star" width="28" height="28">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#star"></use>
                                            </svg>

                                        </div>
                                        <div class="star">
                                            <svg class="icon__star" width="28" height="28">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#star"></use>
                                            </svg>

                                        </div>
                                        <div class="star">
                                            <svg class="icon__star" width="28" height="28">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#star"></use>
                                            </svg>

                                        </div>
                                        <div class="star">
                                            <svg class="icon__star" width="28" height="28">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#star"></use>
                                            </svg>

                                        </div>
                                        <div class="star">
                                            <svg class="icon__star" width="28" height="28">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#star"></use>
                                            </svg>

                                        </div>
                                    </div>
                                    <div class="rating-info__sum">Отзывов: 56</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rating-item item">
                        <div class="rating-wrap">
                            <div class="rating-item__icon">
                                <img src="<?= SITE_STYLE_PATH ?>/img/content/rating/2gis.svg" alt="">
                            </div>
                            <div class="rating-info">
                                <span class="rating-info__count">4.7</span>
                                <div class="rating-info__stars">
                                    <div class="stars">
                                        <div class="star">
                                            <svg class="icon__star" width="28" height="28">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#star"></use>
                                            </svg>

                                        </div>
                                        <div class="star">
                                            <svg class="icon__star" width="28" height="28">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#star"></use>
                                            </svg>

                                        </div>
                                        <div class="star">
                                            <svg class="icon__star" width="28" height="28">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#star"></use>
                                            </svg>

                                        </div>
                                        <div class="star">
                                            <svg class="icon__star" width="28" height="28">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#star"></use>
                                            </svg>

                                        </div>
                                        <div class="star">
                                            <svg class="icon__star" width="28" height="28">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#star"></use>
                                            </svg>

                                        </div>
                                    </div>
                                    <div class="rating-info__sum">Отзывов: 73</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rating-item item">
                        <div class="rating-wrap">
                            <div class="rating-item__icon">
                                <img src="<?= SITE_STYLE_PATH ?>/img/content/rating/vk.svg" alt="">
                            </div>
                            <div class="rating-info">
                                <span class="rating-info__count">5.0</span>
                                <div class="rating-info__stars">
                                    <div class="stars">
                                        <div class="star">
                                            <svg class="icon__star" width="28" height="28">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#star"></use>
                                            </svg>

                                        </div>
                                        <div class="star">
                                            <svg class="icon__star" width="28" height="28">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#star"></use>
                                            </svg>

                                        </div>
                                        <div class="star">
                                            <svg class="icon__star" width="28" height="28">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#star"></use>
                                            </svg>

                                        </div>
                                        <div class="star">
                                            <svg class="icon__star" width="28" height="28">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#star"></use>
                                            </svg>

                                        </div>
                                        <div class="star">
                                            <svg class="icon__star" width="28" height="28">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#star"></use>
                                            </svg>

                                        </div>
                                    </div>
                                    <div class="rating-info__sum">Отзывов: 141</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rating-item item">
                        <div class="rating-wrap">
                            <div class="rating-item__icon">
                                <img src="<?= SITE_STYLE_PATH ?>/img/content/rating/gm.svg" alt="">
                            </div>
                            <div class="rating-info">
                                <span class="rating-info__count">5.0</span>
                                <div class="rating-info__stars">
                                    <div class="stars">
                                        <div class="star">
                                            <svg class="icon__star" width="28" height="28">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#star"></use>
                                            </svg>

                                        </div>
                                        <div class="star">
                                            <svg class="icon__star" width="28" height="28">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#star"></use>
                                            </svg>

                                        </div>
                                        <div class="star">
                                            <svg class="icon__star" width="28" height="28">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#star"></use>
                                            </svg>

                                        </div>
                                        <div class="star">
                                            <svg class="icon__star" width="28" height="28">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#star"></use>
                                            </svg>

                                        </div>
                                        <div class="star">
                                            <svg class="icon__star" width="28" height="28">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#star"></use>
                                            </svg>

                                        </div>
                                    </div>
                                    <div class="rating-info__sum">Отзывов: 23</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rating-item item">
                        <a class="rating-more" href="#">
                            <div class="rating-more__content">
                                <h5>Смотреть отзывы</h5>
                                <div class="slider-btn slider-btn_white slider-btn_next">
                                    <svg class="icon__slider-next" width="32" height="32">
                                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-next"></use>
                                    </svg>

                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="catalog">
            <div class="content">
                <div class="heading heading_more">
                    <div class="heading__content">
                        <h2>Каталог товаров</h2>
                    </div>
                    <div class="more">
                        <a class="more__link" href="#">
                            <span>Все товары</span>
                            <svg class="icon__arrow-right" width="24" height="24">
                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                            </svg>
                        </a>
                    </div>
                </div>
                <a class="phone phone_xs" href="#">
                    <div class="content">
                        <div class="phone-inner">
                            <svg class="icon__phone" width="40" height="40">
                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#phone"></use>
                            </svg>
                            <div class="phone-content">
                                <span class="phone__number">8 (843) 558-00-82</span>
                                <strong>Ритуальные товары</strong>
                            </div>
                        </div>
                    </div>
                </a>
                <div class="catalog-items items" data-type="column">
                    <div class="catalog-item item link-item">
                        <a class="catalog-item__img img" href="#">
                            <div class="img__inner object-fit">
                                <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/catalog/5.jpg" alt="">
                            </div>
                        </a>
                        <div class="catalog-item__content">
                            <h4>
                                <a href="#">Памятники</a>
                            </h4>
                            <ul>
                                <li>
                                    <a href="#">Гранитные</a>
                                </li>
                                <li>
                                    <a href="#">Мраморные</a>
                                </li>
                                <li>
                                    <a href="#">Эксклюзивные</a>
                                </li>
                            </ul>
                            <div class="price price_small">
                                <span class="price-now">от 17 000 ₽</span>
                            </div>
                        </div>
                    </div>
                    <div class="catalog-item item link-item">
                        <a class="catalog-item__img img" href="#">
                            <div class="img__inner object-fit">
                                <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/catalog/6.jpg" alt="">
                            </div>
                        </a>
                        <div class="catalog-item__content">
                            <h4>
                                <a href="#">Ограды</a>
                            </h4>
                            <ul>
                                <li>
                                    <a href="#">Сварные</a>
                                </li>
                                <li>
                                    <a href="#">Кованые</a>
                                </li>
                            </ul>
                            <div class="price price_small">
                                <span class="price-now">от 12 000 ₽</span>
                            </div>
                        </div>
                    </div>
                    <div class="catalog-item item link-item">
                        <a class="catalog-item__img img" href="#">
                            <div class="img__inner object-fit">
                                <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/catalog/7.jpg" alt="">
                            </div>
                        </a>
                        <div class="catalog-item__content">
                            <h4>
                                <a href="#">Гробы</a>
                            </h4>
                            <ul>
                                <li>
                                    <a href="#">Стандартные</a>
                                </li>
                                <li>
                                    <a href="#">Эксклюзивные</a>
                                </li>
                            </ul>
                            <div class="price price_small">
                                <span class="price-now">от 10 000 ₽</span>
                            </div>
                        </div>
                    </div>
                    <div class="catalog-item item link-item">
                        <a class="catalog-item__img img" href="#">
                            <div class="img__inner object-fit">
                                <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/catalog/8.jpg" alt="">
                            </div>
                        </a>
                        <div class="catalog-item__content">
                            <h4>
                                <a href="#">Кресты</a>
                            </h4>
                            <ul>
                                <li>
                                    <a href="#">Сосновые</a>
                                </li>
                                <li>
                                    <a href="#">Дубовые</a>
                                </li>
                                <li>
                                    <a href="#">Металлические</a>
                                </li>
                            </ul>
                            <div class="price price_small">
                                <span class="price-now">от 8 000 ₽</span>
                            </div>
                        </div>
                    </div>
                    <div class="catalog-item item link-item">
                        <a class="catalog-item__img img" href="#">
                            <div class="img__inner object-fit">
                                <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/catalog/9.jpg" alt="">
                            </div>
                        </a>
                        <div class="catalog-item__content">
                            <h4>
                                <a href="#">Венки и корзины</a>
                            </h4>
                            <ul>
                                <li>
                                    <a href="#">Живые цветы</a>
                                </li>
                                <li>
                                    <a href="#">Искусственные цветы</a>
                                </li>
                            </ul>
                            <div class="price price_small">
                                <span class="price-now">от 5 000 ₽</span>
                            </div>
                        </div>
                    </div>
                    <div class="catalog-item item link-item">
                        <a class="catalog-item__img img" href="#">
                            <div class="img__inner object-fit">
                                <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/catalog/10.jpg" alt="">
                            </div>
                        </a>
                        <div class="catalog-item__content">
                            <h4>
                                <a href="#">Таблички</a>
                            </h4>
                            <ul>
                                <li>
                                    <a href="#">Металлические</a>
                                </li>
                                <li>
                                    <a href="#">Металлокерамика ч/б</a>
                                </li>
                                <li>
                                    <a href="#">Пластик</a>
                                </li>
                            </ul>
                            <div class="price price_small">
                                <span class="price-now">от 3 000 ₽</span>
                            </div>
                        </div>
                    </div>
                    <div class="catalog-item item link-item">
                        <a class="catalog-item__img img" href="#">
                            <div class="img__inner object-fit">
                                <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/catalog/11.jpg" alt="">
                            </div>
                        </a>
                        <div class="catalog-item__content">
                            <h4>
                                <a href="#">Одежда</a>
                            </h4>
                            <ul>
                                <li>
                                    <a href="#">Мужская</a>
                                </li>
                                <li>
                                    <a href="#">Женская</a>
                                </li>
                            </ul>
                            <div class="price price_small">
                                <span class="price-now">от 4 000 ₽</span>
                            </div>
                        </div>
                    </div>
                    <div class="catalog-item item link-item">
                        <a class="catalog-item__img img" href="#">
                            <div class="img__inner object-fit">
                                <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/catalog/12.jpg" alt="">
                            </div>
                        </a>
                        <div class="catalog-item__content">
                            <h4>
                                <a href="#">Мусульманские при…</a>
                            </h4>
                            <ul>
                                <li>
                                    <a href="#">Ткани</a>
                                </li>
                                <li>
                                    <a href="#">Доски обелиск</a>
                                </li>
                                <li>
                                    <a href="#">Покровы</a>
                                </li>
                            </ul>
                            <div class="price price_small">
                                <span class="price-now">от 2 000 ₽</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php
        $APPLICATION->IncludeComponent(
            "bitrix:news.list",
            "stock_list",
            [
                "COMPONENT_TEMPLATE" => "stock_list",
                "IBLOCK_TYPE" => "content",
                "IBLOCK_ID" => "14",
                "NEWS_COUNT" => "5",
                "SORT_BY1" => "SORT",
                "SORT_ORDER1" => "ASC",
                "SORT_BY2" => "SORT",
                "SORT_ORDER2" => "ASC",
                "FILTER_NAME" => "",
                "FIELD_CODE" => [
                    0 => "ID",
                    1 => "CODE",
                    2 => "XML_ID",
                    3 => "NAME",
                    4 => "TAGS",
                    5 => "SORT",
                    6 => "PREVIEW_TEXT",
                    7 => "PREVIEW_PICTURE",
                    8 => "DETAIL_TEXT",
                    9 => "DETAIL_PICTURE",
                    10 => "DATE_ACTIVE_FROM",
                    11 => "ACTIVE_FROM",
                    12 => "DATE_ACTIVE_TO",
                    13 => "ACTIVE_TO",
                    14 => "SHOW_COUNTER",
                    15 => "SHOW_COUNTER_START",
                    16 => "IBLOCK_TYPE_ID",
                    17 => "IBLOCK_ID",
                    18 => "IBLOCK_CODE",
                    19 => "IBLOCK_NAME",
                    20 => "IBLOCK_EXTERNAL_ID",
                    21 => "DATE_CREATE",
                    22 => "CREATED_BY",
                    23 => "CREATED_USER_NAME",
                    24 => "TIMESTAMP_X",
                    25 => "MODIFIED_BY",
                    26 => "USER_NAME",
                    27 => "",
                ],
                "PROPERTY_CODE" => [
                    0 => "",
                    1 => "",
                ],
                "CHECK_DATES" => "Y",
                "DETAIL_URL" => "",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "N",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "CACHE_TYPE" => "A",
                "CACHE_TIME" => "36000000",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "Y",
                "PREVIEW_TRUNCATE_LEN" => "",
                "ACTIVE_DATE_FORMAT" => "",
                "SET_TITLE" => "N",
                "SET_BROWSER_TITLE" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_LAST_MODIFIED" => "N",
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                "ADD_SECTIONS_CHAIN" => "N",
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",
                "PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "",
                "INCLUDE_SUBSECTIONS" => "Y",
                "STRICT_SECTION_CHECK" => "N",
                "PAGER_TEMPLATE" => "",
                "DISPLAY_TOP_PAGER" => "N",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "PAGER_TITLE" => "",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "SET_STATUS_404" => "N",
                "SHOW_404" => "N",
                "FILE_404" => "",
                "TITLE" => "Акции и скидки",
            ],
            false
        );
        ?>

        <?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/calculation.php", [], ["SHOW_BORDER" => true]); ?>

        <section style="margin-top: -31px;">
            <div class="content">
                <?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/components/about.php", [], ["SHOW_BORDER" => true]); ?>
            </div>
        </section>