<?php

declare(strict_types=1);

require __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$classes = [
    '\\Rarus\\ImageMinify\\Main\\Utility'               => 'classes/Main/Utility.php',
    '\\Rarus\\ImageMinify\\Main\\Converter'             => 'classes/Main/Converter.php',
    '\\Rarus\\ImageMinify\\Main\\Module'                => 'classes/Main/Module.php',
    '\\Rarus\\ImageMinify\\Events\\ConvertImagesToWebp' => 'classes/Events/ConvertImagesToWebp.php'
];

\Bitrix\Main\Loader::registerAutoLoadClasses('webrarus.imageconverter', $classes);
?>
