<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

__IncludeLang(dirname(__FILE__) . "/lang/" . LANGUAGE_ID . "/telegram.php");
$name = "telegram";
$title = GetMessage("BOOKMARK_HANDLER_TELEGRAM");
$icon_url_template = "
<a
	href=\"https://telegram.me/share/url?url=#PAGE_URL_ENCODED#&text=#PAGE_TITLE_UTF_ENCODED#\"
	target=\"_blank\"
	class=\"socials-icons__item telegram\"
	title=\"" . $title . "\"
><svg class=\"icon__telegram\" width=\"24\" height=\"24\">
    <use xlink:href=\"/local/styles/img/general/svg-symbols.svg#telegram\"></use>
</svg></a>\n";
$sort = 200;