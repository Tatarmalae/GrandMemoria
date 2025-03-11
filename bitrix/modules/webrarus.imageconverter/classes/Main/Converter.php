<?php

declare(strict_types=1);

namespace Rarus\ImageMinify\Main;

use CFile;
use CIBlockElement;
use CIBlockSection;
use Rarus\Isolated\WebPConvert\WebPConvert;

/**
 *
 */
class Converter
{
    /**
     * Convert element fields
     *
     * @param array $params
     * @param bool  $fromArFields
     *
     * @return bool
     */
    public static function convertFields(array $params, bool $fromArFields = true): bool
    {
        if ((int)$params['ID'] > 0) {
            if ($fromArFields) {
                $previewPicture = (int)$params['PREVIEW_PICTURE_ID'] > 0
                    ? (int)$params['PREVIEW_PICTURE_ID']
                    : (int)$params['PREVIEW_PICTURE']['old_file'];

                $detailPicture = (int)$params['DETAIL_PICTURE_ID'] > 0
                    ? (int)$params['DETAIL_PICTURE_ID']
                    : (int)$params['DETAIL_PICTURE']['old_file'];
            } else {
                $previewPicture = (int)$params['PREVIEW_PICTURE'];
                $detailPicture = (int)$params['DETAIL_PICTURE'];
            }

            $basePictures = [
                'PICTURES_ID' => [
                    'PREVIEW_PICTURE' => $previewPicture,
                    'DETAIL_PICTURE'  => $detailPicture
                ],
                'NEW'         => []
            ];

            foreach ($basePictures['PICTURES_ID'] as $key => $pictureId) {
                if (0 < $pictureId) {
                    $fileData = Utility::getFileData($pictureId);

                    $filePath = (string)CFile::GetPath($pictureId);


                    if (true === Utility::isPictureFile($filePath)) {
                        $newPicture = Converter::convertImageToWebp($_SERVER['DOCUMENT_ROOT'] . $filePath);

                        if ($newPicture !== '') {
                            $newPictureArray = CFile::MakeFileArray($newPicture);
                            $newPictureArray['description'] = htmlspecialcharsback((string)$fileData[0]['DESCRIPTION']);
                            $basePictures['NEW'][$key] = $newPictureArray;
                        }
                    }
                }
            }

            if (0 < count($basePictures['NEW'])) {
                $element = new CIBlockElement();
                $element->Update(
                    $params['ID'],
                    array_merge(['DISALLOW_HANDLER' => 'Y'], $basePictures['NEW']),
                    false,
                    false,
                    false,
                    false
                );

                if ((string)$element->LAST_ERROR !== '') {
                    throw new \RuntimeException($element->LAST_ERROR);
                }
            }

            return true;
        }

        return false;
    }

