<?php

if (class_exists('webrarus_imageconverter')) {
    return;
}

IncludeModuleLangFile(__FILE__);

class webrarus_imageconverter extends CModule
{
    public $MODULE_ID = 'webrarus.imageconverter';
    public $MODULE_VERSION;
    public $MODULE_VERSION_DATE;
    public $MODULE_NAME;
    public $MODULE_DESCRIPTION;
    public $PARTNER_NAME;
    public $PARTNER_URI;

    function __construct()
    {
        $arModuleVersion = [];

        $path = str_replace("\\", '/', __FILE__);
        $path = substr($path, 0, strlen($path) - strlen('/index.php'));
        include($path . '/version.php');

        if (is_array($arModuleVersion) && array_key_exists('VERSION', $arModuleVersion)) {
            $this->MODULE_VERSION = $arModuleVersion['VERSION'];
            $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
            $this->PARTNER_NAME = GetMessage('RIM_PARTNER_NAME');
            $this->PARTNER_URI = 'https://web.rarus-crimea.ru/';
        }

        $this->MODULE_NAME = GetMessage('RIM_INSTALL_NAME');
        $this->MODULE_DESCRIPTION = GetMessage('RIM_INSTALL_DESCRIPTION');
        $this->SHOW_SUPER_ADMIN_GROUP_RIGHTS = 'Y';
        $this->MODULE_GROUP_RIGHTS = 'Y';
    }

    /**
     * @param array $arParams
     *
     * @return bool
     */
    function installDB($arParams = [])
    {
        $errors = null;

        $this->installEvents();

        \Bitrix\Main\ModuleManager::registerModule($this->MODULE_ID);

        $this->setSettings();

        return true;
    }

    function setSettings()
    {
        $defaultOptions = [
            'rim_convert_fields'         => [
                'value' => 'Y',
                'desc'  => ''
            ],
            'rim_convert_props'          => [
                'value' => 'Y',
                'desc'  => ''
            ],
            'rim_convert_section_fields' => [
                'value' => 'Y',
                'desc'  => ''
            ],
            'rim_convert_quality_jpeg'   => [
                'value' => 75,
                'desc'  => ''
            ],
            'rim_convert_quality_png'    => [
                'value' => 85,
                'desc'  => ''
            ]
        ];

        foreach ($defaultOptions as $key => $option) {
            COption::RemoveOption($this->MODULE_ID, $key); // reset old value
            if ($option['value'] != COption::GetOptionString($this->MODULE_ID, $key)) {
                COption::SetOptionString(
                    $this->MODULE_ID,
                    $key,
                    $option['value'],
                    $option['desc']
                );
            }
        }

        return true;
    }

    /**
     * @throws \Bitrix\Main\LoaderException
     * @throws \Bitrix\Main\ArgumentException
     * @throws \Bitrix\Main\ObjectPropertyException
     * @throws \Bitrix\Main\SystemException
     */
    function unInstallDB($arParams = [])
    {
        $this->unInstallEvents();

        \Bitrix\Main\ModuleManager::unRegisterModule($this->MODULE_ID);

        return true;
    }

    /**
     * @return bool
     */
    function installEvents()
    {
        #region Element
        \Bitrix\Main\EventManager::getInstance()->registerEventHandler(
            'iblock',
            'OnAfterIBlockElementAdd',
            $this->MODULE_ID,
            "\\Rarus\\ImageMinify\\Events\\ConvertImagesToWebp",
            'convertElementImages'
        );

        \Bitrix\Main\EventManager::getInstance()->registerEventHandler(
            'iblock',
            'OnAfterIBlockElementUpdate',
            $this->MODULE_ID,
            "\\Rarus\\ImageMinify\\Events\\ConvertImagesToWebp",
            'convertElementImages'
        );
        #endregion

        #region Section
        \Bitrix\Main\EventManager::getInstance()->registerEventHandler(
            'iblock',
            'OnAfterIBlockSectionAdd',
            $this->MODULE_ID,
            "\\Rarus\\ImageMinify\\Events\\ConvertImagesToWebp",
            'convertSectionImage'
        );

        \Bitrix\Main\EventManager::getInstance()->registerEventHandler(
            'iblock',
            'OnAfterIBlockSectionUpdate',
            $this->MODULE_ID,
            "\\Rarus\\ImageMinify\\Events\\ConvertImagesToWebp",
            'convertSectionImage'
        );
        #endregion

        return true;
    }

    /**
     * @return bool
     */
    function unInstallEvents()
    {
        #region Element
        Bitrix\Main\EventManager::getInstance()->unRegisterEventHandler(
            'iblock',
            'OnAfterIBlockElementAdd',
            $this->MODULE_ID,
            "\\Rarus\\ImageMinify\\Events\\ConvertImagesToWebp",
            'convertElementImages'
        );

        \Bitrix\Main\EventManager::getInstance()->unRegisterEventHandler(
            'iblock',
            'OnAfterIBlockElementUpdate',
            $this->MODULE_ID,
            "\\Rarus\\ImageMinify\\Events\\ConvertImagesToWebp",
            'convertElementImages'
        );
        #endregion

        #region Section
        \Bitrix\Main\EventManager::getInstance()->unRegisterEventHandler(
            'iblock',
            'OnAfterIBlockSectionAdd',
            $this->MODULE_ID,
            "\\Rarus\\ImageMinify\\Events\\ConvertImagesToWebp",
            'convertSectionImage'
        );

        \Bitrix\Main\EventManager::getInstance()->unRegisterEventHandler(
            'iblock',
            'OnAfterIBlockSectionUpdate',
            $this->MODULE_ID,
            "\\Rarus\\ImageMinify\\Events\\ConvertImagesToWebp",
            'convertSectionImage'
        );
        #endregion

        return true;
    }

    /**
     * @param array $arParams
     *
     * @return bool
     */
    function installFiles($arParams = [])
    {
        // Add admin pages
        CopyDirFiles(
            __DIR__ . '/admin/',
            $_SERVER['DOCUMENT_ROOT'] . '/bitrix/admin/',
            true,
            true
        );

        return true;
    }

    /**
     * @param array $arParams
     *
     * @return bool
     */
    function unInstallFiles($arParams = [])
    {
        // @todo delete /bitrix/admin/rim_converter_index.php
        return true;
    }

    function DoInstall()
    {
        global $DOCUMENT_ROOT, $APPLICATION, $step;
        $step = (int)$step;

        if ($step < 2) {
            $APPLICATION->IncludeAdminFile(
                GetMessage('RIM_INSTALL_TITLE'),
                __DIR__ . '/step1.php'
            );
        } else {
            $this->installFiles();
            $this->installDB();
            $APPLICATION->IncludeAdminFile(
                GetMessage('RIM_INSTALL_TITLE'),
                __DIR__ . '/step2.php'
            );
        }
    }

    function DoUninstall()
    {
        global $DOCUMENT_ROOT, $APPLICATION, $step, $errors;
        $step = (int)$step;

        if ($step < 2) {
            $APPLICATION->IncludeAdminFile(
                GetMessage('RIM_UNINSTALL_TITLE'),
                __DIR__ . '/unstep1.php'
            );
        } elseif ($step == 2) {
            $errors = false;

            $this->unInstallDB();

            $APPLICATION->IncludeAdminFile(
                GetMessage('RIM_UNINSTALL_TITLE'),
                __DIR__ . '/unstep2.php'
            );
        }
    }
}
