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

<?php if (!empty($arResult[0]['ELEMENTS'])): ?>
    <div class="installment-items items">
        <?php foreach ($arResult[0]['ELEMENTS'] as $element): ?>
            <div class="installment-item item">
                <?php if ($element['PROPERTIES']['VALUE']['VALUE'] !== ''): ?>
                    <span class="installment-item__count">
                        <big><?= $element['PROPERTIES']['VALUE']['VALUE'] ?></big> <?= $element['PROPERTIES']['VALUE']['DESCRIPTION'] ?>
                    </span>
                <?php endif ?>
                <h4><?= $element['NAME'] ?></h4>
                <p><?= $element['DETAIL_TEXT'] ?></p>
            </div>
        <?php endforeach ?>
    </div>
<?php endif ?>

<?php $this->SetViewTarget('after_parent_sect'); ?>

<?php if (!empty($arResult[1]['ELEMENTS'])): ?>
    <section class="section_padding section_black-haze information">
        <div class="content">
            <div class="heading">
                <div class="heading__content">
                    <h2><?= $arResult[1]['NAME'] ?></h2>
                </div>
            </div>
            <div class="information-items items">
                <?php foreach ($arResult[1]['ELEMENTS'] as $element): ?>
                    <div class="information-item item">
                        <div class="box">
                            <?php if (!empty($element['PROPERTIES']['ICO']['VALUE'])): ?>
                                <div class="information-item__icon">
                                    <img src="<?= CFile::GetPath($element['PROPERTIES']['ICO']['VALUE']) ?>" alt="ico">
                                </div>
                            <?php endif ?>
                            <h4><?= $element['NAME'] ?></h4>
                            <p><?= $element['PREVIEW_TEXT'] ?></p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
<?php endif ?>

<div class="banner">
    <div class="content">
        <div class="banner-box bg_pippin">
            <div class="banner-bg">
                <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/banner/1.svg" alt="" src="">
            </div>
            <div class="banner-inner">
                <div class="banner-content">
                    <h3>Расчет рассрочки на приобретение памятника</h3>
                    <p>Для вашего удобства мы предлагаем рассчитать рассрочку на срок от 2 до 12 месяцев</p>
                    <div class="more-btn">
                        <a class="btn btn-red big" href="#" data-toggle="modal" data-target="#modalCommunication">
                            <?php //TODO: какая модалка должна открываться ?>
                            <span class="btn__text">
                                <span data-text="Оставить заявку">Оставить заявку</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/calculator_installment.php", [], ["SHOW_BORDER" => true]); ?>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/address.php", ['TITLE' => 'Оформить из офиса'], ["SHOW_BORDER" => true]); ?>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/feedback_form.php", [], ["SHOW_BORDER" => true]); ?>

<?php $this->EndViewTarget(); ?>
