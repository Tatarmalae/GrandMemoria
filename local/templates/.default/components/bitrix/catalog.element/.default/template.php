<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

use Dev\Utilities;

$this->setFrameMode(true);
$this->SetViewTarget('no_bg');
echo ' title_not-bg';
$this->EndViewTarget();
$APPLICATION->SetTitle('Какой-то заголовок (старый)');
?>

<?php $this->SetViewTarget('after_title'); ?>
<div class="product-head">
    <div class="product-head__column">
        <div class="label-wrap">
            <?php if ($arResult['PROPERTIES']['NEW']['VALUE']): ?>
                <span class="label label_small label_bg label_fiery-rose">
                    Новинки
                </span>
            <?php endif ?>
            <?php if (!empty($arResult['PROPERTIES']['OLD_PRICE']['VALUE'])): ?>
                <span class="label label_small label_bg label_fiery-rose">
                    -<?= ceil((($arResult['PROPERTIES']['OLD_PRICE']['VALUE'] - $arResult['PROPERTIES']['PRICE']['VALUE']) * 100) / $arResult['PROPERTIES']['OLD_PRICE']['VALUE']); ?>%
                </span>
            <?php endif ?>
        </div>
        <span class="product-head__count">
            Товар заказали
            <?= Utilities::getWord(rand(200, 500), [
                'раз',
                'раза',
                'раз',
            ]) ?>
        </span>
    </div>
    <div class="product-head__column">
        <span class="share">
            <svg class="icon__share" width="24" height="24">
                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#share"></use>
            </svg>
            <span>Поделиться</span>
            <noindex>
                <span class="share-tooltip">
                    <span class="socials socials_small">
                        <?php
                        $APPLICATION->IncludeComponent(
                            "bitrix:main.share",
                            'share_small',
                            [
                                "HANDLERS" => [
                                    // 0 => "ok",
                                    // 1 => "twitter",
                                    // 2 => "facebook",
                                    3 => "whatsapp",
                                    4 => "telegram",
                                    5 => "viber",
                                    6 => "vk",
                                    7 => "link",
                                ],
                                "PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
                                "PAGE_TITLE" => $arResult["~NAME"],
                            ],
                            $component,
                            ["HIDE_ICONS" => "Y"]
                        ); ?>
                    </span>
                </span>
            </noindex>
        </span>
    </div>
</div>
<?php $this->EndViewTarget(); ?>

