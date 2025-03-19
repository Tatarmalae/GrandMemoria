<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$menuList = array();
$lev = 0;
$lastInd = 0;
$parents = array();
CModule::IncludeModule('iblock');
// Сначала формируем общую структуру меню
foreach ($arResult as $arItem) {
    $lev = $arItem['DEPTH_LEVEL'];

    if ($arItem['IS_PARENT']) {
        $arItem['CHILDREN'] = array();
    }

    if ($lev == 1) {
        $menuList[] = $arItem;
        $lastInd = count($menuList) - 1;
        $parents[$lev] = &$menuList[$lastInd];
    } else {
        $parents[$lev - 1]['CHILDREN'][] = $arItem;
        $lastInd = count($parents[$lev - 1]['CHILDREN']) - 1;
        $parents[$lev] = &$parents[$lev - 1]['CHILDREN'][$lastInd];
    }
}

// Теперь обрабатываем пункт "Ритуальные услуги"
foreach ($menuList as &$arItem) {

    if ($arItem["TEXT"] == "Ритуальные услуги") {
        // Создаем массив для группировки дочерних элементов по IBLOCK_SECTION_ID
        $groupedChildren = array();
        // Группируем дочерние элементы
        foreach ($arItem['CHILDREN'] as $child) {
            $sectionId = $child["ADDITIONAL_LINKS"]["IBLOCK_SECTION_ID"];
            if (!isset($groupedChildren[$sectionId])) {
                $groupedChildren[$sectionId] = array();
            }
            $groupedChildren[$sectionId][] = $child;
        }

        // Очищаем CHILDREN и добавляем сгруппированные элементы
        $arItem['CHILDREN'] = array();
        foreach ($groupedChildren as $sectionId => $children) {
            // Создаем заголовок для группы
			$arCurSection = CIBlockSection::GetByID($sectionId)->GetNext();
            $arItem['CHILDREN'][] = array(
                "TEXT" => $arCurSection['NAME'],
                "LINK" => "#", // Ссылка для группы (можно оставить пустой или указать заглушку)
                "IS_PARENT" => true,
                "CHILDREN" => $children, // Добавляем сгруппированные элементы
            );
        }
    }
}

// Возвращаем результат
$arResult = $menuList;