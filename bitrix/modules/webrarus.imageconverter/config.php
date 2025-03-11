<?php

declare(strict_types=1);

use \Bitrix\Main\Localization\Loc;

IncludeModuleLangFile(__FILE__);

return [
    [
        'DIV'     => 'edit1',
        'TAB'     => Loc::getMessage('RIM_MODULE_SETTINGS_TITLE'),
        'TITLE'   => Loc::getMessage('RIM_MODULE_SETTINGS_TITLE'),
        'OPTIONS' => [
            Loc::getMessage('RIM_MODULE_SETTINGS_GROUP_COMMON'),
            [
                'rim_convert_allowed',
                Loc::getMessage('RIM_MODULE_SETTING_ALLOWED'),
                '',
                [
                    'checkbox',
                ]
            ],
            [
                'rim_convert_fields',
                Loc::getMessage('RIM_MODULE_SETTING_CONVERT_FIELDS'),
                '',
                [
                    'checkbox'
                ]
            ],
            [
                'rim_convert_props',
                Loc::getMessage('RIM_MODULE_SETTING_CONVERT_PROPS'),
                '',
                [
                    'checkbox'
                ]
            ],
            [
                'rim_convert_section_fields',
                Loc::getMessage('RIM_MODULE_SETTING_CONVERT_SECTION_FIELDS'),
                '',
                [
                    'checkbox'
                ]
            ],
            Loc::getMessage('RIM_MODULE_SETTINGS_GROUP_CONVERT'),
            [
                'rim_convert_quality_jpeg',
                Loc::getMessage('RIM_MODULE_SETTINGS_OPTION_QUALITY_JPEG'),
                '',
                [
                    'text',
                    1,
                ]
            ],
            [
                'rim_convert_quality_png',
                Loc::getMessage('RIM_MODULE_SETTINGS_OPTION_QUALITY_PNG'),
                '',
                [
                    'text',
                    1,
                ]
            ]
        ]
    ]
];
