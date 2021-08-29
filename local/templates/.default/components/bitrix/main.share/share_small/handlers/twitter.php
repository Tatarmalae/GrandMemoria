<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $arParams
 * @var $arResult
 */

__IncludeLang(dirname(__FILE__) . "/lang/" . LANGUAGE_ID . "/twitter.php");
$name = "twitter";
$title = GetMessage("BOOKMARK_HANDLER_TWITTER");

if (
    is_array($arParams)
    && array_key_exists("SHORTEN_URL_LOGIN", $arParams)
    && strlen(trim($arParams["SHORTEN_URL_LOGIN"])) > 0
    && array_key_exists("SHORTEN_URL_KEY", $arParams)
    && strlen(trim($arParams["SHORTEN_URL_KEY"])) > 0
) {
    $icon_url_template = "
	<script>
		if (typeof window['twitter_click_" . $arResult["COUNTER"] . "'] != 'function')
		{
			function twitter_click_" . $arResult["COUNTER"] . "(longUrl)
			{
				BX.loadScript('https://bit.ly/javascript-api.js?version=latest&login=" . $arParams["SHORTEN_URL_LOGIN"] . "&apiKey=" . $arParams["SHORTEN_URL_KEY"] . "',
					function ()
					{
						BitlyClient.shorten(longUrl, '__get_shorten_url_twitter_" . $arResult["COUNTER"] . "');
					}
				);
				return false;
			}
		}
		function __get_shorten_url_twitter_" . $arResult["COUNTER"] . "(data)
		{
			var first_result;
			var shortUrl;
			for (var r in data.results)
			{
				first_result = data.results[r];
				break;
			}
			if (first_result != null)
			{
				shortUrl = first_result.shortUrl.toString();
			}
			window.open('https://twitter.com/home/?status='+encodeURIComponent(shortUrl)+encodeURIComponent(' #PAGE_TITLE#'),'','toolbar=0,status=0,width=711,height=437');
		}
	</script>
	<a
		href=\"https://twitter.com/home/?status=#PAGE_URL#+#PAGE_TITLE_ORIG#\"
		onclick=\"return twitter_click_" . $arResult["COUNTER"] . "('#PAGE_URL#');\"
		target=\"_blank\"
		class=\"socials-icons__item twitter\"
		title=\"" . $title . "\"
	><svg class=\"icon__twitter\" width=\"18\" height=\"14\">
        <use xlink:href=\"/local/styles/img/general/svg-symbols.svg#twitter\"></use>
    </svg></a>\n";
} else {
    $icon_url_template = "
	<a
		href=\"https://twitter.com/home/?status=#PAGE_URL_ENCODED#+#PAGE_TITLE_UTF_ENCODED#\"
		onclick=\"window.open(this.href,'','toolbar=0,status=0,width=711,height=437');return false;\"
		target=\"_blank\"
		class=\"socials-icons__item twitter\"
		title=\"" . $title . "\"
	><svg class=\"icon__twitter\" width=\"18\" height=\"14\">
        <use xlink:href=\"/local/styles/img/general/svg-symbols.svg#twitter\"></use>
    </svg></a>\n";
}
$sort = 100;
$charsBack = true;