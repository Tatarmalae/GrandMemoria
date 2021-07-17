<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');
global $APPLICATION;
$APPLICATION->RestartBuffer();
include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/urlrewrite.php');
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404", "Y");
@define("404", true);
require($_SERVER["DOCUMENT_ROOT"] . "/local/templates/404/header.php");
$APPLICATION->SetTitle("Ошибка 404");
?>
    <span class="label c-telegray">Ошибка 404</span>
    <h1 class="nfp__title">Ой! Похоже страница, которую вы ищете,
        <span>не найдена</span>
    </h1>
    <p class="nfp__text">У нас ещё много интересных страниц, попробуйте начать с главной</p>
    <a class="btn btn_md btn_default" href="<?= (CMain::IsHTTPS()) ? "https://" : "http://" ?><?= SITE_SERVER_NAME ?>" data-hover="на главную">
        <span>на главную</span>
    </a>
<?php require($_SERVER["DOCUMENT_ROOT"] . "/local/templates/404/footer.php"); ?>
<?php die(); ?>