    /**
     * Convert element props
     *
     * @param array $params
     *
     * @return bool
     */
    public static function convertProps(array $params): bool
    {
        if ((int)$params['IBLOCK_ID'] > 0 && (int)$params['ID'] > 0) {
            $res = CIBlockElement::GetList(
                [],
                [
                    'IBLOCK_ID' => (int)$params['IBLOCK_ID'],
                    'ID'        => (int)$params['ID']
                ]
            );

            $newValues = [];

            if ($ob = $res->GetNextElement()) {
                $properties = $ob->GetProperties();
                foreach ($properties as $code => $property) {
                    if ($property['PROPERTY_TYPE'] === 'F') {
                        if ($property['MULTIPLE'] === 'Y') {
                            $multipleValues = [];
                            foreach ($property['VALUE'] as $key => $value) {
                                $file = 0 < (int)$value ? (string)CFile::GetPath($value) : '';
                                if (true === Utility::isPictureFile($file)) {
                                    $source = $_SERVER['DOCUMENT_ROOT'] . $file;
                                    // convert to webp
                                    $destination = Converter::convertImageToWebp($source);
                                    $fileArray = CFile::MakeFileArray($destination);
                                    $multipleValues[] = [
                                        'VALUE'       => $fileArray,
                                        'DESCRIPTION' => htmlspecialcharsback($property['DESCRIPTION'][$key])
                                    ];
                                } else {
                                    $multipleValues[] = [
                                        'VALUE'       => CFile::MakeFileArray($_SERVER['DOCUMENT_ROOT'] . $file),
                                        'DESCRIPTION' => htmlspecialcharsback($property['DESCRIPTION'][$key])
                                    ];
                                }
                            }
                            $newValues[$code] = $multipleValues;
                        } else {
                            $file = 0 < (int)$property['VALUE'] ? (string)CFile::GetPath($property['VALUE']) : '';
                            if (true === Utility::isPictureFile($file)) {
                                $source = $_SERVER['DOCUMENT_ROOT'] . $file;
                                // convert to webp
                                $destination = Converter::convertImageToWebp($source);
                                $fileArray = CFile::MakeFileArray($destination);
                                $newValues[$code] = [
                                    'VALUE'       => $fileArray,
                                    'DESCRIPTION' => htmlspecialcharsback($property['DESCRIPTION'])
                                ];
                            }
                        }
                    }
                }
            }

            if (0 < count($newValues)) {
                CIBlockElement::SetPropertyValuesEx(
                    $params['ID'],
                    $params['IBLOCK_ID'],
                    $newValues
                );
            }

            return true;
        }

        return false;
    }

    public static function convertSectionFields(array $params): bool
    {
        if ((int)$params['ID'] > 0) {
            $section = new CIBlockSection();

            $sectionBD = CIBlockSection::GetByID($params['ID']);
            if ($sectionRes = $sectionBD->GetNext()) {
                $previewPicture = (int)$sectionRes['PICTURE'];
                $detailPicture = (int)$sectionRes['DETAIL_PICTURE'];

                $basePictures = [
                    'PICTURES_ID' => [
                        'PICTURE'        => $previewPicture,
                        'DETAIL_PICTURE' => $detailPicture
                    ],
                    'NEW'         => []
                ];

                foreach ($basePictures['PICTURES_ID'] as $key => $pictureId) {
                    if (0 < $pictureId) {
                        $fileData = Utility::getFileData($pictureId);

                        $filePath = (string)CFile::GetPath($pictureId);
                        if (true === Utility::isPictureFile($filePath)) {
                            $newPicture = Converter::convertImageToWebp($_SERVER['DOCUMENT_ROOT'] . $filePath);
                            if ($newPicture !== '') {
                                $newPictureArray = CFile::MakeFileArray($newPicture);
                                $newPictureArray['description'] = htmlspecialcharsback($fileData[0]['DESCRIPTION']);
                                $basePictures['NEW'][$key] = $newPictureArray;
                            }
                        }
                    }
                }

                if (0 < count($basePictures['NEW'])) {
                    $section->Update(
                        $params['ID'],
                        $basePictures['NEW']
                    );
                }
            }

            return true;
        }

        return false;
    }

    /**
     * Convert image to webp format
     *
     * @param string $source
     * @param array  $options
     *
     * @return string
     */
    public static function convertImageToWebp(string $source, array $options = []): string
    {
        $allowMimeTypes = [
            'image/png',
            'image/jpeg'
        ];

        $mimeType = (string)mime_content_type($source);

        $destination = '';
        if (in_array($mimeType, $allowMimeTypes, true)) {
            $destination = $source . '.webp';
            if (!file_exists($destination)) {
                $options = [];

                $qualityJpeg = (int)Module::getDbOption('rim_convert_quality_jpeg');
                $qualityPng = (int)Module::getDbOption('rim_convert_quality_png');

                if ($qualityJpeg > 0 && $qualityJpeg <= 100) {
                    $options['jpeg']['quality'] = $qualityJpeg;
                }

                if ($qualityPng > 0 && $qualityPng <= 100) {
                    $options['png']['quality'] = $qualityPng;
                }

                WebPConvert::convert($source, $destination, $options);
            }
        }

        return $destination;
    }
}
