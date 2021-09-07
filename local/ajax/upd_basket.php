<?php

use Bitrix\Main\Diag\Debug;
use Dev\Basket;

if ($_POST && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
    $id = intval($_POST['id']);
    $basket = Basket::getBasket();
    if (array_key_exists($id, $basket)) {
        $count = 1;
        if ($_POST['action'] === 'plus') {
            Basket::addBasket($id, $basket[$id] + 1);
        } else if ($_POST['action'] === 'minus') {
            Basket::addBasket($id, $basket[$id] - 1);
            $count = $basket[$id] - 1;
        }
        echo json_encode([
            'status' => 'success',
            'method' => $count ? 'update' : 'delete',
            'count' => Basket::getCount(),
            'sum' => Basket::getSum(),
        ]);
    } else {
        Debug::dumpToFile('Попытка удалить отсутствующий в корзине товар');
    }
}