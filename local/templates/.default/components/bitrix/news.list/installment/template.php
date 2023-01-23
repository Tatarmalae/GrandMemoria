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
                <span class="h4"><?= $element['NAME'] ?></span>
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
                            <span class="h4"><?= $element['NAME'] ?></span>
                            <p><?= $element['PREVIEW_TEXT'] ?></p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
<?php endif ?>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/installment_banner.php", [], ["SHOW_BORDER" => true]); ?>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/calculator_installment.php", [], ["SHOW_BORDER" => true]); ?>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/address.php", ['TITLE' => 'Оформить из офиса'], ["SHOW_BORDER" => true]); ?>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/feedback_form.php", [], ["SHOW_BORDER" => true]); ?>

<?php $this->EndViewTarget(); ?>
