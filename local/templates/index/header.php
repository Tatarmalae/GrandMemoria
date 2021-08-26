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
        <div class="hello">
            <div class="swiper-container hello-slider">
                <div class="hello__wrapper swiper-wrapper">
                    <div class="hello__slide swiper-slide">
                        <div class="hello__item">
                            <div class="hello__bg">
                                <div class="hello__bg-inner object-fit">
                                    <picture>
                                        <source media="(max-width:1279px)" data-srcset="<?= SITE_STYLE_PATH ?>/img/content/hello/bg-mob.jpg">
                                        <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/hello/bg.jpg" alt="">
                                    </picture>
                                    <!--img(src='<?= SITE_STYLE_PATH ?>/img/content/hello/bg.jpg', alt='')-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hello__slide swiper-slide">
                        <div class="hello__item">
                            <div class="hello__bg">
                                <div class="hello__bg-inner object-fit">
                                    <picture>
                                        <source media="(max-width:1279px)" data-srcset="<?= SITE_STYLE_PATH ?>/img/content/hello/bg-2-mob.jpg">
                                        <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/hello/bg-2.jpg" alt="">
                                    </picture>
                                    <!--img(src='<?= SITE_STYLE_PATH ?>/img/content/hello/bg.jpg', alt='')-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hello__slide swiper-slide">
                        <div class="hello__item">
                            <div class="hello__bg">
                                <div class="hello__bg-inner object-fit">
                                    <picture>
                                        <source media="(max-width:1279px)" data-srcset="<?= SITE_STYLE_PATH ?>/img/content/hello/bg-3-mob.jpg">
                                        <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/hello/bg-3.jpg" alt="">
                                    </picture>
                                    <!--img(src='<?= SITE_STYLE_PATH ?>/img/content/hello/bg.jpg', alt='')-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hello-arrow hello-arrow_prev">
                    <div class="slider-btn slider-btn_white slider-btn_prev hello-slider__btn_prev">
                        <svg class="icon__slider-prev" width="32" height="32">
                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-prev"></use>
                        </svg>

                    </div>
                </div>
                <div class="hello-arrow hello-arrow_next">
                    <div class="slider-btn slider-btn_white slider-btn_next hello-slider__btn_next">
                        <svg class="icon__slider-next" width="32" height="32">
                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-next"></use>
                        </svg>

                    </div>
                </div>
            </div>
            <div class="hello-counts">
                <div class="content">
                    <div class="hello-counts__inner"><span class="hello-counts__now">00</span>/<span class="hello-counts__all">00</span>
                    </div>
                </div>
            </div>
        </div>
        <section class="types">
            <div class="content">
                <div class="types-box box">
                    <div class="box__inner">
                        <div class="types-items items">
                            <div class="types-item item"><span class="label label_big label_fiery-rose">ВСЕ В НАЛИЧИИ</span>
                                <h3>Каталог товаров</h3>
                                <p>Вы найдете все необходимое для похорон. Для экономии времени на поиски воспользуйтесь нашим онлайн-каталогом.</p>
                                <div class="more-btn"><a class="btn btn-blue big btn-block" href="#"><span class="btn__text"><span data-text="Перейти в каталог">Перейти в каталог</span></span></a>
                                </div>
                                <div class="more"><a class="more__link" href="#" data-toggle="modal" data-target="#modalInstallmentPlan"><span>Расчитать рассрочку</span>
                                        <svg class="icon__arrow-right" width="24" height="24">
                                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="types-item item"><span class="label label_big label_fiery-rose">КРУГЛОСУТОЧНО</span>
                                <h3>Ритуальные услуги</h3>
                                <p>Приезд специалиста в течение 30 минут. Организуем весь процесс похорон на всех кладбищах Казани и РТ.</p>
                                <div class="more-btn"><a class="btn btn-blue big btn-block" href="#"><span class="btn__text"><span data-text="Посмотреть все услуги">Посмотреть все услуги</span></span></a>
                                </div>
                                <div class="more"><a class="more__link" href="#" data-toggle="modal" data-target="#modalConsultation"><span>Получить консультацию</span>
                                        <svg class="icon__arrow-right" width="24" height="24">
                                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-box banner-box_center bg_glitter">
                    <div class="banner-inner">
                        <div class="banner-content">
                            <h3><a href="#">Что делать, если умер близкий человек?</a></h3>
                            <p>Порядок действий в экстренных ситуациях</p>
                        </div>
                        <div class="banner-arrow">
                            <a class="slider-btn slider-btn_next" href="#">
                                <svg class="icon__slider-next" width="32" height="32">
                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-next"></use>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="catalog">
            <div class="content">
                <div class="heading heading_more">
                    <div class="heading__content">
                        <h2>Хиты продаж памятников</h2>
                    </div>
                    <div class="more"><a class="more__link" href="#"><span>Все памятники</span>
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

                            <div class="phone-content"><span class="phone__number">8 (843) 558-00-82</span><strong>Заказать памятники</strong>
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
                                        <div class="catalog-item__labels label-wrap"><span class="label label_small label_bg label_fiery-rose">Новинки</span><span class="label label_small label_bg label_fiery-rose">-15%</span>
                                        </div>
                                    </div>
                                    <div class="catalog-item__content"><span class="label label_small label_fiery-rose">В наличие</span>
                                        <h4>Гранитный БК-1</h4>
                                        <div class="price price_small"><span class="price-now">от 4 000 ₽</span>
                                            <s class="price-old">от 5 200 ₽</s>
                                        </div>
                                        <div class="more-btn">
                                            <button class="btn btn-blue small" type="button"><span class="btn__text"><span data-text="В корзину">В корзину</span></span>
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
                                        <div class="catalog-item__labels label-wrap"><span class="label label_small label_bg label_fiery-rose">Новинки</span>
                                        </div>
                                    </div>
                                    <div class="catalog-item__content"><span class="label label_small label_fiery-rose">В наличие</span>
                                        <h4>Гранитный БР-1</h4>
                                        <div class="price price_small"><span class="price-now">от 5 000 ₽</span>
                                        </div>
                                        <div class="more-btn">
                                            <button class="btn btn-blue small" type="button"><span class="btn__text"><span data-text="В корзину">В корзину</span></span>
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
                                    <div class="catalog-item__content"><span class="label label_small label_fiery-rose">В наличие</span>
                                        <h4>Гранитный ВП-1</h4>
                                        <div class="price price_small"><span class="price-now">от 7 000 ₽</span>
                                        </div>
                                        <div class="more-btn">
                                            <button class="btn btn-blue small" type="button"><span class="btn__text"><span data-text="В корзину">В корзину</span></span>
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
                                        <div class="catalog-item__labels label-wrap"><span class="label label_small label_bg label_fiery-rose">Новинки</span><span class="label label_small label_bg label_fiery-rose">-21%</span>
                                        </div>
                                    </div>
                                    <div class="catalog-item__content"><span class="label label_small label_fiery-rose">В наличие</span>
                                        <h4>Гранитный ДС-1</h4>
                                        <div class="price price_small"><span class="price-now">от 5 000 ₽</span>
                                            <s class="price-old">от 6 200 ₽</s>
                                        </div>
                                        <div class="more-btn">
                                            <button class="btn btn-blue small" type="button"><span class="btn__text"><span data-text="В корзину">В корзину</span></span>
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
                                        <div class="catalog-item__labels label-wrap"><span class="label label_small label_bg label_fiery-rose">Новинки</span><span class="label label_small label_bg label_fiery-rose">-15%</span>
                                        </div>
                                    </div>
                                    <div class="catalog-item__content"><span class="label label_small label_fiery-rose">В наличие</span>
                                        <h4>Гранитный БК-1</h4>
                                        <div class="price price_small"><span class="price-now">от 4 000 ₽</span>
                                            <s class="price-old">от 5 200 ₽</s>
                                        </div>
                                        <div class="more-btn">
                                            <button class="btn btn-blue small" type="button"><span class="btn__text"><span data-text="В корзину">В корзину</span></span>
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
                        <p>Позвоните по телефону <a href="tel:8 (843) 558-00-82"><b>8 (843) 558-00-82</b></a>
                            и ритуальный агент <b>БЕСПЛАТНО</b> приедет.
                        </p>
                    </div><a class="btn btn-blue big" href="#"><span class="btn__text"><span data-text="Расчет похорон">Расчет похорон</span></span></a>
                </div>
                <a class="phone phone_xs" href="#">
                    <div class="content">
                        <div class="phone-inner">
                            <svg class="icon__phone" width="40" height="40">
                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#phone"></use>
                            </svg>

                            <div class="phone-content"><span class="phone__number">8 (843) 558-00-82</span><strong>Ритуальные услуги</strong>
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
                                    <h3>Православные похороны</h3><span class="label label_big label_fiery-rose">6 700 ₽</span>
                                    <ul>
                                        <li>– Катафалка</li>
                                        <li>– Гроб</li>
                                        <li>– Крест и табличка</li>
                                        <li>– Венок и принадлежности</li>
                                    </ul>
                                    <div class="more-btn"><a class="btn btn-blue big btn-block" href="#"><span class="btn__text"><span data-text="Получить консультацию">Получить консультацию</span></span></a>
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
                                    <h3>Мусульманские похороны</h3><span class="label label_big label_fiery-rose">5 200 ₽</span>
                                    <ul>
                                        <li>– Катафалка</li>
                                        <li>– Ткань</li>
                                        <li>– Доски и обелиски</li>
                                        <li>– Табличка</li>
                                    </ul>
                                    <div class="more-btn"><a class="btn btn-blue big btn-block" href="#"><span class="btn__text"><span data-text="Получить консультацию">Получить консультацию</span></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="adv">
            <div class="content">
                <div class="adv-box bg_pippin">
                    <div class="heading">
                        <h3>Выезд специалиста круглосуточно бесплатно</h3>
                    </div>
                    <div class="adv-items items">
                        <div class="adv-item item">
                            <div class="adv-item__icon">
                                <img src="<?= SITE_STYLE_PATH ?>/img/content/adv/icon.svg" alt="">
                            </div>
                            <p>Приезд специалиста в течение 30 минут</p>
                        </div>
                        <div class="adv-item item">
                            <div class="adv-item__icon">
                                <img src="<?= SITE_STYLE_PATH ?>/img/content/adv/icon.svg" alt="">
                            </div>
                            <p>Организация похорон под ключ по всем обычаям</p>
                        </div>
                        <div class="adv-item item">
                            <div class="adv-item__icon">
                                <img src="<?= SITE_STYLE_PATH ?>/img/content/adv/icon.svg" alt="">
                            </div>
                            <p>Работаем круглосуточно и без выходных</p>
                        </div>
                        <div class="adv-item item">
                            <div class="adv-item__icon">
                                <img src="<?= SITE_STYLE_PATH ?>/img/content/adv/icon.svg" alt="">
                            </div>
                            <p>Работаем в соответствии с ГОСТом</p>
                        </div>
                    </div>
                    <div class="more-btn"><a class="btn btn-red big" href="#"><span class="btn__text"><span data-text="Позвонить">Позвонить</span></span></a>
                    </div>
                </div>
            </div>
        </div>
        <section class="section_padding bg_black-haze services">
            <div class="content">
                <div class="heading heading_more">
                    <div class="heading__content">
                        <h2>Ритуальные услуги</h2>
                    </div>
                    <div class="more"><a class="more__link" href="#"><span>Все услуги</span>
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

                            <div class="phone-content"><span class="phone__number">8 (843) 558-00-82</span><strong>Ритуальные услуги</strong>
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
                            <div class="price price_small"><span class="price-now">от 4 000 ₽</span>
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
                            <div class="price price_small"><span class="price-now">от 5 000 ₽</span>
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
                            <div class="price price_small"><span class="price-now">от 1 000 ₽</span>
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
                            <div class="price price_small"><span class="price-now">от 2 500 ₽</span>
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
                            <div class="price price_small"><span class="price-now">от 1 500 ₽</span>
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
                            <div class="price price_small"><span class="price-now">от 3 000 ₽</span>
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
                            <div class="price price_small"><span class="price-now">от 1 000 ₽</span>
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
                            <div class="price price_small"><span class="price-now">от 4 000 ₽</span>
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
                            <div class="rating-info"><span class="rating-info__count">5.0</span>
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
                            <div class="rating-info"><span class="rating-info__count">4.9</span>
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
                            <div class="rating-info"><span class="rating-info__count">4.7</span>
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
                            <div class="rating-info"><span class="rating-info__count">5.0</span>
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
                            <div class="rating-info"><span class="rating-info__count">5.0</span>
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
                    <div class="more"><a class="more__link" href="#"><span>Все товары</span>
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

                            <div class="phone-content"><span class="phone__number">8 (843) 558-00-82</span><strong>Ритуальные товары</strong>
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
                            <h4><a href="#">Памятники</a></h4>
                            <ul>
                                <li><a href="#">Гранитные</a>
                                </li>
                                <li><a href="#">Мраморные</a>
                                </li>
                                <li><a href="#">Эксклюзивные</a>
                                </li>
                            </ul>
                            <div class="price price_small"><span class="price-now">от 17 000 ₽</span>
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
                            <h4><a href="#">Ограды</a></h4>
                            <ul>
                                <li><a href="#">Сварные</a>
                                </li>
                                <li><a href="#">Кованые</a>
                                </li>
                            </ul>
                            <div class="price price_small"><span class="price-now">от 12 000 ₽</span>
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
                            <h4><a href="#">Гробы</a></h4>
                            <ul>
                                <li><a href="#">Стандартные</a>
                                </li>
                                <li><a href="#">Эксклюзивные</a>
                                </li>
                            </ul>
                            <div class="price price_small"><span class="price-now">от 10 000 ₽</span>
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
                            <h4><a href="#">Кресты</a></h4>
                            <ul>
                                <li><a href="#">Сосновые</a>
                                </li>
                                <li><a href="#">Дубовые</a>
                                </li>
                                <li><a href="#">Металлические</a>
                                </li>
                            </ul>
                            <div class="price price_small"><span class="price-now">от 8 000 ₽</span>
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
                            <h4><a href="#">Венки и корзины</a></h4>
                            <ul>
                                <li><a href="#">Живые цветы</a>
                                </li>
                                <li><a href="#">Искусственные цветы</a>
                                </li>
                            </ul>
                            <div class="price price_small"><span class="price-now">от 5 000 ₽</span>
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
                            <h4><a href="#">Таблички</a></h4>
                            <ul>
                                <li><a href="#">Металлические</a>
                                </li>
                                <li><a href="#">Металлокерамика ч/б</a>
                                </li>
                                <li><a href="#">Пластик</a>
                                </li>
                            </ul>
                            <div class="price price_small"><span class="price-now">от 3 000 ₽</span>
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
                            <h4><a href="#">Одежда</a></h4>
                            <ul>
                                <li><a href="#">Мужская</a>
                                </li>
                                <li><a href="#">Женская</a>
                                </li>
                            </ul>
                            <div class="price price_small"><span class="price-now">от 4 000 ₽</span>
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
                            <h4><a href="#">Мусульманские при…</a></h4>
                            <ul>
                                <li><a href="#">Ткани</a>
                                </li>
                                <li><a href="#">Доски обелиск</a>
                                </li>
                                <li><a href="#">Покровы</a>
                                </li>
                            </ul>
                            <div class="price price_small"><span class="price-now">от 2 000 ₽</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section_padding bg_black-haze stock">
            <div class="content">
                <div class="heading">
                    <div class="heading__content">
                        <h2>Акции и скидки</h2>
                    </div>
                </div>
                <div class="stock-items items" data-type="slider">
                    <div class="swiper-container base-slider" data-count="2">
                        <div class="slider-wrap swiper-wrapper">
                            <div class="slider-slide swiper-slide">
                                <div class="stock-item item link-item">
                                    <div class="box">
                                        <div class="stock-item__img img">
                                            <div class="img__inner object-fit">
                                                <picture>
                                                    <source media="(max-width:1279px)" data-srcset="<?= SITE_STYLE_PATH ?>/img/content/stock/1-mob.jpg">
                                                    <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/stock/1.jpg" alt="">
                                                </picture>
                                            </div>
                                        </div>
                                        <div class="stock-item__content"><span class="label label_small label_marengo">Выгодные предложения</span>
                                            <h4><a href="#">Организация похорон участников, инвалидов и ветеранов ВОВ</a></h4>
                                            <ul>
                                                <li>– Федеральная программа</li>
                                                <li>– Быстрые переводы</li>
                                                <li>– Пакет документов</li>
                                            </ul>
                                            <div class="more-btn"><a class="btn btn-blue big btn-block" href="#"><span class="btn__text"><span data-text="Посмотреть">Посмотреть</span></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slider-slide swiper-slide">
                                <div class="stock-item item link-item">
                                    <div class="box">
                                        <div class="stock-item__img img">
                                            <div class="img__inner object-fit">
                                                <picture>
                                                    <source media="(max-width:1279px)" data-srcset="<?= SITE_STYLE_PATH ?>/img/content/stock/2-mob.jpg">
                                                    <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/stock/2.jpg" alt="">
                                                </picture>
                                            </div>
                                        </div>
                                        <div class="stock-item__content"><span class="label label_small label_marengo">Выгодные предложения</span>
                                            <h4><a href="#">Организация похорон круглосуточно, по цене от 4 800 ₽</a></h4>
                                            <ul>
                                                <li>– Федеральная программа</li>
                                                <li>– Быстрые переводы</li>
                                                <li>– Пакет документов</li>
                                            </ul>
                                            <div class="more-btn"><a class="btn btn-blue big btn-block" href="#"><span class="btn__text"><span data-text="Посмотреть">Посмотреть</span></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="slider-slide swiper-slide">
                                <div class="stock-item item link-item">
                                    <div class="box">
                                        <div class="stock-item__img img">
                                            <div class="img__inner object-fit">
                                                <picture>
                                                    <source media="(max-width:1279px)" data-srcset="<?= SITE_STYLE_PATH ?>/img/content/stock/1-mob.jpg">
                                                    <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/stock/1.jpg" alt="">
                                                </picture>
                                            </div>
                                        </div>
                                        <div class="stock-item__content"><span class="label label_small label_marengo">Выгодные предложения</span>
                                            <h4><a href="#">Организация похорон участников, инвалидов и ветеранов ВОВ</a></h4>
                                            <ul>
                                                <li>– Федеральная программа</li>
                                                <li>– Быстрые переводы</li>
                                                <li>– Пакет документов</li>
                                            </ul>
                                            <div class="more-btn"><a class="btn btn-blue big btn-block" href="#"><span class="btn__text"><span data-text="Посмотреть">Посмотреть</span></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
        <section class="calculation">
            <div class="content">
                <div class="heading">
                    <div class="heading__content">
                        <h2>Расчет похорон</h2>
                    </div>
                    <div class="calculation-logo">
                        <p>Мы с уважением относимся к памяти об усопшем и традициям религий, берем все на себя.</p>
                        <a class="logo-link" href="#">
                            <div class="logo">
                                <img src="<?= SITE_STYLE_PATH ?>/img/general/logo-short.svg" alt="">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="calculation-wrap">
                    <div class="calculation-top">
                        <div class="calculation-top__info"><span>Прогресс заполнения</span><span><span class="now">1</span>/<span class="all">5</span></span>
                        </div>
                        <div class="calculation-line">
                            <div class="calculation-line__inner line" style="width:20%;"></div>
                        </div>
                    </div>
                    <div class="calculation-content">
                        <div class="calculation-item calculation-item_active">
                            <h4>Расчет стоимости похорон</h4>
                            <div class="calculation-radio">
                                <div class="calculation-radio__wrap">
                                    <div class="radio">
                                        <input type="radio" name="radio" id="calculationCheck1_1" value="Захоронение">
                                        <label for="calculationCheck1_1"><span class="radio__box"></span>Захоронение</label>
                                        <div class="radio-bg"></div>
                                    </div>
                                </div>
                                <div class="calculation-radio__wrap">
                                    <div class="radio">
                                        <input type="radio" name="radio" id="calculationCheck1_2" value="Кремация">
                                        <label for="calculationCheck1_2"><span class="radio__box"></span>Кремация</label>
                                        <div class="radio-bg"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="calculation-item">
                            <div class="calculation-group">
                                <h4>Гробы</h4>
                                <div class="calculation-items items">
                                    <div class="item">
                                        <div class="dropdown dropdown_white dropdown_hint">
                                            <div class="dropdown-label" id="calculationDrop2_1" data-toggle="dropdown" aria-expanded="false">
                                                <svg class="icon__arrow-drop" width="32" height="32">
                                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                                </svg>

                                                <div class="dropdown-wrap">
                                                    <div class="dropdown-wrap__column">
                                                        <div class="dropdown-hint">Выбрать вид</div>
                                                        <div class="dropdown-value">Не выбран</div>
                                                    </div>
                                                    <div class="dropdown-wrap__column"><span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="dropdown-menu" aria-labelledby="calculationDrop2_1">
                                                <li data-value="Не выбран" data-sum="0">
                                                    <div class="dropdown-wrap">
                                                        <div class="dropdown-wrap__column">
                                                            <div class="dropdown-value">Не выбран</div>
                                                        </div>
                                                        <div class="dropdown-wrap__column"><span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-value="Вид" data-sum="1000">
                                                    <div class="dropdown-wrap">
                                                        <div class="dropdown-wrap__column">
                                                            <div class="dropdown-value">Вид 1</div>
                                                        </div>
                                                        <div class="dropdown-wrap__column"><span class="dropdown-sum">от <span class="sum">1000</span> ₽</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="dropdown dropdown_white dropdown_hint">
                                            <div class="dropdown-label" id="calculationDrop2_2" data-toggle="dropdown" aria-expanded="false">
                                                <svg class="icon__arrow-drop" width="32" height="32">
                                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                                </svg>

                                                <div class="dropdown-wrap">
                                                    <div class="dropdown-wrap__column">
                                                        <div class="dropdown-hint">Похоронный комплект в гроб</div>
                                                        <div class="dropdown-value">Не выбран</div>
                                                    </div>
                                                    <div class="dropdown-wrap__column"><span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="dropdown-menu" aria-labelledby="calculationDrop2_2">
                                                <li data-value="Не выбран" data-sum="0">
                                                    <div class="dropdown-wrap">
                                                        <div class="dropdown-wrap__column">
                                                            <div class="dropdown-value">Не выбран</div>
                                                        </div>
                                                        <div class="dropdown-wrap__column"><span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-value="Похоронный комплект" data-sum="500">
                                                    <div class="dropdown-wrap">
                                                        <div class="dropdown-wrap__column">
                                                            <div class="dropdown-value">Похоронный комплект 1</div>
                                                        </div>
                                                        <div class="dropdown-wrap__column"><span class="dropdown-sum">от <span class="sum">500</span> ₽</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="dropdown dropdown_white dropdown_hint">
                                            <div class="dropdown-label" id="calculationDrop2_3" data-toggle="dropdown" aria-expanded="false">
                                                <svg class="icon__arrow-drop" width="32" height="32">
                                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                                </svg>

                                                <div class="dropdown-wrap">
                                                    <div class="dropdown-wrap__column">
                                                        <div class="dropdown-hint">Композиция на крышку гроба</div>
                                                        <div class="dropdown-value">Не выбран</div>
                                                    </div>
                                                    <div class="dropdown-wrap__column"><span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="dropdown-menu" aria-labelledby="calculationDrop2_3">
                                                <li data-value="Не выбран" data-sum="0">
                                                    <div class="dropdown-wrap">
                                                        <div class="dropdown-wrap__column">
                                                            <div class="dropdown-value">Не выбран</div>
                                                        </div>
                                                        <div class="dropdown-wrap__column"><span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-value="Композиция на крышку" data-sum="700">
                                                    <div class="dropdown-wrap">
                                                        <div class="dropdown-wrap__column">
                                                            <div class="dropdown-value">Композиция на крышку 1</div>
                                                        </div>
                                                        <div class="dropdown-wrap__column"><span class="dropdown-sum">от <span class="sum">700</span> ₽</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="calculation-group">
                                <h4>Комплект одежды для усопшего</h4>
                                <div class="calculation-items items">
                                    <div class="item">
                                        <div class="dropdown dropdown_white dropdown_hint">
                                            <div class="dropdown-label" id="calculationDrop2_4" data-toggle="dropdown" aria-expanded="false">
                                                <svg class="icon__arrow-drop" width="32" height="32">
                                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                                </svg>

                                                <div class="dropdown-wrap">
                                                    <div class="dropdown-wrap__column">
                                                        <div class="dropdown-hint">Комплект</div>
                                                        <div class="dropdown-value">Не выбран</div>
                                                    </div>
                                                    <div class="dropdown-wrap__column"><span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="dropdown-menu" aria-labelledby="calculationDrop2_4">
                                                <li data-value="Не выбран" data-sum="0">
                                                    <div class="dropdown-wrap">
                                                        <div class="dropdown-wrap__column">
                                                            <div class="dropdown-value">Не выбран</div>
                                                        </div>
                                                        <div class="dropdown-wrap__column"><span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-value="Комплект" data-sum="1000">
                                                    <div class="dropdown-wrap">
                                                        <div class="dropdown-wrap__column">
                                                            <div class="dropdown-value">Комплект 1</div>
                                                        </div>
                                                        <div class="dropdown-wrap__column"><span class="dropdown-sum">от <span class="sum">1000</span> ₽</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="calculation-item">
                            <div class="calculation-group">
                                <h4>Венки</h4>
                                <div class="calculation-items items">
                                    <div class="item">
                                        <div class="dropdown dropdown_white dropdown_hint">
                                            <div class="dropdown-label" id="calculationDrop3_1" data-toggle="dropdown" aria-expanded="false">
                                                <svg class="icon__arrow-drop" width="32" height="32">
                                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                                </svg>

                                                <div class="dropdown-wrap">
                                                    <div class="dropdown-wrap__column">
                                                        <div class="dropdown-hint">Материал, размер</div>
                                                        <div class="dropdown-value">Не выбран</div>
                                                    </div>
                                                    <div class="dropdown-wrap__column"><span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="dropdown-menu" aria-labelledby="calculationDrop3_1">
                                                <li data-value="Не выбран" data-sum="0">
                                                    <div class="dropdown-wrap">
                                                        <div class="dropdown-wrap__column">
                                                            <div class="dropdown-value">Не выбран</div>
                                                        </div>
                                                        <div class="dropdown-wrap__column"><span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-value="Материал, размер" data-sum="1000">
                                                    <div class="dropdown-wrap">
                                                        <div class="dropdown-wrap__column">
                                                            <div class="dropdown-value">Материал, размер 1</div>
                                                        </div>
                                                        <div class="dropdown-wrap__column"><span class="dropdown-sum">от <span class="sum">1000</span> ₽</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="dropdown dropdown_white dropdown_hint">
                                            <div class="dropdown-label" id="calculationDrop3_2" data-toggle="dropdown" aria-expanded="false">
                                                <svg class="icon__arrow-drop" width="32" height="32">
                                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                                </svg>

                                                <div class="dropdown-wrap">
                                                    <div class="dropdown-wrap__column">
                                                        <div class="dropdown-hint">Траурная лента</div>
                                                        <div class="dropdown-value">Не выбран</div>
                                                    </div>
                                                    <div class="dropdown-wrap__column"><span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="dropdown-menu" aria-labelledby="calculationDrop3_2">
                                                <li data-value="Не выбран" data-sum="0">
                                                    <div class="dropdown-wrap">
                                                        <div class="dropdown-wrap__column">
                                                            <div class="dropdown-value">Не выбран</div>
                                                        </div>
                                                        <div class="dropdown-wrap__column"><span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-value="Траурная лента" data-sum="800">
                                                    <div class="dropdown-wrap">
                                                        <div class="dropdown-wrap__column">
                                                            <div class="dropdown-value">Траурная лента 1</div>
                                                        </div>
                                                        <div class="dropdown-wrap__column"><span class="dropdown-sum">от <span class="sum">800</span> ₽</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="calculation-group">
                                <h4>Кресты</h4>
                                <div class="calculation-items items">
                                    <div class="item">
                                        <div class="dropdown dropdown_white dropdown_hint">
                                            <div class="dropdown-label" id="calculationDrop3_3" data-toggle="dropdown" aria-expanded="false">
                                                <svg class="icon__arrow-drop" width="32" height="32">
                                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                                </svg>

                                                <div class="dropdown-wrap">
                                                    <div class="dropdown-wrap__column">
                                                        <div class="dropdown-hint">Материал</div>
                                                        <div class="dropdown-value">Не выбран</div>
                                                    </div>
                                                    <div class="dropdown-wrap__column"><span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="dropdown-menu" aria-labelledby="calculationDrop3_3">
                                                <li data-value="Не выбран" data-sum="0">
                                                    <div class="dropdown-wrap">
                                                        <div class="dropdown-wrap__column">
                                                            <div class="dropdown-value">Не выбран</div>
                                                        </div>
                                                        <div class="dropdown-wrap__column"><span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-value="Материал" data-sum="800">
                                                    <div class="dropdown-wrap">
                                                        <div class="dropdown-wrap__column">
                                                            <div class="dropdown-value">Материал 1</div>
                                                        </div>
                                                        <div class="dropdown-wrap__column"><span class="dropdown-sum">от <span class="sum">800</span> ₽</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="dropdown dropdown_white dropdown_hint">
                                            <div class="dropdown-label" id="calculationDrop3_4" data-toggle="dropdown" aria-expanded="false">
                                                <svg class="icon__arrow-drop" width="32" height="32">
                                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                                </svg>

                                                <div class="dropdown-wrap">
                                                    <div class="dropdown-wrap__column">
                                                        <div class="dropdown-hint">Табличка на крест</div>
                                                        <div class="dropdown-value">Не выбран</div>
                                                    </div>
                                                    <div class="dropdown-wrap__column"><span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="dropdown-menu" aria-labelledby="calculationDrop3_4">
                                                <li data-value="Не выбран" data-sum="0">
                                                    <div class="dropdown-wrap">
                                                        <div class="dropdown-wrap__column">
                                                            <div class="dropdown-value">Не выбран</div>
                                                        </div>
                                                        <div class="dropdown-wrap__column"><span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-value="Табличка на крест" data-sum="600">
                                                    <div class="dropdown-wrap">
                                                        <div class="dropdown-wrap__column">
                                                            <div class="dropdown-value">Табличка на крест 1</div>
                                                        </div>
                                                        <div class="dropdown-wrap__column"><span class="dropdown-sum">от <span class="sum">600</span> ₽</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="calculation-item">
                            <div class="calculation-group">
                                <h4>Услуги транспортировки</h4>
                                <div class="calculation-items items">
                                    <div class="item">
                                        <div class="dropdown dropdown_white dropdown_hint">
                                            <div class="dropdown-label" id="calculationDrop4_1" data-toggle="dropdown" aria-expanded="false">
                                                <svg class="icon__arrow-drop" width="32" height="32">
                                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                                </svg>

                                                <div class="dropdown-wrap">
                                                    <div class="dropdown-wrap__column">
                                                        <div class="dropdown-hint">Выбрать вид</div>
                                                        <div class="dropdown-value">Не выбран</div>
                                                    </div>
                                                    <div class="dropdown-wrap__column"><span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="dropdown-menu" aria-labelledby="calculationDrop4_1">
                                                <li data-value="Не выбран" data-sum="0">
                                                    <div class="dropdown-wrap">
                                                        <div class="dropdown-wrap__column">
                                                            <div class="dropdown-value">Не выбран</div>
                                                        </div>
                                                        <div class="dropdown-wrap__column"><span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-value="Вид" data-sum="400">
                                                    <div class="dropdown-wrap">
                                                        <div class="dropdown-wrap__column">
                                                            <div class="dropdown-value">Вид 1</div>
                                                        </div>
                                                        <div class="dropdown-wrap__column"><span class="dropdown-sum">от <span class="sum">400</span> ₽</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="calculation-group">
                                <h4>Услуги ритуального сотрудника</h4>
                                <div class="calculation-items items">
                                    <div class="item">
                                        <div class="dropdown dropdown_white dropdown_hint">
                                            <div class="dropdown-label" id="calculationDrop4_2" data-toggle="dropdown" aria-expanded="false">
                                                <svg class="icon__arrow-drop" width="32" height="32">
                                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                                </svg>

                                                <div class="dropdown-wrap">
                                                    <div class="dropdown-wrap__column">
                                                        <div class="dropdown-hint">Услуги сопроводительной бригады</div>
                                                        <div class="dropdown-value">Не выбран</div>
                                                    </div>
                                                    <div class="dropdown-wrap__column"><span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class="dropdown-menu" aria-labelledby="calculationDrop4_2">
                                                <li data-value="Не выбран" data-sum="0">
                                                    <div class="dropdown-wrap">
                                                        <div class="dropdown-wrap__column">
                                                            <div class="dropdown-value">Не выбран</div>
                                                        </div>
                                                        <div class="dropdown-wrap__column"><span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li data-value="Услуги" data-sum="400">
                                                    <div class="dropdown-wrap">
                                                        <div class="dropdown-wrap__column">
                                                            <div class="dropdown-value">Услуги 1</div>
                                                        </div>
                                                        <div class="dropdown-wrap__column"><span class="dropdown-sum">от <span class="sum">400</span> ₽</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="calculation-item">
                            <div class="calculation-finish items">
                                <div class="item">
                                    <div class="calculation-result">
                                        <h4>Информация о заказе</h4>
                                        <ul></ul>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="calculation-form">
                                        <form class="default-form" id="formCalculationResult" action="" method="post" enctype="multipart/form-data">
                                            <div class="form-inputs">
                                                <div class="form-input">
                                                    <input class="form-control phone-mask" type="tel" id="calculationResultPhone" placeholder="" name="phone">
                                                    <label class="form-input__label" for="calculationResultPhone"><span>Телефон *</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-checkbox">
                                                <div class="checkbox">
                                                    <input type="checkbox" name="checkbox" id="calculationResultCheck">
                                                    <label for="calculationResultCheck"><span class="checkbox__box"></span>Нажимая на кнопку, вы соглашаетесь с <a href="#">политикой конфиденциальности</a>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-btn">
                                                <button class="btn btn-blue big btn-block"><span class="btn__text"><span>Оставить заявку</span></span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calculation-bottom">
                        <div class="calculation-btn">
                            <button class="btn btn-blue-light big btn-prev" type="button"><span class="btn__text"><span data-text="Назад">Назад</span></span>
                            </button>
                            <button class="btn btn-blue big btn-next" type="button"><span class="btn__text"><span data-text="Далее">Далее</span></span>
                            </button>
                        </div><span class="calculation-sum">Итого: от <span class="sum">0</span> ₽</span>
                    </div>
                </div>
                <div class="adv-box bg_pippin">
                    <div class="adv-info items">
                        <div class="adv-info__column item">
                            <div class="adv-info__left">
                                <a class="logo-link" href="#">
                                    <div class="logo">
                                        <img src="<?= SITE_STYLE_PATH ?>/img/general/logo.svg" alt="">
                                    </div>
                                </a>
                                <div class="more"><a class="more__link" href="#"><span>Подробнее</span>
                                        <svg class="icon__arrow-right" width="24" height="24">
                                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="adv-info__column item">
                            <h3>О компании</h3>
                            <p>Ритуальное агентство «Grand Memoria» поможет Вам наилучшим образом организовать и провести похороны. Нашим специалистам известны христианские и мусульманские обычаи захоронения.</p>
                            <div class="adv-counts items">
                                <div class="adv-counts__item item"><span class="adv-counts__count">5 432</span><span class="adv-counts__desc">Изготовили товаров</span>
                                </div>
                                <div class="adv-counts__item item"><span class="adv-counts__count">1 357</span><span class="adv-counts__desc">Оказанных услуг</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section_padding bg_black-haze questions">
            <div class="content">
                <div class="heading heading_more">
                    <div class="heading__content">
                        <h2>Часто задаваемые вопросы</h2>
                    </div>
                    <div class="more"><a class="more__link" href="#"><span>Подробнее</span>
                            <svg class="icon__arrow-right" width="24" height="24">
                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="accordion-wrap">
                    <div class="accordion box">
                        <div class="box__inner">
                            <div class="accordion-title">
                                <h4>Умер человек – что делать?</h4><span class="label label_small label_marengo">Ритуальные услуги</span><span class="accordion-title__icon">
                                    <svg class="icon__slider-next" width="24" height="24">
                                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-next"></use>
                                    </svg>

                                    <svg class="icon__close-modal" width="24" height="24">
                                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#close-modal"></use>
                                    </svg>
                                </span>
                            </div>
                            <div class="accordion-content">
                                <div class="accordion-article">
                                    <p>Выбрать похоронное агентство, которое будет заниматься погребением, решить, хоронить ли традиционным способом или прибегнуть к кремации, в последнем случае предстоит также выбрать крематорий, определиться, где
                                        и каким образом будут проходить поминки, получить пособие, выдаваемого на организацию похорон.</p>
                                    <p>После того, как врачом была констатирована смерть, родственникам следует связаться со службой, которая предоставляет ритуальные услуги. Важно, чтобы организация была проверенная, имела большой опыт работы и
                                        хорошую репутацию.</p>
                                    <h5>В такой ситуации важно четко придерживаться следующего алгоритма действий.</h5>
                                    <ol>
                                        <li>Прежде всего необходимо связаться с сотрудниками правоохранительных органов (позвонить либо по номеру 02, либо 102), вызвать скорую помощь (набрать или 03 или 103), которые констатируют факт смерти и подтвердят,
                                            что смерть не носила насильственного характера.</li>
                                        <li>До приезда сотрудников экстренных служб следует найти и держать наготове паспорт умершего и его ОМС, а также паспорта всех, кто находился рядом с покойным на момент его кончины.</li>
                                        <li>Позвонить службу, специализирующуюся на организации и проведении похорон, и вызвать агента. Например, сделать это можно, воспользовавшись телефоном диспетчерской службы ИП «Гранд–Мемориа» <a href="tel:8 (843) 558-00-82">8 (843) 558-00-82</a>,
                                            которая работает круглосуточно.</li>
                                    </ol>
                                    <h5>Ссылки по теме:</h5>
                                    <div class="article-links">
                                        <div class="article-links__item">
                                            <a class="article-link" href="#">
                                                <svg class="icon__link-next" width="24" height="24">
                                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#link-next"></use>
                                                </svg>
                                                <span>Контакты</span>
                                            </a>
                                        </div>
                                        <div class="article-links__item">
                                            <a class="article-link" href="#">
                                                <svg class="icon__link-next" width="24" height="24">
                                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#link-next"></use>
                                                </svg>
                                                <span>Организация похорон</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion box">
                        <div class="box__inner">
                            <div class="accordion-title">
                                <h4>Что такое ручная гравировка?</h4><span class="label label_small label_marengo">Ритуальные услуги</span><span class="accordion-title__icon">
                                    <svg class="icon__slider-next" width="24" height="24">
                                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-next"></use>
                                    </svg>

                                    <svg class="icon__close-modal" width="24" height="24">
                                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#close-modal"></use>
                                    </svg>
                                </span>
                            </div>
                            <div class="accordion-content">
                                <div class="accordion-article">
                                    <p>На вечерние мероприятия</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion box">
                        <div class="box__inner">
                            <div class="accordion-title">
                                <h4>Осталось у покойного задолженность, как быть родственникам?</h4><span class="label label_small label_marengo">Ритуальные услуги</span><span class="accordion-title__icon">
                                    <svg class="icon__slider-next" width="24" height="24">
                                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-next"></use>
                                    </svg>

                                    <svg class="icon__close-modal" width="24" height="24">
                                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#close-modal"></use>
                                    </svg>
                                </span>
                            </div>
                            <div class="accordion-content">
                                <div class="accordion-article">
                                    <p>На вечерние мероприятия</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="questions-info"><a class="btn btn-red big" href="#" data-toggle="modal" data-target="#modalQuestion"><span class="btn__text"><span data-text="Задать вопрос">Задать вопрос</span></span></a>
                    <div class="questions-info__content">
                        <h5>Не нашли ответ?</h5>
                        <p>Напишите нам, мы всегда на связи</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="feedback">
            <div class="content">
                <div class="feedback-wrap">
                    <div class="feedback-title">
                        <div class="feedback-title__inner">
                            <div class="heading">
                                <h3>Получите бесплатную консультацию, если Вам нужна помощь</h3>
                            </div>
                            <p>Заполните форму и мы Вам обязательно поможем!</p>
                        </div>
                    </div>
                    <div class="feedback-form">
                        <form class="default-form" id="formFeedback" action="" method="post" enctype="multipart/form-data">
                            <div class="form-inputs">
                                <div class="form-input">
                                    <input class="form-control" id="feedbackName" placeholder="" name="name">
                                    <label class="form-input__label" for="feedbackName"><span>Ваше имя *</span>
                                    </label>
                                </div>
                                <div class="form-input">
                                    <input class="form-control phone-mask" type="tel" id="feedbackPhone" placeholder="" name="phone">
                                    <label class="form-input__label" for="feedbackPhone"><span>Телефон *</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-checkbox">
                                <div class="checkbox">
                                    <input type="checkbox" name="checkbox" id="feedbackCheck">
                                    <label for="feedbackCheck"><span class="checkbox__box"></span>Нажимая на кнопку, вы соглашаетесь с <a href="#">политикой конфиденциальности</a>
                                    </label>
                                </div>
                            </div>
                            <div class="form-btn">
                                <button class="btn btn-blue big btn-block"><span class="btn__text"><span>Оставить заявку</span></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>