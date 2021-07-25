<?php
/**
 * @var $APPLICATION
 */
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Полезная информация");
$APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/info_menu.php", [], ["SHOW_BORDER" => true]);
?>

<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>