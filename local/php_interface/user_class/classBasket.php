<?php

namespace Dev;

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
     */
    public static function addBasket($id)
    {
        if (!isset($_SESSION[self::$sessionName])) {
            $_SESSION[self::$sessionName] = [];
        }
        if (!in_array($id, $_SESSION[self::$sessionName])) {
            $_SESSION[self::$sessionName][] = $id;
        }
    }

    /**
     * Удаление из корзины
     * @param $id
     */
    public static function delBasket($id)
    {
        if (in_array($id, $_SESSION[self::$sessionName])) {
            $_SESSION[self::$sessionName] = array_diff($_SESSION[self::$sessionName], [$id]);
        }
    }

    /**
     * Вывод корзины
     * @return bool
     */
    public static function getBasket(): array
    {
        if (count($_SESSION[self::$sessionName]) > 0) {
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
        return count($_SESSION[self::$sessionName]) ?? 0;
    }

    /**
     * Очистка всей корзины
     */
    public static function clearAll()
    {
        unset($_SESSION[self::$sessionName]);
    }

}