<div class="product-column">
    <div class="product-gallery">
        <div class="product-gallery__big">
            <div class="swiper-container product-slider" data-type="big">
                <div class="product-gallery__big-wrapper swiper-wrapper">
                    <?php
                    $thumbFirst = CFile::ResizeImageGet($arResult['PREVIEW_PICTURE']['ID'], [
                        'width' => 800,
                        'height' => 800,
                    ], BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true, []);
                    ?>
                    <div class="product-gallery__big-slide swiper-slide">
                        <a class="product-gallery__big-img img img-1by1" href="#" data-fancybox="galleryCard" data-options="{&quot;src&quot;:&quot;<?= $arResult['DETAIL_PICTURE']['SRC'] ?>&quot;}">
                            <div class="product-gallery__zoom">
                                <div class="product-gallery__zoom-inner">
                                    <svg class="icon__search" width="14" height="14">
                                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#search"></use>
                                    </svg>
                                    <span>Смотреть</span>
                                </div>
                            </div>
                            <div class="img__inner object-fit">
                                <img class="lazy" data-src="<?= $thumbFirst['src'] ?>" alt="<?= $arResult['NAME'] ?>" src="">
                            </div>
                        </a>
                    </div>
                    <?php if (!empty($arResult['PROPERTIES']['PHOTO']['VALUE'])): ?>
                        <?php foreach ($arResult['PROPERTIES']['PHOTO']['VALUE'] as $photo): ?>
                            <?php
                            $thumbSecond = CFile::ResizeImageGet($photo, [
                                'width' => 800,
                                'height' => 800,
                            ], BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true, []);
                            ?>
                            <div class="product-gallery__big-slide swiper-slide">
                                <a class="product-gallery__big-img img img-1by1" href="#" data-fancybox="galleryCard" data-options="{&quot;src&quot;:&quot;<?= CFile::GetPath($photo) ?>&quot;}">
                                    <div class="product-gallery__zoom">
                                        <div class="product-gallery__zoom-inner">
                                            <svg class="icon__search" width="14" height="14">
                                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#search"></use>
                                            </svg>
                                            <span>Смотреть</span>
                                        </div>
                                    </div>
                                    <div class="img__inner object-fit">
                                        <img class="lazy" data-src="<?= $thumbSecond['src'] ?>" alt="<?= $arResult['NAME'] ?>" src="">
                                    </div>
                                </a>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                    <?php if ($arParams['YOUTUBE']): ?>
                        <?php foreach ($arParams['YOUTUBE'] as $youtube): ?>
                            <div class="product-gallery__big-slide swiper-slide">
                                <?php /* для ютуба data-options="{&quot;src&quot;:&quot;https://www.youtube.com/watch?v=<?= $youtube ?>&quot;}" */?>
                                <a class="product-gallery__big-img img img-1by1" href="#" data-fancybox="galleryCard" data-options="{&quot;src&quot;:&quot;<?= $youtube ?>&quot;}">
                                    <div class="play__ico">
                                        <svg width="90" height="54" viewBox="0 0 120 84" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_547_879)">
                                                <path d="M117.501 13.1509C116.815 10.6102 115.475 8.29366 113.613 6.43291C111.751 4.57216 109.434 3.23231 106.892 2.54725C97.5272 1.90735e-06 60 0 60 0C60 0 22.463 9.53674e-07 13.1182 2.50776C10.5705 3.19442 8.24862 4.5396 6.38623 6.40796C4.52383 8.27632 3.18659 10.602 2.50905 13.1509C-6.4373e-06 22.5007 0 42.0197 0 42.0197C0 42.0197 -6.4373e-06 61.5388 2.50905 70.8886C3.19265 73.4302 4.53258 75.7477 6.39458 77.6087C8.25657 79.4698 10.5752 80.809 13.1182 81.4922C22.4728 84 60 84 60 84C60 84 97.537 84 106.892 81.4922C109.434 80.8072 111.751 79.4673 113.613 77.6066C115.475 75.7458 116.815 73.4293 117.501 70.8886C120 61.5388 120 42.0197 120 42.0197C120 42.0197 119.97 22.5007 117.501 13.1509Z"
                                                      fill="#00A1E7"/>
                                                <path d="M48 60L79 42L48 24V60Z" fill="white"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_547_879">
                                                    <rect width="120" height="84" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <?php /*<svg width="90" height="54" viewBox="0 0 120 84" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_547_879)">
                                                <path d="M117.501 13.1509C116.815 10.6102 115.475 8.29366 113.613 6.43291C111.751 4.57216 109.434 3.23231 106.892 2.54725C97.5272 1.90735e-06 60 0 60 0C60 0 22.463 9.53674e-07 13.1182 2.50776C10.5705 3.19442 8.24862 4.5396 6.38623 6.40796C4.52383 8.27632 3.18659 10.602 2.50905 13.1509C-6.4373e-06 22.5007 0 42.0197 0 42.0197C0 42.0197 -6.4373e-06 61.5388 2.50905 70.8886C3.19265 73.4302 4.53258 75.7477 6.39458 77.6087C8.25657 79.4698 10.5752 80.809 13.1182 81.4922C22.4728 84 60 84 60 84C60 84 97.537 84 106.892 81.4922C109.434 80.8072 111.751 79.4673 113.613 77.6066C115.475 75.7458 116.815 73.4293 117.501 70.8886C120 61.5388 120 42.0197 120 42.0197C120 42.0197 119.97 22.5007 117.501 13.1509Z" fill="#FF0000"/>
                                                <path d="M48 60L79 42L48 24V60Z" fill="white"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_547_879">
                                                    <rect width="120" height="84" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>*/?>
                                    </div>
                                    <div class="img__inner object-fit">
                                        <img class="lazy" data-src="https://rutube.ru/api/video/<?= basename(trim(parse_url($youtube, PHP_URL_PATH), "/"))?>/thumbnail/?redirect=1" alt="<?= $arResult['NAME'] ?>" src="">
                                        <?php /*<img class="lazy" data-src="https://img.youtube.com/vi/<?= $youtube ?>/sddefault.jpg" alt="<?= $arResult['NAME'] ?>" src="">*/?>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <div class="product-gallery__small">
            <div class="swiper-container product-slider" data-type="small">
                <div class="product-gallery__small-wrapper swiper-wrapper">
                    <div class="product-gallery__small-slide swiper-slide">
                        <div class="product-gallery__small-item">
                            <div class="product-gallery__small-img img img-1by1">
                                <div class="img__inner object-fit">
                                    <img class="lazy" data-src="<?= $thumbFirst['src'] ?>" alt="<?= $arResult['NAME'] ?>" src="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if (!empty($arResult['PROPERTIES']['PHOTO']['VALUE'])): ?>
                        <?php foreach ($arResult['PROPERTIES']['PHOTO']['VALUE'] as $photo): ?>
                            <?php
                            $thumbSecondSmall = CFile::ResizeImageGet($photo, [
                                'width' => 270,
                                'height' => 270,
                            ], BX_RESIZE_IMAGE_PROPORTIONAL_ALT, true, []);
                            ?>
                            <div class="product-gallery__small-slide swiper-slide">
                                <div class="product-gallery__small-item">
                                    <div class="product-gallery__small-img img img-1by1">
                                        <div class="img__inner object-fit">
                                            <img class="lazy" data-src="<?= $thumbSecondSmall['src'] ?>" alt="<?= $arResult['NAME'] ?>" src="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                    <?php if ($arParams['YOUTUBE']): ?>
                        <?php foreach ($arParams['YOUTUBE'] as $youtube): ?>
                            <div class="product-gallery__small-slide swiper-slide">
                                <div class="product-gallery__small-item">
                                    <div class="product-gallery__small-img img img-1by1">
                                        <div class="play__ico">
                                            <svg width="70" height="34" viewBox="0 0 120 84" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_547_879)">
                                                    <path d="M117.501 13.1509C116.815 10.6102 115.475 8.29366 113.613 6.43291C111.751 4.57216 109.434 3.23231 106.892 2.54725C97.5272 1.90735e-06 60 0 60 0C60 0 22.463 9.53674e-07 13.1182 2.50776C10.5705 3.19442 8.24862 4.5396 6.38623 6.40796C4.52383 8.27632 3.18659 10.602 2.50905 13.1509C-6.4373e-06 22.5007 0 42.0197 0 42.0197C0 42.0197 -6.4373e-06 61.5388 2.50905 70.8886C3.19265 73.4302 4.53258 75.7477 6.39458 77.6087C8.25657 79.4698 10.5752 80.809 13.1182 81.4922C22.4728 84 60 84 60 84C60 84 97.537 84 106.892 81.4922C109.434 80.8072 111.751 79.4673 113.613 77.6066C115.475 75.7458 116.815 73.4293 117.501 70.8886C120 61.5388 120 42.0197 120 42.0197C120 42.0197 119.97 22.5007 117.501 13.1509Z"
                                                          fill="#00A1E7"/>
                                                    <path d="M48 60L79 42L48 24V60Z" fill="white"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_547_879">
                                                        <rect width="120" height="84" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <?php /*<svg width="70" height="34" viewBox="0 0 120 84" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_547_879)">
                                                    <path d="M117.501 13.1509C116.815 10.6102 115.475 8.29366 113.613 6.43291C111.751 4.57216 109.434 3.23231 106.892 2.54725C97.5272 1.90735e-06 60 0 60 0C60 0 22.463 9.53674e-07 13.1182 2.50776C10.5705 3.19442 8.24862 4.5396 6.38623 6.40796C4.52383 8.27632 3.18659 10.602 2.50905 13.1509C-6.4373e-06 22.5007 0 42.0197 0 42.0197C0 42.0197 -6.4373e-06 61.5388 2.50905 70.8886C3.19265 73.4302 4.53258 75.7477 6.39458 77.6087C8.25657 79.4698 10.5752 80.809 13.1182 81.4922C22.4728 84 60 84 60 84C60 84 97.537 84 106.892 81.4922C109.434 80.8072 111.751 79.4673 113.613 77.6066C115.475 75.7458 116.815 73.4293 117.501 70.8886C120 61.5388 120 42.0197 120 42.0197C120 42.0197 119.97 22.5007 117.501 13.1509Z" fill="#FF0000"/>
                                                    <path d="M48 60L79 42L48 24V60Z" fill="white"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_547_879">
                                                        <rect width="120" height="84" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>*/?>
                                        </div>
                                        <div class="img__inner object-fit">
                                            <img class="lazy" data-src="https://rutube.ru/api/video/<?= basename(trim(parse_url($youtube, PHP_URL_PATH), "/"))?>/thumbnail/?redirect=1" alt="<?= $arResult['NAME'] ?>" src="">
                                            <?php /*<img class="lazy" data-src="https://img.youtube.com/vi/<?= $youtube ?>/sddefault.jpg" alt="<?= $arResult['NAME'] ?>" src="">*/?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-column">
    <div class="product-info box">
        <div class="box__inner">
            <div class="product-info__top">
                <div class="price price_big price_column">
                    <?php if (!empty($arResult['PROPERTIES']['OLD_PRICE']['VALUE'])): ?>
                        <s class="price-old">от
                            <big><?= number_format($arResult['PROPERTIES']['OLD_PRICE']['VALUE'], 0, ' ', ' ') ?></big> ₽
                        </s>
                    <?php endif ?>
                    <span class="price-now">от
                        <big><?= number_format($arResult['PROPERTIES']['PRICE']['VALUE'], 0, ' ', ' ') ?></big> ₽
                    </span>
                </div>
                <span class="label label_small label_fiery-rose">В наличии</span>
            </div>
            <?php if ($arResult['SECTION']['PATH'][0]['ID'] == '15'): ?>
			<small style="display: block;font-size: 100%; color: #fc566a; font-weight: 700;">*– цена указана за форму памятника</small>
                <a class="product-link" href="#" data-toggle="modal" data-target="#modalInstallment" data-theme="<?= $arResult['ID'] ?>">
                    <span>Оформить в рассрочку 0%</span>
                    <svg class="icon__info" width="16" height="16">
                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#info"></use>
                    </svg>
                </a>
            <?php endif ?>
            <div class="product-info__btn">
                <button class="btn btn-blue big btn-block" type="button" data-toggle="modal" data-target="#modalBasket" data-id="<?= $arResult['ID'] ?>">
                    <span class="btn__text">
                        <span data-text="Добавить в корзину">Добавить в корзину</span>
                    </span>
                </button>
                <button class="btn btn-blue-light big btn-block" type="button" data-toggle="modal" data-target="#modalBuyOneClick" data-theme="<?= $arResult['ID'] ?>">
                    <span class="btn__text">
                        <span data-text="Купить в 1 клик">Купить в 1 клик</span>
                    </span>
                </button>
            </div>
        </div>
        <?php /*<div class="product-fixed">
            <div class="product-fixed__inner">
                <div class="product-fixed__content">
                    <span class="h4"><?= $arResult['NAME'] ?></span>
                    <div class="price price_small">
                        <span class="price-now">от
                            <?= number_format($arResult['PROPERTIES']['PRICE']['VALUE'], 0, ' ', ' ') ?> ₽
                        </span>
                        <?php if (!empty($arResult['PROPERTIES']['OLD_PRICE']['VALUE'])): ?>
                            <s class="price-old">от
                                <?= number_format($arResult['PROPERTIES']['OLD_PRICE']['VALUE'], 0, ' ', ' ') ?> ₽
                            </s>
                        <?php endif ?>
                    </div>
                    <?php if ($arResult['SECTION']['PATH'][0]['ID'] == '15'): ?>
                        <small>*– цена указана за форму памятника</small>
                    <?php endif ?>
                </div>
                <button class="btn btn-blue small" type="button" data-toggle="modal" data-target="#modalBasket" data-id="<?= $arResult['ID'] ?>">
                    <span class="btn__text">
                        <span data-text="В корзину">В корзину</span>
                    </span>
                </button>
            </div>
        </div>*/?>
    </div>
    <div class="product-delivery">
        <div class="product-delivery__row">
            <div class="product-delivery__column">
                <span class="h5">Доставка:</span>
                <div class="product-delivery__item">
                    <span class="product-delivery__icon">
                        <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/product/delivery/1.svg" alt="" src="">
                    </span>
                    Самовывоз – Бесплатно
                </div>
                <div class="product-delivery__item">
                    <span class="product-delivery__icon">
                        <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/product/delivery/2.svg" alt="" src="">
                    </span>
                    Доставка – от 1000 ₽
                </div>
            </div>
            <?php if ($arParams['BENEFITS']): ?>
                <div class="product-delivery__column">
                    <span class="h5">Преимущества:</span>
                    <?php foreach ($arParams['BENEFITS'] as $benefit): ?>
                        <div class="product-delivery__item">
                            <?php if (!empty($benefit['PROPERTIES']['ICO']['VALUE'])): ?>
                                <span class="product-delivery__icon">
                                    <img class="lazy" data-src="<?= CFile::GetPath($benefit['PROPERTIES']['ICO']['VALUE']) ?>" alt="<?= $benefit['NAME'] ?>" src="">
                                </span>
                            <?php endif ?>
                            <?= $benefit['NAME'] ?>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
        </div>
    </div>
    <?php if (
        !empty($arResult['DISPLAY_PROPERTIES']) || !empty($arResult['PROPERTIES']['OTHER_CHARS']['VALUE'])
        &&
        !empty($arResult['PROPERTIES']['OTHER_SIZE']['VALUE']) || !empty($arResult['PROPERTIES']['ADDITION']['VALUE'])
    ): ?>
        <div class="product-char box">
            <?php if (!empty($arResult['DISPLAY_PROPERTIES']) || !empty($arResult['PROPERTIES']['OTHER_CHARS']['VALUE'])): ?>
                <div class="product-char__item">
                    <span class="h4">Характеристики товара:</span>
                    <div class="product-char__list">
                        <?php foreach ($arResult['DISPLAY_PROPERTIES'] as $prop): ?>
                            <div class="product-char__list-item">
                                <span><?= $prop['NAME'] ?>:</span>
                                <span><?= is_array($prop['VALUE']) ? implode(', ', $prop['VALUE']) : $prop['VALUE'] ?></span>
                            </div>
                        <?php endforeach ?>
                        <?php foreach ($arResult['PROPERTIES']['OTHER_CHARS']['VALUE'] as $key => $prop): ?>
                            <div class="product-char__list-item">
                                <span><?= $prop ?>:</span>
                                <span><?= $arResult['PROPERTIES']['OTHER_CHARS']['DESCRIPTION'][$key] ?></span>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            <?php endif ?>
            <?php if (!empty($arResult['PROPERTIES']['OTHER_SIZE']['VALUE'])): ?>
                <div class="product-char__item">
                    <span class="h4"><?= $arResult['PROPERTIES']['OTHER_SIZE']['NAME'] ?>:</span>
                    <div class="product-char__list">
                        <?php foreach ($arResult['PROPERTIES']['OTHER_SIZE']['VALUE'] as $size): ?>
                            <div class="product-char__list-item">
                                <span>Размеры (см), Цена (руб):</span>
                                <span><?= $size ?></span>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            <?php endif ?>
            <?php if (!empty($arResult['PROPERTIES']['ADDITION']['VALUE'])): ?>
                <div class="product-char__item">
                    <span class="h4"><?= $arResult['PROPERTIES']['ADDITION']['NAME'] ?>:</span>
                    <div class="product-char__list">
                        <?php foreach ($arResult['PROPERTIES']['ADDITION']['VALUE'] as $key => $addition): ?>
                            <div class="product-char__list-item">
                                <span><?= $addition ?>:</span>
                                <span><?= $arResult['PROPERTIES']['ADDITION']['DESCRIPTION'][$key] ?: 'Есть' ?></span>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            <?php endif ?>
        </div>
    <?php endif ?>
    <div class="product-share">
        <span class="share">
            <svg class="icon__share" width="24" height="24">
                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#share"></use>
            </svg>
            <span>Поделиться</span>
            <span class="share-tooltip">
                <span class="socials socials_small">
                    <?php
                    $APPLICATION->IncludeComponent(
                        "bitrix:main.share",
                        'share_small',
                        [
                            "HANDLERS" => [
                                // 0 => "ok",
                                // 1 => "twitter",
                                // 2 => "facebook",
                                3 => "whatsapp",
                                4 => "telegram",
                                5 => "viber",
                                6 => "vk",
                                7 => "link",
                            ],
                            "PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
                            "PAGE_TITLE" => $arResult["~NAME"],
                        ],
                        $component,
                        ["HIDE_ICONS" => "Y"]
                    ); ?>
                </span>
            </span>
        </span>
    </div>
    <div class="product-back">
        <a class="btn btn-blue big" href="javascript:void(0);" onclick="checkRefer();">
            <span class="btn__arrow">
                <svg class="icon__arrow-right" width="24" height="24">
                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                </svg>
            </span>
            <span class="btn__text">
                <span data-text="Вернуться назад">Вернуться назад</span>
            </span>
        </a>
    </div>
</div>