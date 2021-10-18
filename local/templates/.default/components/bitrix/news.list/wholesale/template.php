<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Config\Option;

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
<?php $this->SetViewTarget('cover__bg') ?>
<div class="cover__bg" style="background-image: url(<?= $arResult['PREVIEW_PICTURE']['SRC'] ?>)"></div>
<?php $this->EndViewTarget() ?>

<?php $this->SetViewTarget('cover__anons') ?>
<p><?= $arResult['PREVIEW_TEXT'] ?></p>
<div class="more-btn">
    <a class="btn btn-blue big" href="#" data-toggle="modal" data-target="#modalCommunication">
        <span class="btn__text">
            <span data-text="Получить консультацию">Оставить заявку</span>
        </span>
    </a>
</div>
<?php $this->EndViewTarget() ?>

<article>
    <?= $arResult['DETAIL_TEXT'] ?>
    <div class="banner-box bg_glitter">
        <div class="banner-bg">
            <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/banner/4.svg" alt="banner" src="">
        </div>
        <div class="banner-inner">
            <div class="banner-content">
                <h3>Продажа гранита и мрамора оптом</h3>
                <p>По всем вопросам приобретения, Вам поможет Мишин Виталий</p>
                <div class="more-btn">
                    <a class="btn btn-blue big" href="#" data-toggle="modal" data-target="#modalCommunication">
                        <span class="btn__text">
                            <span data-text="Оставить заявку">Оставить заявку</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</article>

<?php $this->SetViewTarget('after_parent_sect'); ?>

<section class="contacts">
    <div class="content">
        <div class="contacts-delivery items">
            <div class="contacts-delivery__item item">
                <div class="contacts-delivery__item-img img">
                    <div class="img__inner object-fit">
                        <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/contacts/delivery/1.jpg" alt="" src="">
                    </div>
                </div>
            </div>
            <div class="contacts-delivery__item item">
                <div class="contacts-delivery__item-img img">
                    <div class="img__inner object-fit">
                        <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/contacts/delivery/2.jpg" alt="" src="">
                    </div>
                </div>
            </div>
            <div class="contacts-delivery__item item">
                <div class="contacts-delivery__item-img img">
                    <div class="img__inner object-fit">
                        <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/contacts/delivery/3.jpg" alt="" src="">
                    </div>
                </div>
            </div>
        </div>
        <?php if (!empty($arResult['PROPERTIES']['CONTACTS_TITLE']['VALUE'])): ?>
            <div class="contacts-cite box">
                <div class="box__inner">
                    <h3><?= $arResult['PROPERTIES']['CONTACTS_TITLE']['VALUE'] ?></h3>
                </div>
            </div>
        <?php endif ?>
        <?php if (!empty($arResult['PROPERTIES']['PHONE']['VALUE']) || !empty($arResult['PROPERTIES']['EMAIL']['VALUE'])): ?>
            <div class="contacts-items items">
                <?php if (!empty($arResult['PROPERTIES']['PHONE']['VALUE'])): ?>
                    <div class="contacts-item item">
                        <div class="contacts-info bg_glitter">
                            <div class="contacts-info__bg">
                                <img class="lazy" src="" data-src="<?= SITE_STYLE_PATH ?>/img/content/contacts/bg-1.svg" alt="">
                            </div>
                            <div class="contacts-info__content">
                                <span><?= $arResult['PROPERTIES']['PHONE']['NAME'] ?></span>
                                <a href="tel:+<?= preg_replace('~\D+~', '', $arResult['PROPERTIES']['PHONE']['VALUE']) ?>">
                                    <?= $arResult['PROPERTIES']['PHONE']['VALUE'] ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
                <?php if (!empty($arResult['PROPERTIES']['EMAIL']['VALUE'])): ?>
                    <div class="contacts-item item">
                        <div class="contacts-info bg_pippin">
                            <div class="contacts-info__bg">
                                <img class="lazy" src="" data-src="<?= SITE_STYLE_PATH ?>/img/content/contacts/bg-2.svg" alt="">
                            </div>
                            <div class="contacts-info__content">
                                <span><?= $arResult['PROPERTIES']['EMAIL']['NAME'] ?></span>
                                <a href="mailto:<?= $arResult['PROPERTIES']['EMAIL']['VALUE'] ?>">
                                    <?= $arResult['PROPERTIES']['EMAIL']['VALUE'] ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif ?>
            </div>
        <?php endif ?>
    </div>
</section>

<?php if (!empty($arResult['PROPERTIES']['PHOTO']['VALUE'])): ?>
    <section class="section_padding section_black-haze gallery">
        <div class="content">
            <div class="heading">
                <div class="heading__content">
                    <h2>Склад с гранитными и мраморными плитами</h2>
                </div>
            </div>
            <div class="gallery-items items">
                <?php foreach ($arResult['PROPERTIES']['PHOTO']['VALUE'] as $photo): ?>
                    <a class="gallery-item item" href="#" data-fancybox="gallery" data-options="{&quot;src&quot; : &quot;<?= CFile::GetPath($photo) ?>&quot;}">
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
                                <img class="lazy" data-src="<?= CFile::GetPath($photo) ?>" alt="" src="">
                            </div>
                        </div>
                    </a>
                <?php endforeach ?>
            </div>
        </div>
    </section>
<?php endif ?>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/feedback_form.php", [], ["SHOW_BORDER" => true]); ?>

<?php $this->EndViewTarget(); ?>
