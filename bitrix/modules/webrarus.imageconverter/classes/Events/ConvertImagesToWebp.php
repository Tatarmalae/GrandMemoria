<?php

declare(strict_types=1);

namespace Rarus\ImageMinify\Events;

use Exception;
use Rarus\ImageMinify\Main\Converter;
use Rarus\ImageMinify\Main\Utility;
use Rarus\ImageMinify\Main\Module;

/**
 * Convert from jpg/jpeg/png at webp
 */
class ConvertImagesToWebp
{
    /**
     * Convert list iblocks
     *
     * @param $elementId
     *
     * @return bool
     */
    public static function convertElement($elementId): bool
    {
        try {
            $element = Utility::getIblockElements(
                [],
                ['ID' => $elementId],
                ['ID', 'PREVIEW_PICTURE', 'DETAIL_PICTURE', 'IBLOCK_ID']
            )[0];

            if ((int)$element['ID'] > 0) {
                // update element detail_picture and preview_picture
                Converter::convertFields([
                    'ID'              => (int)$element['ID'],
                    'PREVIEW_PICTURE' => (int)$element['PREVIEW_PICTURE'],
                    'DETAIL_PICTURE'  => (int)$element['DETAIL_PICTURE']
                ], false);
                // update element customs image props
                Converter::convertProps([
                    'IBLOCK_ID' => $element['IBLOCK_ID'],
                    'ID'        => $element['ID']
                ]);
            }

            $sections = Utility::getIblockSections([
                'select' => ['ID'],
                'filter' => ['IBLOCK_ID' => $element['IBLOCK_ID']]
            ]);

            foreach ($sections as $section) {
                if ((int)$section['ID'] > 0) {
                    // update section picture and detail_picture
                    $params['ID'] = (int)$section['ID'];
                    Converter::convertSectionFields($params);
                }
            }

            return true;
        } catch (Exception $e) {
            throw new \RuntimeException($e->getMessage());
        }
    }

    /**
     * Convert list iblocks
     *
     * @param array $iblockListId
     *
     * @return bool
     */
    public static function convertIblocks(array $iblockListId): bool
    {
        try {
            foreach ($iblockListId as $iblockId) {
                $elements = Utility::getIblockElements(
                    [],
                    ['IBLOCK_ID' => $iblockId],
                    ['ID', 'PREVIEW_PICTURE', 'DETAIL_PICTURE']
                );

                foreach ($elements as $element) {
                    // update element detail_picture and preview_picture
                    Converter::convertFields([
                        'ID'              => (int)$element['ID'],
                        'PREVIEW_PICTURE' => (int)$element['PREVIEW_PICTURE'],
                        'DETAIL_PICTURE'  => (int)$element['DETAIL_PICTURE']
                    ], false);
                    // update element customs image props
                    Converter::convertProps([
                        'IBLOCK_ID' => $iblockId,
                        'ID'        => $element['ID']
                    ]);
                }

                $sections = Utility::getIblockSections([
                    'select' => ['ID'],
                    'filter' => ['IBLOCK_ID' => $iblockId]
                ]);

                foreach ($sections as $section) {
                    if ((int)$section['ID'] > 0) {
                        // update section picture and detail_picture
                        $params['ID'] = (int)$section['ID'];
                        Converter::convertSectionFields($params);
                    }
                }
            }

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Convert DETAIL_PICTURE, PREVIEW_PICTURE and customs props into .webp format
     *
     * @param $arFields
     *
     * @return bool
     */
    public static function convertElementImages(&$arFields): bool
    {
        $convertAllowed = Module::getDbOption('rim_convert_allowed');
        if ((string)$convertAllowed !== 'Y') {
            return false;
        }

        $optionName = 'rim_convert_iblock_' . $arFields['IBLOCK_ID'];
        if (!Utility::isAllowConvertIblock($optionName)) {
            return false;
        }

        if ($arFields['DISALLOW_HANDLER'] === 'Y') {
            return false;
        }

        // update element detail_picture and preview_picture
        if ((string)Module::getDbOption('rim_convert_fields') === 'Y') {
            Converter::convertFields([
                'ID'                 => (int)$arFields['ID'],
                'PREVIEW_PICTURE_ID' => (int)$arFields['PREVIEW_PICTURE_ID'],
                'PREVIEW_PICTURE'    => (array)$arFields['PREVIEW_PICTURE'],
                'DETAIL_PICTURE_ID'  => (int)$arFields['DETAIL_PICTURE_ID'],
                'DETAIL_PICTURE'     => (array)$arFields['DETAIL_PICTURE']
            ]);
        }

        // update element customs image props
        if ((string)Module::getDbOption('rim_convert_props') === 'Y') {
            Converter::convertProps([
                'IBLOCK_ID' => $arFields['IBLOCK_ID'],
                'ID'        => $arFields['ID']
            ]);
        }

        $arFields['DISALLOW_HANDLER'] = 'Y';

        return true;
    }

    /**
     * Convert DETAIL_PICTURE, PREVIEW_PICTURE section fields
     *
     * @param $arFields
     *
     * @return bool
     */
    public static function convertSectionImage(&$arFields): bool
    {
        $convertAllowed = Module::getDbOption('rim_convert_allowed');
        if ((string)$convertAllowed !== 'Y') {
            return false;
        }

        $optionName = 'rim_convert_iblock_' . $arFields['IBLOCK_ID'];
        if (!Utility::isAllowConvertIblock($optionName)) {
            return false;
        }

        // update section picture and detail_picture
        if ((string)Module::getDbOption('rim_convert_section_fields') === 'Y') {
            Converter::convertSectionFields([
                'ID' => $arFields['ID']
            ]);
        }

        return true;
    }
}
