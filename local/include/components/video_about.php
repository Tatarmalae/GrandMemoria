<?php

use Bitrix\Main\Diag\Debug;
use Dev\Catalog;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var $arResult
 * @var $arParams
 * @var $APPLICATION
 */

try {
    $arResult['IBLOCK'] = Catalog::getIBlock(43);
    $arResult['ITEMS'] = Catalog::getElementList(43);
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}
if (count($arResult['ITEMS']) == 0) return;
?>
<section class="video-block">
    <div class="content">
        <div class="heading">
            <div class="heading__content">
                <h2><?= $arResult['IBLOCK']['NAME'] ?></h2>
            </div>
        </div>
        <div class="video-items items" data-type="slider">
            <div class="swiper-container base-slider" data-count="2">
                <div class="slider-wrap swiper-wrapper">
                    <?php foreach ($arResult['ITEMS'] as $item): ?>
                        <?php
                        //Получение превью для видео youtube
                        $url = '';
                        $resolutions = [
                            'maxresdefault',
                            'sddefault',
                            'mqdefault',
                            'hqdefault',
                            'default',
                        ];
                        foreach ($resolutions as $key => $resolution) {
                            $url = 'https://img.youtube.com/vi/' . $item['PROPERTIES']['YOUTUBE']['VALUE'] . '/' . $resolution . '.jpg';
                            if (get_headers($url)[0] == 'HTTP/1.1 200 OK') {
                                break;
                            }
                        }
                        $item['PROPERTIES']['YOUTUBE']['PREVIEW_IMAGE'] = $url;
                        ?>
                        <div class="slider-slide swiper-slide">
                            <div class="video-item item">
                                <div class="video">
                                    <a class="video-play object-fit" href="#" data-options="{&quot;src&quot;:&quot;https://www.youtube.com/watch?v=<?= $item['PROPERTIES']['YOUTUBE']['VALUE'] ?>&quot;}" data-fancybox="gallery">
                                        <img class="lazy anim" data-src="<?= $item['PROPERTIES']['YOUTUBE']['PREVIEW_IMAGE'] ?>" alt="<?= $item['NAME'] ?>" src="">
                                        <span class="video-play__icon">
                                            <svg width="90" height="54" viewBox="0 0 120 84" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_547_879)">
                                                    <path d="M117.501 13.1509C116.815 10.6102 115.475 8.29366 113.613 6.43291C111.751 4.57216 109.434 3.23231 106.892 2.54725C97.5272 1.90735e-06 60 0 60 0C60 0 22.463 9.53674e-07 13.1182 2.50776C10.5705 3.19442 8.24862 4.5396 6.38623 6.40796C4.52383 8.27632 3.18659 10.602 2.50905 13.1509C-6.4373e-06 22.5007 0 42.0197 0 42.0197C0 42.0197 -6.4373e-06 61.5388 2.50905 70.8886C3.19265 73.4302 4.53258 75.7477 6.39458 77.6087C8.25657 79.4698 10.5752 80.809 13.1182 81.4922C22.4728 84 60 84 60 84C60 84 97.537 84 106.892 81.4922C109.434 80.8072 111.751 79.4673 113.613 77.6066C115.475 75.7458 116.815 73.4293 117.501 70.8886C120 61.5388 120 42.0197 120 42.0197C120 42.0197 119.97 22.5007 117.501 13.1509Z" fill="#FF0000"/>
                                                    <path d="M48 60L79 42L48 24V60Z" fill="white"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_547_879">
                                                        <rect width="120" height="84" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
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