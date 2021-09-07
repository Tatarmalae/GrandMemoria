<?php

namespace Dev;

use Bitrix\Highloadblock\HighloadBlockTable;
use Bitrix\Iblock\ElementPropertyTable;
use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\IblockTable;
use Bitrix\Iblock\PropertyEnumerationTable;
use Bitrix\Iblock\PropertyTable;
use Bitrix\Iblock\SectionElementTable;
use Bitrix\Iblock\SectionTable;
use Bitrix\Main\ArgumentException;
use Bitrix\Main\Entity\Query;
use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;

/**
 * Класс для работы с каталогом
 * Class Catalog
 * @package Dev
 */
class Catalog
{
    /**
     * Возвращает значение свойства ИНФОБЛОКА
     * @param $IBlockID
     * @param $props
     * @return array
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public static function getElementProps($IBlockID, $props): array
    {
        $query = new Query(
            ElementTable::getEntity()
        );
        $query->setGroup([
            'ID',
            'PROPERTY_ENUM_VALUE',
        ]);
        $query->setFilter([
            '=IBLOCK_ID' => $IBlockID,
            '=PROPERTY_CODE' => $props,
        ]);
        $query->setSelect([
            'ID',
            'NAME',
            'PROPERTY_CODE' => 'PROPERTY_PROP.CODE',
            'PROPERTY_VALUE' => 'PROPERTY.VALUE',
            'PROPERTY_ENUM_VALUE' => 'PROPERTY_ENUM.VALUE',
        ]);
        $query->registerRuntimeField(
            'PROPERTY',
            [
                'data_type' => ElementPropertyTable::class,
                'reference' => ['=this.ID' => 'ref.IBLOCK_ELEMENT_ID'],
            ]
        );
        $query->registerRuntimeField(
            'PROPERTY_PROP',
            [
                'data_type' => PropertyTable::class,
                'reference' => ['=this.PROPERTY.IBLOCK_PROPERTY_ID' => 'ref.ID',],
            ]
        );
        $query->registerRuntimeField(
            'PROPERTY_ENUM',
            [
                'data_type' => PropertyEnumerationTable::class,
                'reference' => ['=this.PROPERTY.IBLOCK_PROPERTY_ID' => 'ref.PROPERTY_ID'],
            ]
        );
        $result = $query->exec();
        return $result->fetch();
    }

    /**
     * Возвращает элементы ИНФОБЛОКА. Может учитывать раздел
     * @param $IBlockID
     * @param string $sectionID
     * @param array|null $order
     * @return array
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public static function getElementList($IBlockID, string $sectionID = '', ?array $order = []): array
    {
        $query = new Query(
            ElementTable::getEntity()
        );
        $query->setOrder([
            'SORT' => 'ASC',
        ]);
        if ($order) {
            $query->setOrder($order);
        }
        $query->setFilter([
            'ACTIVE' => 'Y',
            '=IBLOCK_ID' => $IBlockID,
        ]);
        if (!empty($sectionID)) {
            $query->setFilter([
                '=IBLOCK_ID' => $IBlockID,
                '=ROOT.ID' => $sectionID,
                '==LINK.ADDITIONAL_PROPERTY_ID' => NULL
            ]);
        }
        $query->setSelect([
            'ID',
            'CODE',
            'NAME',
            'PREVIEW_TEXT',
            'DETAIL_TEXT',
            'PREVIEW_PICTURE',
            'ACTIVE_FROM',
            'DETAIL_PAGE_URL' => 'IBLOCK.DETAIL_PAGE_URL',
        ]);
        $query->registerRuntimeField(
            'LINK',
            [
                'data_type' => SectionElementTable::class,
                'reference' => ['=this.ID' => 'ref.IBLOCK_ELEMENT_ID'],
                ['join_type' => 'INNER'],
            ]
        );
        $query->registerRuntimeField(
            'PARENT',
            [
                'data_type' => SectionTable::class,
                'reference' => ['=this.LINK.IBLOCK_SECTION_ID' => 'ref.ID'],
                ['join_type' => 'INNER'],
            ]
        );
        $query->registerRuntimeField(
            'ROOT',
            [
                'data_type' => SectionTable::class,
                'reference' => [
                    '=this.PARENT.IBLOCK_ID' => 'ref.IBLOCK_ID',
                    '<=ref.LEFT_MARGIN' => 'this.PARENT.LEFT_MARGIN',
                    '>=ref.RIGHT_MARGIN' => 'this.PARENT.RIGHT_MARGIN',
                ],
                ['join_type' => 'INNER'],
            ]
        );
        $result = $query->exec();
        $arItems = [];
        while ($arItem = $result->Fetch()) {
            $arItem['DETAIL_PAGE_URL'] = \CIBlock::ReplaceDetailUrl($arItem['DETAIL_PAGE_URL'], $arItem, false, 'E');

            $dbProperty = \CIBlockElement::getProperty($IBlockID, $arItem['ID'], [
                "sort",
                "asc",
            ], []);
            while ($arProperty = $dbProperty->Fetch()) {
                if ($arProperty['VALUE'] !== '') {
                    $arItem['PROPERTIES'][$arProperty['CODE']] = $arProperty;
                }
            }
            $arItems[] = $arItem;
        }
        return $arItems;
    }

    /**
     * Возвращает информацию об элементе по ID
     * @param $id
     * @return array
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     * @throws LoaderException
     */
    public static function getElementByID($id): array
    {
        Loader::IncludeModule('iblock');
        $query = new Query(
            ElementTable::getEntity()
        );
        $query->setFilter([
            'ACTIVE' => 'Y',
            '=ID' => $id,
        ]);
        $query->setSelect([
            'ID',
            'CODE',
            'NAME',
            'PREVIEW_TEXT',
            'DETAIL_TEXT',
            'PREVIEW_PICTURE',
            'ACTIVE_FROM',
            'DETAIL_PAGE_URL' => 'IBLOCK.DETAIL_PAGE_URL',
        ]);
        $result = $query->exec();
        $arItems = [];
        while ($arItem = $result->Fetch()) {
            $arItem['DETAIL_PAGE_URL'] = \CIBlock::ReplaceDetailUrl($arItem['DETAIL_PAGE_URL'], $arItem, false, 'E');

            $dbProperty = \CIBlockElement::getProperty($arItem['IBLOCK_ID'], $arItem['ID'], [
                "sort",
                "asc",
            ], []);
            while ($arProperty = $dbProperty->Fetch()) {
                if ($arProperty['VALUE'] !== '') {
                    $arItem['PROPERTIES'][$arProperty['CODE']] = $arProperty;
                }
            }
            $arItems[] = $arItem;
        }
        return $arItems;
    }

