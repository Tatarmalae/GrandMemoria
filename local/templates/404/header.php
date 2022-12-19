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
    <?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/scripts_head.php", [], ["SHOW_BORDER" => false]); ?>
</head>
<body>
<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/scripts_after_body.php", [], ["SHOW_BORDER" => false]); ?>
<div id="panel"><?php $APPLICATION->ShowPanel(); ?></div>
<div class="main-wrapper">
    <?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/header.php", [], ["SHOW_BORDER" => false]); ?>
    <div class="container">