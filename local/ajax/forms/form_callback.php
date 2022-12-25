<?php if (!$_POST && !isset($_SERVER['HTTP_X_REQUESTED_WITH']) && empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest') die();
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Main\Diag\Debug;
use Dev\FormCallback;

$reCaptcha = (new Dev\ReCaptcha)->getData($_POST['g-recaptcha-response']);
if (!$reCaptcha['success'] || $reCaptcha['action'] !== 'send_form' || floatval($reCaptcha['score']) < 0.5) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Captcha Error',
    ]);
} else {
    $obForm = new FormCallback(27);

    $arFields = $_POST;
    $type = $arFields['type'];
    unset($arFields['type'], $arFields['checkbox']);
    try {
        $res = $obForm->add($type, $arFields);
        if ($res === true) {
            echo json_encode(['status' => 'ok']);
        } else {
            Debug::dumpToFile($res);
        }
    } catch (Throwable $e) {
        Debug::dumpToFile($e->getMessage());
    }
}