    /**
     * Получает активные разделы ИНФОБЛОКА с элементами > 0
     * @param $IBlockID
     * @return array
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public static function getIBlockSections($IBlockID): array
    {
        $query = new Query(
            SectionTable::getEntity()
        );
        $query->setOrder([
            'SORT' => 'ASC',
        ]);
        $query->setFilter([
            '=IBLOCK_ID' => $IBlockID,
            'ACTIVE' => 'Y',
            'GLOBAL_ACTIVE' => 'Y',
            '>ELEMENT_COUNT' => 0,
        ]);
        $query->setSelect([
            'ID',
            'NAME',
            'LEFT_MARGIN',
            'RIGHT_MARGIN',
            'ELEMENT_COUNT',
        ]);
        $query->registerRuntimeField(
            'ELEMENTS',
            [
                'data_type' => ElementTable::class,
                'reference' => [
                    '=this.IBLOCK_ID' => 'ref.IBLOCK_ID',
                    '=this.ID' => 'ref.IBLOCK_SECTION_ID',
                    '=this.ACTIVE' => 'ref.ACTIVE',
                ],
            ]
        );
        $query->registerRuntimeField(
            'ELEMENT_COUNT',
            [
                'data_type' => 'integer',
                'expression' => [
                    'COUNT(%s)',
                    'ELEMENTS.NAME',
                ],
            ]
        );
        return $query->exec()->fetchAll();
    }

    /**
     * @param $IBlockID
     * @param array|null $elemOrder
     * @return array
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public static function getIBlockElementsGroupBySection($IBlockID, ?array $elemOrder = []): array
    {
        $sections = self::getIBlockSections($IBlockID);
        foreach ($sections as $key => $section) {
            $sections[$key]['ELEMENTS'] = self::getElementList($IBlockID, $section['ID'], $elemOrder);
        }
        return $sections;
    }

    /**
     * Получает информацию о разделе по ID
     * @param $sectionID
     * @return array|false
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public static function getSectionByID($sectionID)
    {
        return SectionTable::GetByID($sectionID)->Fetch();
    }

    /**
     * Получает информацию о разделе по CODE
     * @param $IBlockID
     * @param $sectionCode
     * @return array|false
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public static function getSectionByCode($IBlockID, $sectionCode)
    {
        $rsSection = SectionTable::getList([
            'filter' => [
                'IBLOCK_ID' => $IBlockID,
                'CODE' => $sectionCode,
                'ACTIVE' => 'Y',
                'GLOBAL_ACTIVE' => 'Y',
            ],
            'limit' => 1,
            'select' => [
                'ID',
                'NAME',
                'IBLOCK_SECTION_ID',
            ],
        ]);
        return current($rsSection->fetchAll());
    }

    /**
     * Получает список ИНФОБЛОКОВ по типу
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     * @throws LoaderException
     */
    public static function getIBlockListByTypeID($typeID)
    {
        if (Loader::includeModule("asd.iblock")) {
            $query = new Query(
                IblockTable::getEntity()
            );
            $query->setOrder([
                'SORT' => 'ASC',
            ]);
            $query->setFilter([
                'IBLOCK_TYPE_ID' => $typeID,
            ]);
            $query->setSelect([
                'ID',
                'NAME',
                'CODE',
                'DESCRIPTION',
                'LIST_PAGE_URL',
                'UF_ICO',
                'ICO' => 'UF_ICO.UF_ICO',
            ]);
            $query->registerRuntimeField(
                'UF_ICO',
                [
                    'data_type' => AsdIblockTable::class,
                    'reference' => [
                        '=this.ID' => 'ref.VALUE_ID',
                    ],
                ]
            );
            return $query->exec()->fetchAll();
        } else {
            return 'Модуль asd.iblock не установлен';
        }
    }

