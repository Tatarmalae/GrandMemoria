<?php

namespace Dev;

use Bitrix\Highloadblock\HighloadBlockTable;
use Bitrix\Iblock\ElementPropertyTable;
use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\IblockTable;
use Bitrix\Iblock\PropertyEnumerationTable;
use Bitrix\Iblock\PropertyTable;
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
     * Получает активные разделы инфоблока с элементами > 0
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
     * Получает список инфоблоков по типу
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
}