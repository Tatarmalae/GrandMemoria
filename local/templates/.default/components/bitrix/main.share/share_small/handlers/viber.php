<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

__IncludeLang(dirname(__FILE__) . "/lang/" . LANGUAGE_ID . "/viber.php");
$name = "viber";
$title = GetMessage("BOOKMARK_HANDLER_VIBER");
$icon_url_template = "
<a
	href=\"viber://forward?text=#PAGE_TITLE# #PAGE_URL_ENCODED#\"
	target=\"_blank\"
	class=\"socials-icons__item viber\"
	title=\"" . $title . "\"
><svg class=\"icon__viber\" width=\"20\" height=\"20\">
    <use xlink:href=\"/local/styles/img/general/svg-symbols.svg#viber\"></use>
</svg></a>\n";
$sort = 100;