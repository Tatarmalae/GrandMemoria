<?php

namespace Dev;

use Bitrix\Highloadblock\HighloadBlockTable;
use Bitrix\Iblock\ElementPropertyTable;
use Bitrix\Iblock\ElementTable;
use Bitrix\Iblock\IblockTable;
use Bitrix\Iblock\Model\Section;
use Bitrix\Iblock\PropertyEnumerationTable;
use Bitrix\Iblock\PropertyTable;
use Bitrix\Iblock\SectionElementTable;
use Bitrix\Iblock\SectionTable;
use Bitrix\Main\ArgumentException;
use Bitrix\Main\Diag\Debug;
use Bitrix\Main\Entity\Query;
use Bitrix\Main\Loader;
use Bitrix\Main\LoaderException;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\SystemException;
use Throwable;

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
     * @throws SystemException|LoaderException
     */
    public static function getElementProps($IBlockID, $props): array
    {
        Loader::IncludeModule('iblock');
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
        return $result->fetchAll();
    }

    /**
     * Возвращает элементы ИНФОБЛОКА. Может учитывать ID раздела
     * @param $IBlockID
     * @param string $sectionID
     * @param array|null $order
     * @param null $limit
     * @param array $filter
     * @return array
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException|LoaderException
     */
    public static function getElementList($IBlockID, string $sectionID = '', ?array $order = [], $limit = null, array $filter = []): array
    {
        Loader::IncludeModule('iblock');
        $query = new Query(
            ElementTable::getEntity()
        );
        $query->setOrder([
            'SORT' => 'ASC',
        ]);
        if ($order) {
            $query->setOrder($order);
        }
        $query->setFilter(array_merge([
            'ACTIVE' => 'Y',
            '=IBLOCK_ID' => $IBlockID,
        ], $filter));
        if (!empty($sectionID)) {
            $query->setFilter(array_merge([
                '=IBLOCK_ID' => $IBlockID,
                '=ROOT.ID' => $sectionID,
                '==LINK.ADDITIONAL_PROPERTY_ID' => NULL,
            ], $filter));
        }
        if ($limit !== null) {
            $query->setLimit($limit);
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
     * Возвращает ID элементов ИНФОБЛОКА по ID раздела
     * @param $IBlockID
     * @param string $sectionID
     * @return array
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException|LoaderException
     */
    public static function getElementIDsBySectionID($IBlockID, string $sectionID): array
    {
        Loader::IncludeModule('iblock');
        $query = new Query(
            ElementTable::getEntity()
        );
        $query->setOrder([
            'SORT' => 'ASC',
        ]);
        $query->setFilter([
            'ACTIVE' => 'Y',
            'IBLOCK_ID' => $IBlockID,
            'IBLOCK_SECTION_ID' => $sectionID,
        ]);
        $query->setSelect([
            'ID',
        ]);
        $res = $query->FetchAll();
        $result = [];
        foreach ($res as $item) {
            $result[] = $item['ID'];
        }
        return $result;
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
        $query->setLimit(1);
        $query->setSelect([
            'IBLOCK_ID',
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
        if ($arItem = $result->Fetch()) {
            $arItem['PREVIEW_PICTURE'] = \CFile::GetPath($arItem['PREVIEW_PICTURE']);
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
            $arItems = $arItem;
        }
        return $arItems;
    }

    /**
     * Возвращает минимальную цену элементов раздела
     * @param $IBlockID
     * @param $sectionID
     * @return array
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException|LoaderException
     */
    public static function getElementMinPriceBySection($IBlockID, $sectionID): array
    {
        Loader::IncludeModule('iblock');
        $query = new Query(
            ElementTable::getEntity()
        );
        $query->setFilter([
            'ACTIVE' => 'Y',
            '=IBLOCK_ID' => $IBlockID,
            '=ROOT.ID' => $sectionID,
            '==LINK.ADDITIONAL_PROPERTY_ID' => NULL,
            'IBLOCK_ELEMENT_PRICE_IBLOCK_PROPERTY_ID' => 30,
        ]);
        $query->setLimit(1);
        $query->setSelect([
            'PRICE',
            'PRICE_VALUE' => 'IBLOCK_ELEMENT_PRICE_VALUE',
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
        $query->registerRuntimeField(
            'PRICE',
            [
                'data_type' => ElementPropertyTable::class,
                'reference' => ['=this.ID' => 'ref.IBLOCK_ELEMENT_ID'],
            ]
        );
        $query->setOrder(['IBLOCK_ELEMENT_PRICE_VALUE' => 'ASC']);
        $result = $query->exec();

        return $result->fetch();
    }

    /**
     * Получает активные разделы ИНФОБЛОКА с элементами > 0
     * @param $IBlockID
     * @return array
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException|LoaderException
     */
    public static function getIBlockSections($IBlockID): array
    {
        Loader::IncludeModule('iblock');
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
     * Возвращает по одному товару из каждого раздела $sections
     * @param $IBlockID
     * @param array $sections
     * @return array
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     */
    public static function getOneElementIDBySections($IBlockID, array $sections = []): array
    {
        $result = [];
        foreach ($sections as $section) {
            $result[$section] = current(self::getElementList($IBlockID, $section, [], 1))['ID'];
        }
        return $result;
    }

    /**
     * Получает информацию о разделе по ID
     * @param $sectionID
     * @return array|false
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException|LoaderException
     */
    public static function getSectionByID($sectionID)
    {
        Loader::IncludeModule('iblock');
        return SectionTable::GetByID($sectionID)->Fetch();
    }

    /**
     * Получает информацию о разделе по CODE
     * @param $IBlockID
     * @param $sectionCode
     * @return array|false
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException|LoaderException
     */
    public static function getSectionByCode($IBlockID, $sectionCode)
    {
        Loader::IncludeModule('iblock');
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
     * Получает информацию о разделе по названию
     * @param $IBlockID
     * @param $sectionName
     * @return array|false
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException|LoaderException
     */
    public static function getSectionByName($IBlockID, $sectionName)
    {
        Loader::IncludeModule('iblock');
        $rsSection = SectionTable::getList([
            'filter' => [
                'IBLOCK_ID' => $IBlockID,
                'NAME' => $sectionName,
                'ACTIVE' => 'Y',
                'GLOBAL_ACTIVE' => 'Y',
            ],
            'limit' => 1,
            'select' => [
                'ID',
            ],
        ]);
        return current($rsSection->fetchAll())['ID'];
    }

    /**
     * Получает пользовательские поля раздела ИНФОБЛОКА
     * @param $IBlockID
     * @param $sectionId
     * @return false|mixed
     * @throws LoaderException
     */
    public static function getSectionProps($IBlockID, $sectionId)
    {
        Loader::IncludeModule('iblock');
        $entity = Section::compileEntityByIblock($IBlockID);
        $rsSection = $entity::getList([
            'filter' => [
                'IBLOCK_ID' => $IBlockID,
                'ID' => $sectionId,
                'ACTIVE' => 'Y',
                'GLOBAL_ACTIVE' => 'Y',
            ],
            'limit' => 1,
            'select' => ['UF_*'],
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
     * @throws LoaderException
     */
    public static function getIBlock($id)
    {
        Loader::includeModule('iblock');
        return IblockTable::getList([
            'limit' => 1,
            'filter' => ['ID' => $id],
        ])->fetch();
    }

    /**
     * Получает активные разделы ИНФОБЛОКА для построения дерева
     * @param $IBlockID
     * @return array
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     * @throws LoaderException
     */
    public static function getSectionList($IBlockID): array
    {
        Loader::IncludeModule('iblock');
        $sectionClass = Section::compileEntityByIblock($IBlockID);
        $query = new Query($sectionClass::getEntity());
        $query->setOrder(['LEFT_MARGIN' => 'ASC']);
        $query->setFilter([
            'IBLOCK_ID' => $IBlockID,
            'ACTIVE' => 'Y',
            'GLOBAL_ACTIVE' => 'Y',
        ]);
        $query->setSelect([
            'ID',
            'NAME',
            'DEPTH_LEVEL',
            'UF_TYPE',
        ]);
        return $query->exec()->fetchAll();
    }

    /**
     * Возвращает информацию об элементе по ID для калькулятора
     * @param $id
     * @return array
     * @throws ArgumentException
     * @throws ObjectPropertyException
     * @throws SystemException
     * @throws LoaderException
     */
    public static function getElement($id): array
    {
        Loader::IncludeModule('iblock');
        $query = new Query(
            ElementTable::getEntity()
        );
        $query->setFilter([
            'ACTIVE' => 'Y',
            '=ID' => $id,
        ]);
        $query->setLimit(1);
        $query->setSelect([
            'IBLOCK_ID',
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
        if ($arItem = $result->Fetch()) {
            $arItem['PREVIEW_PICTURE'] = \CFile::GetPath($arItem['PREVIEW_PICTURE']);
            $arItem['DETAIL_PAGE_URL'] = \CIBlock::ReplaceDetailUrl($arItem['DETAIL_PAGE_URL'], $arItem, false, 'E');

            $dbProperty = \CIBlockElement::getProperty($arItem['IBLOCK_ID'], $arItem['ID'], [
                "sort",
                "asc",
            ], []);
            while ($arProperty = $dbProperty->Fetch()) {
                if ($arProperty['VALUE'] !== '') {
                    $arItem['PROPERTIES'][$arProperty['CODE']][] = $arProperty;
                }
            }
            $arItems = $arItem;
        }
        return $arItems;
    }

    /**
     * Получает разделы с элементами для калькулятора
     * @param $IBlockID
     * @return array
     */
    public static function getCalculation($IBlockID): array
    {
        $sections = [];
        try {
            $sections = Utilities::getMultilevelArray(self::getSectionList($IBlockID));
            foreach ($sections as $keyStep => $steps) {
                foreach ($steps['ITEMS'] as $key => $section) {
                    $sections[$keyStep]['ITEMS'][$key]['ELEMENTS'] = self::getElementIDsBySectionID($IBlockID, $section['ID']);
                }
            }
            foreach ($sections as $keyStep => $steps) {
                foreach ($steps['ITEMS'] as $key => $section) {
                    foreach ($section['ELEMENTS'] as $elKey => $element) {
                        $sections[$keyStep]['ITEMS'][$key]['ELEMENTS'][$elKey] = self::getElement($element);
                    }
                }
            }
        } catch (Throwable $e) {
            Debug::dumpToFile($e->getMessage());
        }
        return $sections;
    }
}