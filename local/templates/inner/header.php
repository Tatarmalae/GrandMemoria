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
        <?php if($_SERVER['REAL_FILE_PATH'] === '/services/index.php' || CSite::InDir('/info/wholesale/index.php') ):?>
            <div class="cover">
                <?php $APPLICATION->ShowViewContent('cover__bg'); ?>
                <div class="cover-wrap">
                    <div class="cover-inner">
                        <div class="cover-content">
                            <?php $APPLICATION->IncludeComponent(
                                "bitrix:breadcrumb",
                                "breadcrumbs_white", [
                                    "START_FROM" => "0",
                                    "PATH" => "",
                                    "SITE_ID" => "s1",
                                ]
                            ); ?>
                            <h1><?php $APPLICATION->ShowTitle() ?></h1>
                            <?php $APPLICATION->ShowViewContent('cover__anons'); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="title<?php $APPLICATION->ShowViewContent('no_bg'); ?>">
                <div class="title-bg">
                    <div class="content">
                        <img class="lazy" src="" data-src="<?= SITE_STYLE_PATH ?>/img/content/title/bg.svg" alt="<?= SITE_SERVER_NAME ?>">
                    </div>
                </div>
                <div class="content">
                    <?php if(!CSite::InDir('/search/')): ?>
                        <?php $APPLICATION->IncludeComponent(
                            "bitrix:breadcrumb",
                            "breadcrumbs", [
                                "START_FROM" => "0",
                                "PATH" => "",
                                "SITE_ID" => "s1",
                            ]
                        ); ?>
                    <?php endif ?>
                    <h1><?php $APPLICATION->ShowTitle() ?></h1>
                    <?php $APPLICATION->ShowViewContent('after_title'); ?>
                </div>
            </div>
        <?php endif ?>
        <section>
            <?php $APPLICATION->ShowViewContent('before_parent_sect'); ?>
            <div class="content">