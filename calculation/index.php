<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
/**
 * @var $APPLICATION
 */
$APPLICATION->SetTitle("Расчет похорон");
$APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/calculation.php", [], ["SHOW_BORDER" => true]);
?>

<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>