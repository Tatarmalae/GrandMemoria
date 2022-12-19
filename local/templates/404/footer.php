<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $APPLICATION
 */
?>
</div>
<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/footer.php", [], ["SHOW_BORDER" => false]); ?>
</div>
<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/popup.php", [], ["SHOW_BORDER" => false]); ?>
<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/button_mobile.php", [], ["SHOW_BORDER" => false]); ?>
<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/scripts_before_body.php", [], ["SHOW_BORDER" => false]); ?>
</body>
</html>