    /**
     * Получает элементы HighLoad-блока по названию таблицы
     * @param $name
     * @param $xml
     * @return array
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public static function getHLBlockByTableName($name, $xml): array
    {
        $hlbl = self::getHLBlockID($name);
        $hlblock = HighloadBlockTable::getById($hlbl)->fetch();

        $entity = HighloadBlockTable::compileEntity($hlblock);
        $entityClass = $entity->getDataClass();

        $filter = [];
        if (!empty($xml)) {
            $filter = ['UF_XML_ID' => $xml];
        }

        return $entityClass::getList([
            'select' => ['*'],
            'order' => ['UF_SORT' => 'ASC'],
            'filter' => $filter,
        ])->fetchAll();
    }

    /**
     * Получает ID HighLoad-блока по названию таблицы
     * @param $name
     * @return mixed
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public static function getHLBlockID($name)
    {
        return HighloadBlockTable::getList([
            'limit' => 1,
            'filter' => ['TABLE_NAME' => $name],
        ])->fetch()['ID'];
    }

    /**
     * Получает информацию об ИНФОБЛОКЕ
     * @param $id
     * @return array|false
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public static function getIBlock($id)
    {
        return IblockTable::getList([
            'limit' => 1,
            'filter' => ['ID' => $id],
        ])->fetch();
    }
}