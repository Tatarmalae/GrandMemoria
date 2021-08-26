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

<div class="about-top items">
    <div class="about-top__column item">
        <a class="logo-link" href="<?= SITE_DIR ?>">
            <div class="logo">
                <img src="<?= SITE_STYLE_PATH ?>/img/general/logo.svg" alt="<?= SITE_SERVER_NAME ?>">
            </div>
        </a>
    </div>
    <?php if (!empty($arResult['SECTION']['DESCRIPTION'])): ?>
        <div class="about-top__column item">
            <div class="about-top__content">
                <?= $arResult['SECTION']['DESCRIPTION'] ?>
            </div>
        </div>
    <?php endif ?>
</div>

<?php if (!empty($arResult['ITEMS'])): ?>
    <div class="about-adv">
        <div class="about-items items">
            <?php foreach ($arResult['ITEMS'] as $item): ?>
                <div class="about-item item">
                    <div class="box">
                        <div class="about-item__inner">
                            <div class="about-item__column">
                                <?php if (!empty($item['PREVIEW_TEXT'])): ?>
                                    <span class="about-item__label"><?= $item['PREVIEW_TEXT'] ?></span>
                                <?php endif ?>
                                <?php if (!empty($item['DETAIL_TEXT'])): ?>
                                    <span class="about-item__count"><?= $item['DETAIL_TEXT'] ?></span>
                                <?php endif ?>
                            </div>
                            <div class="about-item__column">
                                <p><?= $item['NAME'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
<?php endif ?>

<?php $this->SetViewTarget('after_parent_sect'); ?>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/components/directory.php", [], ["SHOW_BORDER" => true]); ?>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/components/team.php", [], ["SHOW_BORDER" => true]); ?>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/components/info.php", ['IBLOCK_ID' => 20], ["SHOW_BORDER" => true]); ?>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/components/history.php", [], ["SHOW_BORDER" => true]); ?>

<section class="article">
    <div class="content">
        <article>
            <h2>Собственное производство</h2>
            <p>Наше предназначение – помогать не только заказчикам, но и сотрудникам. Наше стремление к лидерству на рынке позволяет улучшать условия для всей команды.</p>
            <div class="gallery">
                <div class="gallery-items items">
                    <a class="gallery-item item" href="javascript:;" data-fancybox="gallery" data-options="{&quot;src&quot; : &quot;<?= SITE_STYLE_PATH ?>/img/content/gallery/3.jpg&quot;}">
                        <div class="gallery-item__img img img-1by1">
                            <div class="gallery__zoom">
                                <div class="gallery__zoom-inner">
                                    <svg class="icon__search" width="14" height="14">
                                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#search"></use>
                                    </svg>
                                    <span>Смотреть</span>
                                </div>
                            </div>
                            <div class="img__inner object-fit">
                                <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/gallery/3.jpg" alt="">
                            </div>
                        </div>
                    </a>
                    <a class="gallery-item item" href="javascript:;" data-fancybox="gallery" data-options="{&quot;src&quot; : &quot;<?= SITE_STYLE_PATH ?>/img/content/gallery/4.jpg&quot;}">
                        <div class="gallery-item__img img img-1by1">
                            <div class="gallery__zoom">
                                <div class="gallery__zoom-inner">
                                    <svg class="icon__search" width="14" height="14">
                                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#search"></use>
                                    </svg>
                                    <span>Смотреть</span>
                                </div>
                            </div>
                            <div class="img__inner object-fit">
                                <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/gallery/4.jpg" alt="">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </article>
    </div>
</section>
<section class="section_padding section_black-haze gallery">
    <div class="content">
        <div class="heading">
            <div class="heading__content">
                <h2>Галерея</h2>
            </div>
        </div>
        <div class="gallery-items items">
            <div class="swiper-container base-slider" data-count="2">
                <div class="slider-wrap swiper-wrapper">
                    <div class="slider-slide swiper-slide">
                        <a class="gallery-item item" href="#" data-toggle="modal" data-target="#modalGallery">
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
                                    <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/gallery/5.jpg" alt="">
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="slider-slide swiper-slide">
                        <a class="gallery-item item" href="#" data-toggle="modal" data-target="#modalGallery">
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
                                    <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/gallery/6.jpg" alt="">
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="slider-slide swiper-slide">
                        <a class="gallery-item item" href="#" data-toggle="modal" data-target="#modalGallery">
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
                                    <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/gallery/5.jpg" alt="">
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

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/address.php", ['TITLE' => 'Наши адреса'], ["SHOW_BORDER" => true]); ?>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/components/docs.php", [], ["SHOW_BORDER" => true]); ?>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/callback_banner.php", [], ["SHOW_BORDER" => true]); ?>

<?php $this->EndViewTarget(); ?>
