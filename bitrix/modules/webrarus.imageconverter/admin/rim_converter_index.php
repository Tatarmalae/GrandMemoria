<?php

use Bitrix\Main\Application;
use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;

/**
 * @global $APPLICATION CMain
 */

global $APPLICATION;

require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_admin_before.php');

Loc::loadLanguageFile(__FILE__);

$request = Application::getInstance()->getContext()->getRequest();

const MODULE_NAME = 'webrarus.imageconverter';

if (!Loader::includeModule(MODULE_NAME)) {
    return false;
}

if ($APPLICATION->GetGroupRight(MODULE_NAME) == 'D') {
    return false;
}

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_admin_after.php');

$currentPage = '';

$param = (string)$request->get('convert');
switch ($param) {
    case 'exist':
        $currentPage = '/forms/rim_converter_exist_elements.php';
        break;
    default:
        $currentPage = '/forms/rim_converter_dashboard.php';
        break;
}

include __DIR__ . $currentPage;

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/epilog_admin.php');
