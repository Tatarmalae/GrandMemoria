<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

__IncludeLang(dirname(__FILE__) . "/lang/" . LANGUAGE_ID . "/vk.php");
$name = "vk";
$title = GetMessage("BOOKMARK_HANDLER_VK");
$icon_url_template = "
<a
	href=\"https://vk.com/share.php?url=#PAGE_URL_ENCODED#&title=#PAGE_TITLE_UTF_ENCODED#\"
	onclick=\"window.open(this.href,'','toolbar=0,status=0,width=626,height=436');return false;\"
	target=\"_blank\"
	class=\"socials-icons__item vk\"
	title=\"" . $title . "\"
><svg class=\"icon__vk\" width=\"24\" height=\"24\">
    <use xlink:href=\"/local/styles/img/general/svg-symbols.svg#vk\"></use>
</svg></a>\n";
$sort = 50;