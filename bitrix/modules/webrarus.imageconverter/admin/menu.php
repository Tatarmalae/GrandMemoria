<?php

declare(strict_types=1);

use \Bitrix\Main\Localization\Loc;

IncludeModuleLangFile(__FILE__);

// Add menu into settings page
$aMenu = [
    'parent_menu' => 'global_menu_settings',
    'sort'        => 1,
    'text'        => Loc::getMessage('RIM_INSTALL_NAME'),
    'title'       => Loc::getMessage('RIM_INSTALL_NAME'),
    'icon'        => 'sys_menu_icon',
    'page_icon'   => 'sys_page_icon',
    'items_id'    => 'menu_rim',
    'items'       => [
        [
            'text'  => Loc::getMessage('RIM_DASHBOARD_TITLE'),
            'title' => Loc::getMessage('RIM_DASHBOARD_TITLE'),
            'url'   => 'rim_converter_index.php?convert=future&lang=' . LANGUAGE_ID,
            'sort'  => 100
        ],
        [
            'text'  => Loc::getMessage('RIM_CONVERT_EXIST_ELEMENTS'),
            'title' => Loc::getMessage('RIM_CONVERT_EXIST_ELEMENTS'),
            'url'   => 'rim_converter_index.php?convert=exist&lang=' . LANGUAGE_ID,
            'sort'  => 200
        ],
        [
            'text'  => Loc::getMessage('RIM_SETTINGS_MODULE'),
            'title' => Loc::getMessage('RIM_SETTINGS_MODULE'),
            'url'   => '/bitrix/admin/settings.php?mid=webrarus.imageconverter&lang=' . LANGUAGE_ID,
            'sort'  => 300
        ]
    ]
];

return $aMenu;
