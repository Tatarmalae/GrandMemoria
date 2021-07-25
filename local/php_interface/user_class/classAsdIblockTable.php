<?php

namespace Dev;

use Bitrix\Main\ORM\Data\DataManager,
    Bitrix\Main\ORM\Fields\IntegerField,
    Bitrix\Main\SystemException;

/**
 * Class AsdIblockTable
 *
 * Fields:
 * <ul>
 * <li> VALUE_ID int mandatory
 * <li> UF_ICO int optional
 * </ul>
 *
 * @package Bitrix\Uts
 **/
class AsdIblockTable extends DataManager
{
    /**
     * Returns DB table name for entity.
     * @return string
     */
    public static function getTableName(): string
    {
        return 'b_uts_asd_iblock';
    }

    /**
     * Returns entity map definition.
     * @return array
     * @throws SystemException
     */
    public static function getMap(): array
    {
        return [
            new IntegerField(
                'VALUE_ID',
                [
                    'primary' => true,
                ]
            ),
            new IntegerField(
                'UF_ICO',
                []
            ),
        ];
    }
}