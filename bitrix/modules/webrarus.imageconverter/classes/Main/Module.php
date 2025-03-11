<?php

declare(strict_types=1);

namespace Rarus\ImageMinify\Main;

use COption;

/**
 * Module class
 */
class Module
{
    /**
     * @var string
     */
    public const MODULE_NAME = 'webrarus.imageconverter';

    /**
     * @var array
     */
    protected static array $configCache = [];

    /**
     * Get document root path with separator
     *
     * @return string
     */
    public static function getDocRoot(): string
    {
        return rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR);
    }

    /**
     * Get php_interface root path
     *
     * @return string
     */
    public static function getPhpInterfaceDir(): string
    {
        if (is_dir(self::getDocRoot() . '/local/php_interface')) {
            return self::getDocRoot() . '/local/php_interface';
        } else {
            return self::getDocRoot() . '/bitrix/php_interface';
        }
    }

    /**
     * Get module root path
     *
     * @return string
     */
    public static function getModuleDir(): string
    {
        if (is_file(self::getDocRoot() . '/local/modules/' . self::MODULE_NAME . '/include.php')) {
            return self::getDocRoot() . '/local/modules/' . self::MODULE_NAME;
        } else {
            return self::getDocRoot() . '/bitrix/modules/' . self::MODULE_NAME;
        }
    }

    /**
     * Get module version
     *
     * @return mixed|string
     */
    public static function getVersion()
    {
        $arModuleVersion = [];
        include self::getModuleDir() . '/install/version.php';
        return $arModuleVersion['VERSION'] ?? '';
    }

    /**
     * Get option value
     *
     * @param        $name
     * @param string $default
     * @return false|mixed|string
     */
    public static function getDbOption($name, string $default = '')
    {
        $val = COption::GetOptionString(self::MODULE_NAME, $name, null);
        if (is_null($val)) {
            $opts = self::getOptionsConfig();
            return isset($opts[$name]) ? $opts[$name]['DEFAULT'] : $default;
        }

        return $val;
    }

    /**
     * Set option value
     *
     * @param $name
     * @param $value
     * @return true|void
     */
    public static function setDbOption($name, $value)
    {
        if ($value != COption::GetOptionString(self::MODULE_NAME, $name)) {
            return COption::SetOptionString(self::MODULE_NAME, $name, $value);
        }
    }

    /**
     * Reset options values
     *
     * @return void
     */
    public static function resetDbOptions()
    {
        $options = self::getOptionsConfig();
        foreach ($options as $name => $opt) {
            COption::RemoveOption(self::MODULE_NAME, $name);
        }
    }

    /**
     * Get options config
     *
     * @return array|mixed
     */
    public static function getOptionsConfig()
    {
        if (empty(self::$configCache)) {
            self::$configCache = include self::getModuleDir() . '/config.php';
        }
        return self::$configCache;
    }

    /**
     * Make directory
     *
     * @param $dirName
     * @return string
     */
    protected static function makeDir($dirName): string
    {
        $dirName = self::getDocRoot() . $dirName;
        if (!is_dir($dirName)) {
            mkdir($dirName, BX_DIR_PERMISSIONS, true);
        }

        return $dirName;
    }
}
