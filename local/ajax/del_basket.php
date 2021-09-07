<?php

use Bitrix\Main\Diag\Debug;
use Dev\Basket;
use Dev\Catalog;

if ($_POST && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
    $id = intval($_POST['id']);
    Basket::delBasket(intval($_POST['id']));
    try {
        $element = Catalog::getElementByID($id);
        echo json_encode([
            'status' => 'success',
            'count' => Basket::getCount(),
            'sum' => Basket::getSum(),
        ]);
    } catch (Throwable $e) {
        Debug::dumpToFile($e->getMessage());
    }
}