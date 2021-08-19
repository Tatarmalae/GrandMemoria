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
<?php $ElementID = $APPLICATION->IncludeComponent(
    "bitrix:news.detail",
    "",
    [
        "DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
        "DISPLAY_NAME" => $arParams["DISPLAY_NAME"],
        "DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
        "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
        "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "FIELD_CODE" => $arParams["DETAIL_FIELD_CODE"],
        "PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
        "DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["detail"],
        "SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
        "META_KEYWORDS" => $arParams["META_KEYWORDS"],
        "META_DESCRIPTION" => $arParams["META_DESCRIPTION"],
        "BROWSER_TITLE" => $arParams["BROWSER_TITLE"],
        "SET_CANONICAL_URL" => $arParams["DETAIL_SET_CANONICAL_URL"],
        "DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
        "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
        "SET_TITLE" => $arParams["SET_TITLE"],
        "MESSAGE_404" => $arParams["MESSAGE_404"],
        "SET_STATUS_404" => $arParams["SET_STATUS_404"],
        "SHOW_404" => $arParams["SHOW_404"],
        "FILE_404" => $arParams["FILE_404"],
        "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
        "ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
        "ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
        "USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
        "GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
        "DISPLAY_TOP_PAGER" => $arParams["DETAIL_DISPLAY_TOP_PAGER"],
        "DISPLAY_BOTTOM_PAGER" => $arParams["DETAIL_DISPLAY_BOTTOM_PAGER"],
        "PAGER_TITLE" => $arParams["DETAIL_PAGER_TITLE"],
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => $arParams["DETAIL_PAGER_TEMPLATE"],
        "PAGER_SHOW_ALL" => $arParams["DETAIL_PAGER_SHOW_ALL"],
        "CHECK_DATES" => $arParams["CHECK_DATES"],
        "ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
        "ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
        "SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
        "SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
        "IBLOCK_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["news"],
        "USE_SHARE" => $arParams["USE_SHARE"],
        "SHARE_HIDE" => $arParams["SHARE_HIDE"],
        "SHARE_TEMPLATE" => $arParams["SHARE_TEMPLATE"],
        "SHARE_HANDLERS" => $arParams["SHARE_HANDLERS"],
        "SHARE_SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
        "SHARE_SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
        "ADD_ELEMENT_CHAIN" => (isset($arParams["ADD_ELEMENT_CHAIN"]) ? $arParams["ADD_ELEMENT_CHAIN"] : ''),
        'STRICT_SECTION_CHECK' => (isset($arParams['STRICT_SECTION_CHECK']) ? $arParams['STRICT_SECTION_CHECK'] : ''),
    ],
    $component
); ?>
<?php $this->SetViewTarget('after_parent_sect') ?>
<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/adv.php", [], ["SHOW_BORDER" => true]); ?>
    <section class="section_padding bg_black-haze stock">
        <div class="content">
            <div class="heading">
                <div class="heading__content">
                    <h2>Акции</h2>
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
                                    <div class="stock-item__content">
                                        <span class="label label_small label_marengo">Выгодные предложения</span>
                                        <h4>
                                            <a href="#">Организация похорон участников, инвалидов и ветеранов ВОВ</a>
                                        </h4>
                                        <ul>
                                            <li>– Федеральная программа</li>
                                            <li>– Быстрые переводы</li>
                                            <li>– Пакет документов</li>
                                        </ul>
                                        <div class="more-btn">
                                            <a class="btn btn-blue big btn-block" href="#">
                                                <span class="btn__text"><span data-text="Посмотреть">Посмотреть</span></span>
                                            </a>
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
                                    <div class="stock-item__content">
                                        <span class="label label_small label_marengo">Выгодные предложения</span>
                                        <h4>
                                            <a href="#">Организация похорон круглосуточно, по цене от 4 800 ₽</a>
                                        </h4>
                                        <ul>
                                            <li>– Федеральная программа</li>
                                            <li>– Быстрые переводы</li>
                                            <li>– Пакет документов</li>
                                        </ul>
                                        <div class="more-btn">
                                            <a class="btn btn-blue big btn-block" href="#">
                                                <span class="btn__text"><span data-text="Посмотреть">Посмотреть</span></span>
                                            </a>
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
                                    <div class="stock-item__content">
                                        <span class="label label_small label_marengo">Выгодные предложения</span>
                                        <h4>
                                            <a href="#">Организация похорон участников, инвалидов и ветеранов ВОВ</a>
                                        </h4>
                                        <ul>
                                            <li>– Федеральная программа</li>
                                            <li>– Быстрые переводы</li>
                                            <li>– Пакет документов</li>
                                        </ul>
                                        <div class="more-btn">
                                            <a class="btn btn-blue big btn-block" href="#">
                                                <span class="btn__text"><span data-text="Посмотреть">Посмотреть</span></span>
                                            </a>
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
    <section class="gallery">
        <div class="content">
            <div class="heading">
                <div class="heading__content">
                    <h2>Наши работы</h2>
                </div>
            </div>
            <div class="gallery-items items">
                <div class="swiper-container base-slider" data-count="2">
                    <div class="slider-wrap swiper-wrapper">
                        <div class="slider-slide swiper-slide">
                            <a class="gallery-item item" href="javascript:;" data-fancybox="gallery" data-options="{&quot;src&quot; : &quot;<?= SITE_STYLE_PATH ?>/img/content/gallery/1.jpg&quot;}">
                                <div class="gallery-item__img img img-16by9">
                                    <div class="gallery__zoom">
                                        <div class="gallery__zoom-inner">
                                            <svg class="icon__search" width="14" height="14">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#search"></use>
                                            </svg>
                                            <span>Смотреть</span>
                                        </div>
                                    </div>
                                    <div class="img__inner object-fit">
                                        <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/gallery/1.jpg" alt="">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="slider-slide swiper-slide">
                            <a class="gallery-item item" href="javascript:;" data-fancybox="gallery" data-options="{&quot;src&quot; : &quot;<?= SITE_STYLE_PATH ?>/img/content/gallery/2.jpg&quot;}">
                                <div class="gallery-item__img img img-16by9">
                                    <div class="gallery__zoom">
                                        <div class="gallery__zoom-inner">
                                            <svg class="icon__search" width="14" height="14">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#search"></use>
                                            </svg>
                                            <span>Смотреть</span>
                                        </div>
                                    </div>
                                    <div class="img__inner object-fit">
                                        <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/gallery/2.jpg" alt="">
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="slider-slide swiper-slide">
                            <a class="gallery-item item" href="javascript:;" data-fancybox="gallery" data-options="{&quot;src&quot; : &quot;<?= SITE_STYLE_PATH ?>/img/content/gallery/1.jpg&quot;}">
                                <div class="gallery-item__img img img-16by9">
                                    <div class="gallery__zoom">
                                        <div class="gallery__zoom-inner">
                                            <svg class="icon__search" width="14" height="14">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#search"></use>
                                            </svg>
                                            <span>Смотреть</span>
                                        </div>
                                    </div>
                                    <div class="img__inner object-fit">
                                        <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/gallery/1.jpg" alt="">
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
    <section class="section_padding section_glitter services">
        <div class="content">
            <div class="heading">
                <div class="heading__content">
                    <h2>Другие услуги</h2>
                </div>
            </div>
            <div class="services-items items" data-type="line">
                <a class="services-item item link-item" href="#">
                    <div class="box">
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
                            <div class="more-btn">
                                <button class="slider-btn slider-btn_next" type="button">
                                    <svg class="icon__slider-next" width="32" height="32">
                                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-next"></use>
                                    </svg>

                                </button>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="services-item item link-item" href="#">
                    <div class="box">
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
                            <div class="more-btn">
                                <button class="slider-btn slider-btn_next" type="button">
                                    <svg class="icon__slider-next" width="32" height="32">
                                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-next"></use>
                                    </svg>

                                </button>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="services-item item link-item" href="#">
                    <div class="box">
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
                            <div class="more-btn">
                                <button class="slider-btn slider-btn_next" type="button">
                                    <svg class="icon__slider-next" width="32" height="32">
                                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-next"></use>
                                    </svg>

                                </button>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="services-item item link-item" href="#">
                    <div class="box">
                        <div class="services-item__img img">
                            <div class="img__inner object-fit">
                                <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/services/7.jpg" alt="">
                            </div>
                        </div>
                        <div class="services-item__content">
                            <h4>Услуги священнослужите…</h4>
                            <div class="price price_small">
                                <span class="price-now">от 1 000 ₽</span>
                            </div>
                            <div class="more-btn">
                                <button class="slider-btn slider-btn_next" type="button">
                                    <svg class="icon__slider-next" width="32" height="32">
                                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-next"></use>
                                    </svg>

                                </button>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
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
                        <div class="slider-slide swiper-slide">
                            <div class="reviews-item item">
                                <div class="box">
                                    <div class="reviews-item__top">
                                        <div class="reviews-item__top-info">
                                            <h4>Зиля</h4>
                                            <time datetime="27.01.2021">27.01.2021</time>
                                        </div>
                                        <span class="label label_small label_marengo">Памятники</span>
                                    </div>
                                    <div class="reviews-item__content">
                                        <p>Огромная благодарность вашей команде, Роману Евгеньевичу и Рамису. Оперативно организовали в день обращения междугороднюю перевозку, помогли прово…</p>
                                    </div>
                                    <div class="reviews-item__bottom">
                                        <div class="more">
                                            <a class="more__link" href="#">
                                                <span>Читать целиком</span>
                                                <svg class="icon__arrow-right" width="24" height="24">
                                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                                                </svg>
                                            </a>
                                        </div>
                                        <a class="logo-link" href="#">
                                            <div class="logo">
                                                <img src="<?= SITE_STYLE_PATH ?>/img/general/logo.svg" alt="">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slider-slide swiper-slide">
                            <div class="reviews-item item">
                                <div class="box">
                                    <div class="reviews-item__top">
                                        <div class="reviews-item__top-info">
                                            <h4>Елена</h4>
                                            <time datetime="07.01.2021">07.01.2021</time>
                                        </div>
                                        <span class="label label_small label_marengo">Ограды</span>
                                    </div>
                                    <div class="reviews-item__content">
                                        <p>Хочу выразить свою благодарность Петухову Андрею за чуткое, душевное отношение. Очень приятно осознавать что рядом есть те, кто от души готов помоч…</p>
                                    </div>
                                    <div class="reviews-item__bottom">
                                        <div class="more">
                                            <a class="more__link" href="#">
                                                <span>Читать целиком</span>
                                                <svg class="icon__arrow-right" width="24" height="24">
                                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                                                </svg>
                                            </a>
                                        </div>
                                        <a class="logo-link" href="#">
                                            <div class="logo">
                                                <img src="<?= SITE_STYLE_PATH ?>/img/general/logo.svg" alt="">
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slider-slide swiper-slide">
                            <div class="reviews-item item">
                                <div class="box">
                                    <div class="reviews-item__top">
                                        <div class="reviews-item__top-info">
                                            <h4>Зиля</h4>
                                            <time datetime="27.01.2021">27.01.2021</time>
                                        </div>
                                        <span class="label label_small label_marengo">Памятники</span>
                                    </div>
                                    <div class="reviews-item__content">
                                        <p>Огромная благодарность вашей команде, Роману Евгеньевичу и Рамису. Оперативно организовали в день обращения междугороднюю перевозку, помогли прово…</p>
                                    </div>
                                    <div class="reviews-item__bottom">
                                        <div class="more">
                                            <a class="more__link" href="#">
                                                <span>Читать целиком</span>
                                                <svg class="icon__arrow-right" width="24" height="24">
                                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                                                </svg>
                                            </a>
                                        </div>
                                        <a class="logo-link" href="#">
                                            <div class="logo">
                                                <img src="<?= SITE_STYLE_PATH ?>/img/general/logo.svg" alt="">
                                            </div>
                                        </a>
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
                                <label class="form-input__label" for="feedbackName">
                                    <span>Ваше имя *</span>
                                </label>
                            </div>
                            <div class="form-input">
                                <input class="form-control phone-mask" type="tel" id="feedbackPhone" placeholder="" name="phone">
                                <label class="form-input__label" for="feedbackPhone">
                                    <span>Телефон *</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-checkbox">
                            <div class="checkbox">
                                <input type="checkbox" name="checkbox" id="feedbackCheck">
                                <label for="feedbackCheck">
                                    <span class="checkbox__box"></span>
                                    Нажимая на кнопку, вы соглашаетесь с
                                    <a href="#">политикой конфиденциальности</a>
                                </label>
                            </div>
                        </div>
                        <div class="form-btn">
                            <button class="btn btn-blue big btn-block">
                                <span class="btn__text"><span>Оставить заявку</span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="section_padding bg_black-haze questions">
        <div class="content">
            <div class="heading heading_more">
                <div class="heading__content">
                    <h2>Вопросы и ответы по услугам</h2>
                </div>
                <div class="more">
                    <a class="more__link" href="#">
                        <span>Подробнее</span>
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
                            <h4>Умер человек – что делать?</h4>
                            <span class="label label_small label_marengo">Ритуальные услуги</span>
                            <span class="accordion-title__icon">
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
                                        что смерть не носила насильственного характера.
                                    </li>
                                    <li>До приезда сотрудников экстренных служб следует найти и держать наготове паспорт умершего и его ОМС, а также паспорта всех, кто находился рядом с покойным на момент его кончины.</li>
                                    <li>Позвонить службу, специализирующуюся на организации и проведении похорон, и вызвать агента. Например, сделать это можно, воспользовавшись телефоном диспетчерской службы ИП «Гранд–Мемориа»
                                        <a href="tel:8 (843) 558-00-82">8 (843) 558-00-82</a>
                                        ,
                                        которая работает круглосуточно.
                                    </li>
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
                            <h4>Что такое ручная гравировка?</h4>
                            <span class="label label_small label_marengo">Ритуальные услуги</span>
                            <span class="accordion-title__icon">
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
                            <h4>Осталось у покойного задолженность, как быть родственникам?</h4>
                            <span class="label label_small label_marengo">Ритуальные услуги</span>
                            <span class="accordion-title__icon">
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
            <div class="questions-info">
                <a class="btn btn-red big" href="#">
                    <span class="btn__text"><span data-text="Задать вопрос">Задать вопрос</span></span>
                </a>
                <div class="questions-info__content">
                    <h5>Не нашли ответ?</h5>
                    <p>Напишите нам, мы всегда на связи</p>
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
                    <div class="calculation-top__info">
                        <span>Прогресс заполнения</span>
                        <span>1/5</span>
                    </div>
                    <div class="calculation-line">
                        <div class="calculation-line__inner" style="width:20%;"></div>
                    </div>
                </div>
                <div class="calculation-content">
                    <div class="calculation-item calculation-item_active">
                        <h4>Расчет стоимости похорон</h4>
                        <div class="calculation-radio">
                            <div class="calculation-radio__wrap">
                                <div class="radio">
                                    <input type="radio" name="radio" id="calculationCheck1_1">
                                    <label for="calculationCheck1_1">
                                        <span class="radio__box"></span>
                                        Захоронение</label>
                                    <div class="radio-bg"></div>
                                </div>
                            </div>
                            <div class="calculation-radio__wrap">
                                <div class="radio">
                                    <input type="radio" name="radio" id="calculationCheck1_2">
                                    <label for="calculationCheck1_2">
                                        <span class="radio__box"></span>
                                        Кремация</label>
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
                                        <input type="hidden" value="Не выбран">
                                        <div class="dropdown-label" id="calculationDrop2_1" data-toggle="dropdown" aria-expanded="false">
                                            <svg class="icon__arrow-drop" width="32" height="32">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                            </svg>

                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-hint">Выбрать вид</div>
                                                    <div class="dropdown-value" data-value="Не выбран">Не выбран</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от 0 ₽</span>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="dropdown-menu" aria-labelledby="calculationDrop2_1">
                                            <li data-value="Вид 1">Вид 1</li>
                                            <li data-value="Вид 2">Вид 2</li>
                                            <li data-value="Вид 3">Вид 3</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="dropdown dropdown_white dropdown_hint">
                                        <input type="hidden" value="Не выбран">
                                        <div class="dropdown-label" id="calculationDrop2_2" data-toggle="dropdown" aria-expanded="false">
                                            <svg class="icon__arrow-drop" width="32" height="32">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                            </svg>

                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-hint">Похоронный комплект в гроб</div>
                                                    <div class="dropdown-value" data-value="Не выбран">Не выбран</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от 0 ₽</span>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="dropdown-menu" aria-labelledby="calculationDrop2_2">
                                            <li data-value="Похоронный комплект в гроб 1">Похоронный комплект в гроб 1</li>
                                            <li data-value="Похоронный комплект в гроб 2">Похоронный комплект в гроб 2</li>
                                            <li data-value="Похоронный комплект в гроб 3">Похоронный комплект в гроб 3</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="dropdown dropdown_white dropdown_hint">
                                        <input type="hidden" value="Не выбран">
                                        <div class="dropdown-label" id="calculationDrop2_3" data-toggle="dropdown" aria-expanded="false">
                                            <svg class="icon__arrow-drop" width="32" height="32">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                            </svg>

                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-hint">Композиция на крышку гроба</div>
                                                    <div class="dropdown-value" data-value="Не выбран">Не выбран</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от 0 ₽</span>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="dropdown-menu" aria-labelledby="calculationDrop2_3">
                                            <li data-value="Композиция на крышку гроба 1">Композиция на крышку гроба 1</li>
                                            <li data-value="Композиция на крышку гроба 2">Композиция на крышку гроба 2</li>
                                            <li data-value="Композиция на крышку гроба 3">Композиция на крышку гроба 3</li>
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
                                        <input type="hidden" value="Не выбран">
                                        <div class="dropdown-label" id="calculationDrop2_4" data-toggle="dropdown" aria-expanded="false">
                                            <svg class="icon__arrow-drop" width="32" height="32">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                            </svg>

                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-hint">Комплект</div>
                                                    <div class="dropdown-value" data-value="Не выбран">Не выбран</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от 0 ₽</span>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="dropdown-menu" aria-labelledby="calculationDrop2_4">
                                            <li data-value="Комплект 1">Комплект 1</li>
                                            <li data-value="Комплект 2">Комплект 2</li>
                                            <li data-value="Комплект 3">Комплект 3</li>
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
                                        <input type="hidden" value="Не выбран">
                                        <div class="dropdown-label" id="calculationDrop3_1" data-toggle="dropdown" aria-expanded="false">
                                            <svg class="icon__arrow-drop" width="32" height="32">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                            </svg>

                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-hint">Материал, размер</div>
                                                    <div class="dropdown-value" data-value="Не выбран">Не выбран</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от 0 ₽</span>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="dropdown-menu" aria-labelledby="calculationDrop3_1">
                                            <li data-value="Материал, размер 1">Материал, размер 1</li>
                                            <li data-value="Материал, размер 2">Материал, размер 2</li>
                                            <li data-value="Материал, размер 3">Материал, размер 3</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="dropdown dropdown_white dropdown_hint">
                                        <input type="hidden" value="Не выбран">
                                        <div class="dropdown-label" id="calculationDrop3_2" data-toggle="dropdown" aria-expanded="false">
                                            <svg class="icon__arrow-drop" width="32" height="32">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                            </svg>

                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-hint">Траурная лента</div>
                                                    <div class="dropdown-value" data-value="Не выбран">Не выбран</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от 0 ₽</span>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="dropdown-menu" aria-labelledby="calculationDrop3_2">
                                            <li data-value="Траурная лента 1">Траурная лента 1</li>
                                            <li data-value="Траурная лента 2">Траурная лента 2</li>
                                            <li data-value="Траурная лента 3">Траурная лента 3</li>
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
                                        <input type="hidden" value="Не выбран">
                                        <div class="dropdown-label" id="calculationDrop3_3" data-toggle="dropdown" aria-expanded="false">
                                            <svg class="icon__arrow-drop" width="32" height="32">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                            </svg>

                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-hint">Материал</div>
                                                    <div class="dropdown-value" data-value="Не выбран">Не выбран</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от 0 ₽</span>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="dropdown-menu" aria-labelledby="calculationDrop3_3">
                                            <li data-value="Материал 1">Материал 1</li>
                                            <li data-value="Материал 2">Материал 2</li>
                                            <li data-value="Материал 3">Материал 3</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="dropdown dropdown_white dropdown_hint">
                                        <input type="hidden" value="Не выбран">
                                        <div class="dropdown-label" id="calculationDrop3_4" data-toggle="dropdown" aria-expanded="false">
                                            <svg class="icon__arrow-drop" width="32" height="32">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                            </svg>

                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-hint">Табличка на крест</div>
                                                    <div class="dropdown-value" data-value="Не выбран">Не выбран</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от 0 ₽</span>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="dropdown-menu" aria-labelledby="calculationDrop3_4">
                                            <li data-value="Табличка на крест 1">Табличка на крест 1</li>
                                            <li data-value="Табличка на крест 2">Табличка на крест 2</li>
                                            <li data-value="Табличка на крест 3">Табличка на крест 3</li>
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
                                        <input type="hidden" value="Не выбран">
                                        <div class="dropdown-label" id="calculationDrop4_1" data-toggle="dropdown" aria-expanded="false">
                                            <svg class="icon__arrow-drop" width="32" height="32">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                            </svg>

                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-hint">Выбрать вид</div>
                                                    <div class="dropdown-value" data-value="Не выбран">Не выбран</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от 0 ₽</span>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="dropdown-menu" aria-labelledby="calculationDrop4_1">
                                            <li data-value="Вид 1">Вид 1</li>
                                            <li data-value="Вид 2">Вид 2</li>
                                            <li data-value="Вид 3">Вид 3</li>
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
                                        <input type="hidden" value="Не выбран">
                                        <div class="dropdown-label" id="calculationDrop4_2" data-toggle="dropdown" aria-expanded="false">
                                            <svg class="icon__arrow-drop" width="32" height="32">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                            </svg>

                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-hint">Услуги сопроводительной бригады</div>
                                                    <div class="dropdown-value" data-value="Не выбран">Не выбран</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от 0 ₽</span>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="dropdown-menu" aria-labelledby="calculationDrop4_2">
                                            <li data-value="Услуги сопроводительной бригады 1">Услуги сопроводительной бригады 1</li>
                                            <li data-value="Услуги сопроводительной бригады 2">Услуги сопроводительной бригады 2</li>
                                            <li data-value="Услуги сопроводительной бригады 3">Услуги сопроводительной бригады 3</li>
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
                                    <ul>
                                        <li>Процедура:
                                            <span>Захоронение</span>
                                        </li>
                                        <li>Вид гроба:
                                            <span>Не выбрано</span>
                                        </li>
                                        <li>Похоронный комплект в гроб:
                                            <span>Шелковый (постель, подуш…</span>
                                        </li>
                                        <li>Композиция на крышку гроба:
                                            <span>Не выбран</span>
                                        </li>
                                        <li>Комплект одежды для усопшего:
                                            <span>Не выбран</span>
                                        </li>
                                        <li>Материал, размер венка:
                                            <span>Не выбран</span>
                                        </li>
                                        <li>Траурная лента:
                                            <span>Не выбран</span>
                                        </li>
                                        <li>Материал креста:
                                            <span>Не выбран</span>
                                        </li>
                                        <li>Табличка на крест:
                                            <span>Не выбран</span>
                                        </li>
                                        <li>Транспортировка:
                                            <span>Не выбран</span>
                                        </li>
                                        <li>Ритуальный агент:
                                            <span>Не выбран</span>
                                        </li>
                                        <li>Сопроводительная бригада:
                                            <span>Не выбран</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="calculation-form">
                                    <form class="default-form" id="formCalculationResult" action="" method="post" enctype="multipart/form-data">
                                        <div class="form-inputs">
                                            <div class="form-input">
                                                <input class="form-control phone-mask" type="tel" id="calculationResultPhone" placeholder="" name="phone">
                                                <label class="form-input__label" for="calculationResultPhone">
                                                    <span>Телефон *</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-checkbox">
                                            <div class="checkbox">
                                                <input type="checkbox" name="checkbox" id="calculationResultCheck">
                                                <label for="calculationResultCheck">
                                                    <span class="checkbox__box"></span>
                                                    Нажимая на кнопку, вы соглашаетесь с
                                                    <a href="#">политикой конфиденциальности</a>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-btn">
                                            <button class="btn btn-blue big btn-block">
                                                <span class="btn__text"><span>Оставить заявку</span></span>
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
                        <button class="btn btn-blue-light big" type="button">
                            <span class="btn__text"><span data-text="Назад">Назад</span></span>
                        </button>
                        <button class="btn btn-blue big" type="button">
                            <span class="btn__text"><span data-text="Далее">Далее</span></span>
                        </button>
                    </div>
                    <span class="calculation-sum">Итого: от 0 ₽</span>
                </div>
            </div>
        </div>
    </section>
    <section class="article">
        <div class="content">
            <article>
                <h2>Текст под seo</h2>
                <p>Коран призывает готовиться к смерти на протяжении всей жизни, чтобы по ее окончании с легким сердцем принять столь сложное испытание. Особые ритуалы, прописанные в Шариате, начинают выполняться, пока больной человек еще жив.
                    Первым делом приглашают имама — мусульманского священника, чтобы над смертным ложем читался “Калимат-шахадат”. Кроме чтения молитвы, делают следующее:</p>
                <ul>
                    <li>Умирающего укладывают на спину ногами к Мекке, что олицетворяет путь души.</li>
                    <li>Нужно помочь страждущему справиться с жаждой, дав глоток холодной воды. По возможности капают в рот гранатовый сок или Зам-Зам - священную воду.</li>
                </ul>
            </article>
        </div>
    </section>
<?php $this->EndViewTarget() ?>