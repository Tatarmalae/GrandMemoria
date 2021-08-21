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

<?php if ($arResult[0]['ID'] === '27'): ?>
    <?php if (!empty($arResult[0]['ELEMENTS'])): ?>
        <div class="installment-items items">
            <?php foreach ($arResult[0]['ELEMENTS'] as $element): ?>
                <div class="installment-item item">
                    <span class="installment-item__count">
                        <big><?= $element['PROPERTY_VALUE'] ?></big> <?= $element['PROPERTY_DESCRIPTION'] ?>
                    </span>
                    <h4><?= $element['NAME'] ?></h4>
                    <p><?= $element['DETAIL_TEXT'] ?></p>
                </div>
            <?php endforeach ?>
        </div>
    <?php endif ?>
<?php elseif ($arResult[0]['ID'] === '28'): ?>
    <?php if (!empty($arResult[0]['ELEMENTS'])): ?>
        <section class="section_padding section_black-haze information">
            <div class="content">
                <div class="heading">
                    <div class="heading__content">
                        <h2>Условия рассрочки</h2>
                    </div>
                </div>
                <div class="information-items items">
                    <?php foreach ($arResult[0]['ELEMENTS'] as $element): ?>
                        <div class="information-item item">
                            <div class="box">
                                <div class="information-item__icon">
                                    <img src="<?= CFile::GetPath($element['PROPERTY_VALUE']) ?>" alt="ico">
                                </div>
                                <h4><?= $element['NAME'] ?></h4>
                                <p><?= $element['PREVIEW_TEXT'] ?></p>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </section>
    <?php endif ?>
<?php endif ?>



<?php $this->SetViewTarget('after_parent_sect'); ?>

<?php if ($arResult[1]['ID'] === '27'): ?>
    <?php if (!empty($arResult[1]['ELEMENTS'])): ?>
        <div class="installment-items items">
            <?php foreach ($arResult[1]['ELEMENTS'] as $element): ?>
                <div class="installment-item item">
                    <span class="installment-item__count">
                        <big><?= $element['PROPERTY_VALUE'] ?></big> <?= $element['PROPERTY_DESCRIPTION'] ?>
                    </span>
                    <h4><?= $element['NAME'] ?></h4>
                    <p><?= $element['DETAIL_TEXT'] ?></p>
                </div>
            <?php endforeach ?>
        </div>
    <?php endif ?>
<?php elseif ($arResult[1]['ID'] === '28'): ?>
    <?php if (!empty($arResult[1]['ELEMENTS'])): ?>
        <section class="section_padding section_black-haze information">
            <div class="content">
                <div class="heading">
                    <div class="heading__content">
                        <h2>Условия рассрочки</h2>
                    </div>
                </div>
                <div class="information-items items">
                    <?php foreach ($arResult[1]['ELEMENTS'] as $element): ?>
                        <div class="information-item item">
                            <div class="box">
                                <div class="information-item__icon">
                                    <img src="<?= CFile::GetPath($element['PROPERTY_VALUE']) ?>" alt="ico">
                                </div>
                                <h4><?= $element['NAME'] ?></h4>
                                <p><?= $element['PREVIEW_TEXT'] ?></p>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </section>
    <?php endif ?>
<?php endif ?>

