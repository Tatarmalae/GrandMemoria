<?php

namespace Dev;

use Bitrix\Main\Diag\Debug;
use Throwable;

/**
 * Класс для работы с корзиной
 * Class Basket
 * @package Dev
 */
class Basket
{
    /**
     * Имя сессии
     * @var string
     */
    private static string $sessionName = 'DEV_BASKET';

    /**
     * Добавление в корзину
     * @param $id
     * @param int $quantity
     */
    public static function addBasket($id, int $quantity = 1)
    {
        if (!isset($_SESSION[self::$sessionName])) {
            $_SESSION[self::$sessionName] = [];
        }
        if (!in_array($id, $_SESSION[self::$sessionName])) {
            if ($quantity === 0) {
                unset($_SESSION[self::$sessionName][$id]);
            } else {
                $_SESSION[self::$sessionName][$id] = $quantity;
            }
        }
    }

    /**
     * Удаление из корзины
     * @param $id
     */
    public static function delBasket($id)
    {
        if (array_key_exists($id, $_SESSION[self::$sessionName])) {
            unset($_SESSION[self::$sessionName][$id]);
        }
    }

    /**
     * Вывод корзины
     * @return array
     */
    public static function getBasket(): array
    {
        if (
            is_countable($_SESSION[self::$sessionName])
            && count($_SESSION[self::$sessionName]) > 0
        ) {
            return $_SESSION[self::$sessionName];
        } else {
            return [];
        }
    }

    /**
     * Возвращает количество в корзине
     * @return int
     */
    public static function getCount(): int
    {
        if (!is_countable($_SESSION[self::$sessionName])) {
            return 0;
        }
        return count($_SESSION[self::$sessionName]) ?? 0;
    }

    /**
     * Возвращает сумму в корзине
     * @return int
     */
    public static function getSum(): int
    {
        $basket = self::getBasket();
        $sum = 0;
        foreach ($basket as $key => $item) {
            try {
                $sum += Catalog::getElementByID($key)['PROPERTIES']['PRICE']['VALUE'] * $item;
            } catch (Throwable $e) {
                Debug::dumpToFile($e->getMessage());
            }
        }
        return $sum;
    }

    /**
     * Очистка всей корзины
     */
    public static function clearAll()
    {
        unset($_SESSION[self::$sessionName]);
    }

}