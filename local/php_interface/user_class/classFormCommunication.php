<?php

namespace Dev;

use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;
use Bitrix\Main\Mail\Event;
use CIBlockElement;
use CIBlockProperty;

/**
 * Класс для работы с формой "Написать нам"
 * Class FormCommunication
 * @package Dev
 */
class FormCommunication extends Iblock
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
            'NAME' => 'Заявка от ' . date('d.m.Y H:i:s'),
            'ACTIVE' => 'N',
            'TYPE' => 'html',
        ];
        if (isset($arFields['FILES'])) {
            $arTypeFile = \CIBlockProperty::GetByID('FILE', $this->IBlockID, false)->Fetch()['FILE_TYPE'];

            $arFiles = [];
            for ($i = 0; $i < count($_FILES['file']['name']); $i++) {
                $error = false;
                $ext = pathinfo($_FILES['file']['name'][$i], PATHINFO_EXTENSION);

                $allowed = explode(', ', $arTypeFile);
                if (!in_array($ext, $allowed)) {
                    $error = true;
                } else {
                    $file = [
                        'name' => $_FILES['file']['name'][$i],
                        'size' => $_FILES['file']['size'][$i],
                        'tmp_name' => $_FILES['file']['tmp_name'][$i],
                        'type' => $_FILES['file']['type'][$i]
                    ];
                    $arFiles[] = [
                        'VALUE' => $file,
                        'DESCRIPTION' => ''
                    ];
                }
                if ($error) {
                    return 'Неверный тип файлов, требуется ' . $arTypeFile;
                }
                $arLoadProductArray['PROPERTY_VALUES']['FILE'] = $arFiles;
            }
        }

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