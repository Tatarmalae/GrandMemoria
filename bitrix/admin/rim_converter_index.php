<?php

if (is_file($_SERVER['DOCUMENT_ROOT'] . '/local/modules/webrarus.imageconverter/admin/rim_converter_index.php')) {
    require($_SERVER['DOCUMENT_ROOT'] . '/local/modules/webrarus.imageconverter/admin/rim_converter_index.php');
} else {
    require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/webrarus.imageconverter/admin/rim_converter_index.php');
}
