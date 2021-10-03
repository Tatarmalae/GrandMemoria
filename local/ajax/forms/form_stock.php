<?php if (!$_POST && !isset($_SERVER['HTTP_X_REQUESTED_WITH']) && empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest') die();
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

use Bitrix\Main\Diag\Debug;
use Dev\FormStock;

$obForm = new FormStock(36);

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