<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

__IncludeLang(dirname(__FILE__) . "/lang/" . LANGUAGE_ID . "/link.php");
$name = "link";
$title = GetMessage("BOOKMARK_HANDLER_LINK");
$icon_url_template = "
<script>
    function Copy() 
        {
          navigator.clipboard.writeText('#PAGE_URL#');
        }
</script>
<a
	href=\"javascript:void(0);\"
	class=\"socials-icons__item link\"
	title=\"" . $title . "\"
	onclick=\"Copy();\"
><svg class=\"icon__link\" width=\"24\" height=\"24\">
    <use xlink:href=\"/local/styles/img/general/svg-symbols.svg#link\"></use>
</svg></a>\n";
$sort = 10;