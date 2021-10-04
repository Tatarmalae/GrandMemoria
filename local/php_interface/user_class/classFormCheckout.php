<?php

namespace Dev;

use Bitrix\Main\Diag\Debug;
use Bitrix\Main\Context;
use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;
use Bitrix\Main\Mail\Event;
use CIBlockElement;
use CIBlockProperty;
use Throwable;

/**
 * Класс для работы с формой "Оформить заказ"
 * Class FormCheckout
 * @package Dev
 */
class FormCheckout extends Iblock
{

    /**
     * Добавляет элемент с данными из формы в ИБ
     * @param $type
     * @param $arFields
     * @return array|string|bool
     * @throws LoaderException
     */
    public function add($type, $arFields)
    {
        if (!Loader::includeModule('iblock')) return 'Модуль iblock не установлен';

        $products = '';
        $productLinks = '';

        if (empty($arFields['theme'])) {
            $products = Basket::getBasket();
            foreach ($products as $key => $product) {
                $arElem = CIBlockElement::GetByID($key)->GetNext();
                $protocol = Context::getCurrent()->getRequest()->isHttps() ? 'https://' : 'http://';
                $url = $protocol . SITE_SERVER_NAME . $arElem["DETAIL_PAGE_URL"];
                $productLinks .= '<a href="' . $url . '">' . $arElem["NAME"] . '</a> - ' . $product . 'шт.<br>';
            }
        }

        $el = new CIBlockElement;
        $arLoadProductArray = [
            'IBLOCK_ID' => $this->IBlockID,
            'DATE_ACTIVE_FROM' => date('d.m.Y H:i:s'),
            'PROPERTY_VALUES' => [
                'NAME' => $arFields['name'],
                'PHONE' => str_replace('%2B', '+', $arFields['phone']),
                'PRODUCTS' => array_keys($products),
                'INSTALLMENT' => $arFields['INSTALLMENT'],
                'KIT' => $arFields['theme'],
            ],
            'PREVIEW_TEXT' => $productLinks,
            'NAME' => 'Заявка от ' . date('d.m.Y H:i:s'),
            'ACTIVE' => 'N',
            'TYPE' => 'html',
        ];
        if (!$el->Add($arLoadProductArray)) {
            return $el->LAST_ERROR;
        }

        $fieldText = '';
        foreach ($arLoadProductArray['PROPERTY_VALUES'] as $key => $values) {
            if ($values != '') {
                if ($key == 'PRODUCTS') {
                    $values = $productLinks;
                }
                if ($key == 'KIT') {
                    $arElem = CIBlockElement::GetByID($values)->GetNext();
                    try {
                        $values = Catalog::getSectionByID($arElem["IBLOCK_SECTION_ID"])['NAME'] . '/' . $arElem["NAME"];
                    } catch (Throwable $e) {
                        Debug::dumpToFile($e->getMessage());
                    }
                }
                $resName = CIBlockProperty::GetByID($key, $this->IBlockID, false)->GetNext();
                $name = $resName['NAME'];
                $fieldText .= $name . ': ' . $values . '<br>';
            }
        }
        $eventFields = [
            'FORM_NAME' => $type,
            'TEXT' => $fieldText,
        ];
        $res = Event::send([
            'EVENT_NAME' => 'FORMS',
            'MESSAGE_ID' => 11,
            'LID' => SITE_ID,
            'C_FIELDS' => $eventFields,
        ]);
        if (!$res->isSuccess()) {
            return $res->getErrorMessages();
        }
        Basket::clearAll();
        return true;
    }
}