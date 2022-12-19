<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
/**
 * @var $APPLICATION
 */
$APPLICATION->SetTitle("Поиск по сайту");

use Bitrix\Main\Application;

$request = Application::getInstance()->getContext()->getRequest();
if ($request->isAjaxRequest()) $APPLICATION->RestartBuffer();
?>
<?php $APPLICATION->IncludeComponent(
	"bitrix:search.page", 
	"search", 
	array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DEFAULT_SORT" => "date",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FILTER_NAME" => "",
		"NO_WORD_LOGIC" => "Y",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "pager",
		"PAGER_TITLE" => "Поиск по сайту",
		"PAGE_RESULT_COUNT" => "5",
		"RESTART" => "N",
		"SHOW_WHEN" => "N",
		"SHOW_WHERE" => "N",
		"USE_LANGUAGE_GUESS" => "N",
		"USE_SUGGEST" => "N",
		"USE_TITLE_RANK" => "Y",
		"arrFILTER" => array(
			0 => "iblock_catalog",
			1 => "iblock_info",
			2 => "iblock_content",
		),
		"arrFILTER_iblock_content" => array(
			0 => "14",
			1 => "15",
		),
		"arrFILTER_iblock_info" => array(
			0 => "11",
		),
		"arrWHERE" => "",
		"COMPONENT_TEMPLATE" => "search",
		"arrFILTER_iblock_catalog" => array(
			0 => "12",
		)
	),
	false
); ?>
<?php unset($arrFilterReviews) ?>
<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>