<div class="banner">
    <div class="content">
        <div class="banner-box bg_pippin">
            <div class="banner-bg">
                <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/banner/1.svg" alt="">
            </div>
            <div class="banner-inner">
                <div class="banner-content">
                    <h3>Расчет рассрочки на приобретение памятника</h3>
                    <p>Для вашего удобства мы предлагаем рассчитать рассрочку на срок от 2 до 12 месяцев</p>
                    <div class="more-btn">
                        <a class="btn btn-red big" href="#" data-toggle="modal" data-target="#modalCommunication">
                            <span class="btn__text"><span data-text="Оставить заявку">Оставить заявку</span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="section_padding section_glitter calculator">
    <div class="content">
        <div class="heading">
            <div class="heading__content">
                <h2>Калькулятор рассрочки</h2>
            </div>
        </div>
        <div class="calculator-wrap">
            <div class="calculator-items items">
                <div class="calculator-item item">
                    <h4>Рассчитайте сумму рассрочки:</h4>
                    <div class="calculator-slider">
                        <div class="calculator-slider__line">
                            <span class="calculator-slider__line-label">Стоимость памятника</span>
                            <span class="calculator-count"><span class="calc-sum">0</span> руб.</span>
                        </div>
                        <div class="calculator-toggle">
                            <input type="range" min="0" max="40000" step="1" value="10000" id="rangeSum">
                        </div>
                        <div class="calculator-slider__line">
                            <span class="calculator-slider__line-label">40 000 руб.</span>
                        </div>
                    </div>
                    <div class="calculator-slider">
                        <div class="calculator-slider__line">
                            <span class="calculator-slider__line-label">Первоначальный взнос ( от 10% до 60%)</span>
                            <span class="calculator-count"><span class="calc-contribution">0</span> %</span>
                        </div>
                        <div class="calculator-toggle">
                            <input type="range" min="0" max="60" step="1" value="30" id="rangeContribution">
                        </div>
                        <div class="calculator-slider__line">
                            <span class="calculator-slider__line-label">60%</span>
                        </div>
                    </div>
                    <div class="calculator-slider">
                        <div class="calculator-slider__line">
                            <span class="calculator-slider__line-label">Срок рассрочки</span>
                            <span class="calculator-count"><span class="calc-time">0</span> мес.</span>
                        </div>
                        <div class="calculator-toggle">
                            <input type="range" min="0" max="12" step="1" value="6" id="rangeTime">
                        </div>
                        <div class="calculator-slider__line">
                            <span class="calculator-slider__line-label">12 мес.</span>
                        </div>
                    </div>
                </div>
                <div class="calculator-item item">
                    <div class="box">
                        <div class="calculator-info">
                            <div class="calculator-info__line">
                                <div class="items">
                                    <div class="item">
                                        <div class="calculator-info__item">
                                            <span class="calculator-info__item-label">Общая сумма рассрочки:</span>
                                            <span class="calculator-count"><span class="calc-generalSum">0</span> руб.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="calculator-info__line">
                                <div class="items">
                                    <div class="item">
                                        <div class="calculator-info__item">
                                            <span class="calculator-info__item-label">Первый взнос в %:</span>
                                            <span class="calculator-count"><span class="calc-contributionPercent">0</span> %</span>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="calculator-info__item">
                                            <span class="calculator-info__item-label">Первый взнос в ₽:</span>
                                            <span class="calculator-count"><span class="calc-contributionRuble">0</span> руб.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="calculator-info__line">
                                <div class="items">
                                    <div class="item">
                                        <div class="calculator-info__item">
                                            <span class="calculator-info__item-label">Переплата:</span>
                                            <span class="calculator-count"><span class="calc-overpayment">0</span> руб.</span>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="calculator-info__item">
                                            <span class="calculator-info__item-label">Ежемесячный платеж:</span>
                                            <span class="calculator-sum"><span class="calc-payment">0</span> руб.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="more-btn">
                            <button class="btn btn-blue big btn-block" type="button" data-toggle="modal" data-target="#modalInstallmentPlan">
                                <span class="btn__text"><span data-text="Оставить заявку">Оставить заявку</span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="address">
    <div class="content">
        <div class="heading">
            <div class="heading__content">
                <h2>Оформить из офиса</h2>
            </div>
        </div>
        <div class="map-wrap">
            <div class="map-items items">
                <div class="swiper-container base-slider" data-count="4">
                    <div class="slider-wrap swiper-wrapper">
                        <div class="slider-slide swiper-slide">
                            <div class="map-item item">
                                <div class="box">
                                    <h5>Офис №1</h5>
                                    <div class="map-addresses">
                                        <div class="map-address">
                                            <svg class="icon__address" width="14" height="14">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#address"></use>
                                            </svg>
                                            <span class="map-address__desc">ул.Юлиуса Фучика, д.106</span>
                                        </div>
                                        <a class="map-address" href="tel:8 (843) 558-00-82">
                                            <svg class="icon__phone" width="14" height="14">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#phone"></use>
                                            </svg>
                                            <span class="map-address__desc">8 (843) 558-00-82</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slider-slide swiper-slide">
                            <div class="map-item item">
                                <div class="box">
                                    <h5>Офис №2</h5>
                                    <div class="map-addresses">
                                        <div class="map-address">
                                            <svg class="icon__address" width="14" height="14">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#address"></use>
                                            </svg>
                                            <span class="map-address__desc">ул.Юлиуса Фучика, д.106</span>
                                        </div>
                                        <a class="map-address" href="tel:8 (843) 558-00-82">
                                            <svg class="icon__phone" width="14" height="14">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#phone"></use>
                                            </svg>
                                            <span class="map-address__desc">8 (843) 558-00-82</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slider-slide swiper-slide">
                            <div class="map-item item">
                                <div class="box">
                                    <h5>Офис №3</h5>
                                    <div class="map-addresses">
                                        <div class="map-address">
                                            <svg class="icon__address" width="14" height="14">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#address"></use>
                                            </svg>
                                            <span class="map-address__desc">ул.Юлиуса Фучика, д.106</span>
                                        </div>
                                        <a class="map-address" href="tel:8 (843) 558-00-82">
                                            <svg class="icon__phone" width="14" height="14">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#phone"></use>
                                            </svg>
                                            <span class="map-address__desc">8 (843) 558-00-82</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slider-slide swiper-slide">
                            <div class="map-item item">
                                <div class="box">
                                    <h5>Офис №4</h5>
                                    <div class="map-addresses">
                                        <div class="map-address">
                                            <svg class="icon__address" width="14" height="14">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#address"></use>
                                            </svg>
                                            <span class="map-address__desc">ул.Юлиуса Фучика, д.106</span>
                                        </div>
                                        <a class="map-address" href="tel:8 (843) 558-00-82">
                                            <svg class="icon__phone" width="14" height="14">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#phone"></use>
                                            </svg>
                                            <span class="map-address__desc">8 (843) 558-00-82</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slider-slide swiper-slide">
                            <div class="map-item item">
                                <div class="box">
                                    <h5>Офис №5</h5>
                                    <div class="map-addresses">
                                        <div class="map-address">
                                            <svg class="icon__address" width="14" height="14">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#address"></use>
                                            </svg>
                                            <span class="map-address__desc">ул.Юлиуса Фучика, д.106</span>
                                        </div>
                                        <a class="map-address" href="tel:8 (843) 558-00-82">
                                            <svg class="icon__phone" width="14" height="14">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#phone"></use>
                                            </svg>
                                            <span class="map-address__desc">8 (843) 558-00-82</span>
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
            <div class="map">
                <div class="map__inner">
                    <div id="map" data-center="[&quot;55.77270218780455,49.1413778730163&quot;]" data-coordinates="[[&quot;55.77270218780455,49.1413778730163&quot;],[&quot;55.772853377384415,49.137740797592116&quot;],[&quot;55.77321018245791,49.143663115097&quot;],[&quot;55.771504745528674,49.143652386260946&quot;],[&quot;55.77027702645784,49.14019770104976&quot;]]"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/feedback_form.php", [], ["SHOW_BORDER" => true]); ?>

<?php $this->EndViewTarget(); ?>
