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

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/components/article.php", [], ["SHOW_BORDER" => true]); ?>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/components/gallery.php", [], ["SHOW_BORDER" => true]); ?>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/address.php", ['TITLE' => 'Наши адреса'], ["SHOW_BORDER" => true]); ?>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/components/docs.php", [], ["SHOW_BORDER" => true]); ?>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/callback_banner.php", [], ["SHOW_BORDER" => true]); ?>

<?php $this->EndViewTarget(); ?>
