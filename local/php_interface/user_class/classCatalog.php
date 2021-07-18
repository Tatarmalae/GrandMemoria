<?php

namespace Dev;

use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\SectionTable;
use Bitrix\Main\ArgumentException;
use Bitrix\Main\Entity\Query;
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
    public function getElementProps($IBlockID, $props): array
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
                'data_type' => \Bitrix\Iblock\ElementPropertyTable::class,
                'reference' => ['=this.ID' => 'ref.IBLOCK_ELEMENT_ID'],
            ]
        );
        $query->registerRuntimeField(
            'PROPERTY_PROP',
            [
                'data_type' => \Bitrix\Iblock\PropertyTable::class,
                'reference' => ['=this.PROPERTY.IBLOCK_PROPERTY_ID' => 'ref.ID',],
            ]
        );
        $query->registerRuntimeField(
            'PROPERTY_ENUM',
            [
                'data_type' => \Bitrix\Iblock\PropertyEnumerationTable::class,
                'reference' => ['=this.PROPERTY.IBLOCK_PROPERTY_ID' => 'ref.PROPERTY_ID'],
            ]
        );
        \Dev\Utilities::DB($query->getQuery());
        $result = $query->exec();
        while ($row = $result->fetch()) {
            \Dev\Utilities::DB($row);
        }
        /*
        $arResult = ElementTable::getList([
            'order' => ['SORT' => 'ASC'],
            'filter' => [
                '=IBLOCK_ID' => $IBlockID,
                '=PROPERTY_CODE' => $props,
            ],
            'select' => [
                'ID',
                'NAME',
                'PROPERTY_CODE' => 'PROPERTY_PROP.CODE',
                'PROPERTY_VALUE' => 'PROPERTY.VALUE',
                'PROPERTY_TYPE' => 'PROPERTY_PROP.PROPERTY_TYPE',
                'PROPERTY_ENUM_VALUE' => 'PROPERTY_ENUM.VALUE',
                'PROPERTY_ENUM_XML_ID' => 'PROPERTY_ENUM.XML_ID',
                'PROPERTY',
                'PROPERTY_PROP',
                'PROPERTY_ENUM',
            ],
            'group' => [
                'ID',
                'PROPERTY_ENUM_VALUE',
            ],
            'runtime' => [
                new \Bitrix\Main\Entity\ReferenceField(
                    'PROPERTY',
                    \Bitrix\Iblock\ElementPropertyTable::class,
                    [
                        '=this.ID' => 'ref.IBLOCK_ELEMENT_ID',
                    ],
                ),
                new \Bitrix\Main\Entity\ReferenceField(
                    'PROPERTY_PROP',
                    \Bitrix\Iblock\PropertyTable::class,
                    [
                        '=this.PROPERTY.IBLOCK_PROPERTY_ID' => 'ref.ID',
                    ],
                ),
                new \Bitrix\Main\Entity\ReferenceField(
                    'PROPERTY_ENUM',
                    \Bitrix\Iblock\PropertyEnumerationTable::class,
                    [
                        '=this.PROPERTY.IBLOCK_PROPERTY_ID' => 'ref.PROPERTY_ID',
                    ],
                ),
            ],
        ])->fetchAll();
        \Dev\Utilities::DB($arResult);
        */

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
}