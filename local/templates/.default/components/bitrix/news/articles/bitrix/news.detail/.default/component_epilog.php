<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @global $APPLICATION
 */

use Bitrix\Main\Application;

if (!empty($arResult['SOCIAL_PICTURE'])) {
    $request = Application::getInstance()->getContext()->getRequest();
    $ogImageUrl = ($request->isHttps()) ? "https://" : "http://";
    $ogImageUrl .= $request->getHttpHost();
    $ogImageUrl .= $arResult['SOCIAL_PICTURE']['src'];
    $APPLICATION->SetPageProperty('og_image', $ogImageUrl);
}