<?php
/**
 * @var $APPLICATION
 */

use Bitrix\Main\Localization\Loc,
    Bitrix\Main\Page\Asset;

Loc::loadMessages(__FILE__);
/*META*/
Asset::getInstance()->addString('<meta charset="UTF-8">', true, 'BEFORE_CSS');
Asset::getInstance()->addString('<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1, minimum-scale=1" charset="utf-8">', true, 'BEFORE_CSS');
Asset::getInstance()->addString('<meta http-equiv="X-UA-Compatible" content="ie=edge">', true, 'BEFORE_CSS');
Asset::getInstance()->addString('<meta name="format-detection" content="telephone=no">', true, 'BEFORE_CSS');
Asset::getInstance()->addString('<meta name="HandheldFriendly" content="True">', true, 'BEFORE_CSS');
Asset::getInstance()->addString('<meta name="theme-color" content="#ffffff">', true, 'BEFORE_CSS');
Asset::getInstance()->addString('<meta name="msapplication-navbutton-color" content="#ffffff">', true, 'BEFORE_CSS');
Asset::getInstance()->addString('<meta name="apple-mobile-web-app-status-bar-style" content="#ffffff">', true, 'BEFORE_CSS');
/*FAVICON*/
Asset::getInstance()->addString('<link rel="icon" type="image/x-icon" href="/favicon.ico">', true, 'BEFORE_CSS');
Asset::getInstance()->addString('<link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">', true, 'BEFORE_CSS');
Asset::getInstance()->addString('<link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">', true, 'BEFORE_CSS');
Asset::getInstance()->addString('<link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">', true, 'BEFORE_CSS');
Asset::getInstance()->addString('<link rel="mask-icon" href="/favicon/safari-pinned-tab.svg" color="#FFF">', true, 'BEFORE_CSS');
Asset::getInstance()->addString('<link rel="manifest" href="/site.webmanifest" color="#FFF">', true, 'BEFORE_CSS');
/*FONTS*/
Asset::getInstance()->addString('<link rel="preconnect" href="https://fonts.gstatic.com">', true, 'BEFORE_CSS');
Asset::getInstance()->addString('<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&amp;display=swap" rel="stylesheet">', true, 'BEFORE_CSS');
/*CSS*/
Asset::getInstance()->addCss(SITE_STYLE_PATH . "/css/main.min.css", true);
Asset::getInstance()->addCss(SITE_STYLE_PATH . "/css/backend.css", true);
/*JS*/
Asset::getInstance()->addJs(SITE_STYLE_PATH . "/js/separate-js/jquery.min.js");
Asset::getInstance()->addJs(SITE_STYLE_PATH . "/js/main.min.js");
Asset::getInstance()->addJs(SITE_STYLE_PATH . "/js/backend.js");
// if (!CSite::InDir('/catalog/')) {
    $curPage = $APPLICATION->GetCurPage(false);
    $canonical = $_SERVER["REQUEST_SCHEME"] . '://' . $_SERVER["HTTP_HOST"] . $curPage;
    Asset::getInstance()->addString('<link rel="canonical" href="' . $canonical . '" />');
// }
?>
<style>
    .layer,
    .megamenu {
        display: none;
    }

    .wow {
        visibility: hidden;
    }
</style>
<title><?php $APPLICATION->ShowTitle() ?></title>