<?php

namespace Dev;

use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;
use Bitrix\Main\Mail\Event;
use CIBlockElement;
use CIBlockProperty;

/**
 * Класс для работы с формой "Получить консультацию"
 * Class FormFaq
 * @package Dev
 */
class FormFaq extends Iblock
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

        $el = new CIBlockElement;
        $arLoadProductArray = [
            'IBLOCK_ID' => $this->IBlockID,
            'DATE_ACTIVE_FROM' => date('d.m.Y H:i:s'),
            'PROPERTY_VALUES' => [
                'NAME' => $arFields['name'],
                'PHONE' => $arFields['phone'],
                'EMAIL' => $arFields['email'],
                'QUESTION' => $arFields['message'],
            ],
            'NAME' => 'Вопрос от ' . date('d.m.Y H:i:s'),
            'ACTIVE' => 'N',
            'TYPE' => 'html',
        ];
        if (!$el->Add($arLoadProductArray)) {
            return $el->LAST_ERROR;
        }

        $fieldText = '';
        foreach ($arLoadProductArray['PROPERTY_VALUES'] as $key => $values) {
            if ($values != '') {
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
        return true;
    }
}