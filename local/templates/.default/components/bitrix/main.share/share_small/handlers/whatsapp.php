<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

__IncludeLang(dirname(__FILE__) . "/lang/" . LANGUAGE_ID . "/whatsapp.php");
$name = "whatsapp";
$title = GetMessage("BOOKMARK_HANDLER_WHATSAPP");
$icon_url_template = "
<a
	href=\"whatsapp://send?text=#PAGE_TITLE_UTF_ENCODED# #PAGE_URL_ENCODED#\"
	target=\"_blank\"
	class=\"socials-icons__item whatsapp\"
	title=\"" . $title . "\"
><svg class=\"icon__whatsapp\" width=\"24\" height=\"24\">
    <use xlink:href=\"/local/styles/img/general/svg-symbols.svg#whatsapp\"></use>
</svg></a>\n";
$sort = 300;