<?php

use Bitrix\Main\EventManager;
use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;

define("SITE_STYLE_PATH", "/local/styles");
define("SITE_INCLUDE_PATH", "/local/include");
define("SITE_USER_CLASS_PATH", "/local/php_interface/user_class");
define("SITE_AJAX_PATH", "/local/ajax");

try {
    Loader::registerAutoLoadClasses(null, [
        '\Dev\IBlock' => SITE_USER_CLASS_PATH . '/classIBlock.php',
        '\Dev\Catalog' => SITE_USER_CLASS_PATH . '/classCatalog.php',
        '\Dev\Settings' => SITE_USER_CLASS_PATH . '/classSettings.php',
        '\Dev\Utilities' => SITE_USER_CLASS_PATH . '/classUtilities.php',
        '\Dev\AsdIblockTable' => SITE_USER_CLASS_PATH . '/classAsdIblockTable.php',
        '\Dev\Basket' => SITE_USER_CLASS_PATH . '/classBasket.php',
        '\Dev\FormCallback' => SITE_USER_CLASS_PATH . '/classFormCallback.php',
        '\Dev\FormConsultation' => SITE_USER_CLASS_PATH . '/classFormConsultation.php',
        '\Dev\FormFaq' => SITE_USER_CLASS_PATH . '/classFormFaq.php',
        '\Dev\FormInstallment' => SITE_USER_CLASS_PATH . '/classFormInstallment.php',
        '\Dev\FormBuyOneClick' => SITE_USER_CLASS_PATH . '/classFormBuyOneClick.php',
        '\Dev\FormInstallmentPlan' => SITE_USER_CLASS_PATH . '/classFormInstallmentPlan.php',
        '\Dev\FormCheckout' => SITE_USER_CLASS_PATH . '/classFormCheckout.php',
        '\Dev\FormCommunication' => SITE_USER_CLASS_PATH . '/classFormCommunication.php',
        '\Dev\FormReviews' => SITE_USER_CLASS_PATH . '/classFormReviews.php',
        '\Dev\FormStock' => SITE_USER_CLASS_PATH . '/classFormStock.php',
        '\Dev\FormCalculation' => SITE_USER_CLASS_PATH . '/classFormCalculation.php',
        '\Dev\ReCaptcha' => SITE_USER_CLASS_PATH . '/classReCaptcha.php',
    ]);
} catch (LoaderException $e) {
    die($e->getMessage());
}

EventManager::getInstance()->addEventHandler("main", "OnBeforeUserUpdate", [
    '\Dev\Utilities',
    'OnBeforeUserAddHandler',
]);// Пример подключения статического метода класса в обработчике