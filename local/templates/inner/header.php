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
        <div class="title<?php $APPLICATION->ShowViewContent('no_bg'); ?>">
            <div class="title-bg">
                <div class="content">
                    <img class="lazy" src="" data-src="<?= SITE_STYLE_PATH ?>/img/content/title/bg.svg" alt="<?= SITE_SERVER_NAME ?>">
                </div>
            </div>
            <div class="content">
                <?php $APPLICATION->IncludeComponent(
                    "bitrix:breadcrumb",
                    "breadcrumbs", [
                        "START_FROM" => "0",
                        "PATH" => "",
                        "SITE_ID" => "s1",
                    ]
                ); ?>
                <h1><?php $APPLICATION->ShowTitle() ?></h1>
            </div>
        </div>
        <section>
            <?php $APPLICATION->ShowViewContent('categories'); ?>
            <div class="content">