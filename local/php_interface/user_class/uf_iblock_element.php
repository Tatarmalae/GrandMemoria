<?php

AddEventHandler('main', 'OnUserTypeBuildList', [CUserTypeIBlockElement::class, 'GetUserTypeDescription'], 5000);

class CUserTypeIBlockElement
{
    public static function GetUserTypeDescription(): array
    {
        return [
            'USER_TYPE_ID' => 'iblock_element',
            'CLASS_NAME' => self::class,
            'DESCRIPTION' => 'Связь с элементами инфоблока',
            'BASE_TYPE' => 'int',
        ];
    }

    public static function GetDBColumnType(array $arUserField): string
    {
        return match (strtolower($GLOBALS['DB']->type)) {
            'mysql' => 'int(18)',
            'oracle' => 'number(18)',
            'mssql' => 'int',
            default => 'int',
        };
    }

    public static function PrepareSettings(array $arUserField): array
    {
        $iIBlockId = (int)($arUserField['SETTINGS']['IBLOCK_ID'] ?? 0);
        return ['IBLOCK_ID' => $iIBlockId > 0 ? $iIBlockId : 0];
    }

   public static function GetSettingsHTML($arUserField, array $arHtmlControl, bool $bVarsFromForm): string
{
    // Проверяем, что $arUserField является массивом
    if (!is_array($arUserField)) {
        return ''; // Возвращаем пустую строку, если данные некорректны
    }

    if (!CModule::IncludeModule('iblock')) {
        return '';
    }

    $value = $bVarsFromForm
        ? $GLOBALS[$arHtmlControl['NAME']]['IBLOCK_ID']
        : ($arUserField['SETTINGS']['IBLOCK_ID'] ?? '');

    return '
    <tr style="vertical-align: top;">
        <td>Информационный блок по умолчанию:</td>
        <td>
            ' . GetIBlockDropDownList($value, $arHtmlControl['NAME'] . '[IBLOCK_TYPE_ID]', $arHtmlControl['NAME'] . '[IBLOCK_ID]') . '
        </td>
    </tr>';
}

    public static function CheckFields(array $arUserField, $value): array
    {
        return [];
    }

	public static function GetEditFormHTML(array $arUserField, array $arHtmlControl): string
	{
		$iIBlockId = (int)($arUserField['SETTINGS']['IBLOCK_ID'] ?? 0);
		$arElements = self::_getElements($arHtmlControl['VALUE']);
		
		// Преобразуем значение в int перед передачей в _getItemFieldHTML
		$iValue = (int)$arHtmlControl['VALUE'];
		
		return '<div>' . self::_getItemFieldHTML($iValue, $iIBlockId, $arElements, $arHtmlControl['NAME']) . '</div>';
	}

    public static function GetFilterHTML(array $arUserField, array $arHtmlControl): string
    {
        return self::GetEditFormHTML($arUserField, $arHtmlControl);
    }

    public static function GetAdminListViewHTML(array $arUserField, array $arHtmlControl): string
    {
        $iElementId = (int)($arHtmlControl['VALUE'] ?? 0);
        if ($iElementId > 0) {
            $arElements = self::_getElements($iElementId);
            return '[' . $iElementId . '] ' . ($arElements[$iElementId]['NAME'] ?? '');
        }
        return '&nbsp;';
    }

    public static function GetAdminListViewHTMLMulty(array $arUserField, array $arHtmlControl): string
    {
        static $bWasJs = false;
        $sReturn = '';

        if (!$bWasJs) {
            $bWasJs = true;
            ob_start();
            ?>
            <script type="text/javascript">
                var oIBListUF = {
                    oCounter: {},
                    addNewRowIBListUF: function(mFieldCounterName, sTableId, sFieldName, sOpenWindowUrl, sSpanId) {
                        var oTbl = document.getElementById(sTableId);
                        var oRow = oTbl.insertRow(oTbl.rows.length - 1);
                        var oCell = oRow.insertCell(-1);
                        if (!this.oCounter[mFieldCounterName]) {
                            this.oCounter[mFieldCounterName] = 0;
                        }
                        var sK = 'n' + this.oCounter[mFieldCounterName];
                        this.oCounter[mFieldCounterName] = parseInt(this.oCounter[mFieldCounterName]) + 1;
                        sOpenWindowUrl += '&k=' + sK;
                        sSpanId += '_' + sK;
                        oCell.innerHTML = '<input type="text" id="' + sFieldName + '[' + sK + ']" name="' + sFieldName + '[' + sK + ']" value="" size="5" />';
                        oCell.innerHTML += '<input type="button" value="..." onclick="jsUtils.OpenWindow(\'' + sOpenWindowUrl + '\', 600, 500);" />';
                        oCell.innerHTML += '&nbsp;<span id="' + sSpanId + '"></span>';
                    }
                };
            </script>
            <?php
            $sReturn .= ob_get_clean();
        }

        if (!empty($arHtmlControl['VALUE']) && is_array($arHtmlControl['VALUE'])) {
            $arElements = self::_getElements($arHtmlControl['VALUE']);
            $arPrint = [];
            foreach ($arHtmlControl['VALUE'] as $iElementId) {
                $arPrint[] = '[' . $iElementId . '] ' . ($arElements[$iElementId]['NAME'] ?? '');
            }
            $sReturn .= implode(' / ', $arPrint);
        } else {
            $sReturn .= '&nbsp;';
        }
        return $sReturn;
    }

    public static function GetAdminListEditHTML(array $arUserField, array $arHtmlControl): string
    {
        return self::GetEditFormHTML($arUserField, $arHtmlControl);
    }

    public static function GetAdminListEditHTMLMulty(array $arUserField, array $arHtmlControl): string
    {
        $iIBlockId = (int)($arUserField['SETTINGS']['IBLOCK_ID'] ?? 0);
        $arElements = self::_getElements($arHtmlControl['VALUE']);

        $sTableId = 'tb' . md5($arHtmlControl['NAME']);
        $sReturn = '<table cellspacing="0" id="' . $sTableId . '">';
        foreach ($arHtmlControl['VALUE'] as $iKey => $iValue) {
            $sReturn .= '<tr><td><div>' . self::_getItemFieldHTML($iValue, $iIBlockId, $arElements, $arHtmlControl['NAME']) . '</div></td></tr>';
        }
        $sReturn .= '<tr><td><div>' . self::_getItemFieldHTML(0, $iIBlockId, [], $arHtmlControl['NAME']) . '</div></td></tr>';

        $sFieldName_ = str_replace('[]', '', $arHtmlControl['NAME']);
        $mFieldCounterName = md5($sFieldName_);
        $sOpenWindowUrl = '/bitrix/admin/iblock_element_search.php?lang=' . LANG . '&amp;IBLOCK_ID=' . $iIBlockId . '&amp;n=' . $sFieldName_ . '&amp;m=n';
        $sSpanId = 'sp_' . $mFieldCounterName;
        $sReturn .= '<tr><td><div><input type="button" onclick="oIBListUF.addNewRowIBListUF(\'' . $mFieldCounterName . '\', \'' . $sTableId . '\', \'' . $sFieldName_ . '\', \'' . $sOpenWindowUrl . '\', \'' . $sSpanId . '\')" value="Добавить" /></div></td></tr>';
        $sReturn .= '</table>';
        return $sReturn;
    }

    public static function OnSearchIndex(array $arUserField): string
    {
        return is_array($arUserField['VALUE']) ? implode("\r\n", $arUserField['VALUE']) : $arUserField['VALUE'];
    }

    public static function OnBeforeSave(array $arUserField, $value): ?int
    {
        return (int)$value > 0 ? (int)$value : null;
    }

    private static function _getItemFieldHTML(int $iValue, int $iIBlockId, array $arElements, string $sFieldName, string $sMulty = 'n'): string
    {
        $sElementName = '';
        if (!empty($arElements[$iValue])) {
            $sElementName = '<a href="' . BX_PERSONAL_ROOT . '/admin/iblock_element_edit.php?ID=' . $arElements[$iValue]['ID'] . '&type=' . $arElements[$iValue]['IBLOCK_TYPE_ID'] . '&lang=' . LANG . '&IBLOCK_ID=' . $arElements[$iValue]['IBLOCK_ID'] . '&find_section_section=-1">' . $arElements[$iValue]['NAME'] . '</a>';
        }

        $sKey = randstring(3);
        $sName = 'UF_IBELEMENT_' . randstring(3);
        $sRandId = $sName . '_' . $sKey;
        $md5Name = md5($sName);
        $sValue = $iValue > 0 ? $iValue : '';
        $sButtonValue = $sMulty == 'y' ? 'Добавить ...' : '...';

        $sReturn = '<input type="text" name="' . $sFieldName . '" id="' . $sName . '" value="' . $sValue . '" size="5" />';
        $sReturn .= '<input type="button" value="' . $sButtonValue . '" onclick="jsUtils.OpenWindow(\'/bitrix/admin/iblock_element_search.php?lang=' . LANG . '&amp;IBLOCK_ID=' . $iIBlockId . '&amp;n=' . $sName . '&amp;m=' . $sMulty . '&amp;k=' . $sKey . '\', 600, 500);" />';
        $sReturn .= '&nbsp;<span id="sp_' . $md5Name . '_' . $sKey . '">' . $sElementName . '</span>';

        if ($sMulty == 'y') {
            $sJsMV = 'MV_' . $md5Name;
            $sFieldName_ = str_replace('[]', '', $sFieldName);
            $sJsFuncName = 'InS' . $md5Name;
            ob_start();
            ?>
            <script type="text/javascript">
                var <?= $sJsMV ?> = 0;
                var <?= $sJsFuncName ?> = function(sId, sName) {
                    var oTbl = document.getElementById('tb<?= md5($sFieldName) ?>');
                    var oRow = oTbl.insertRow(oTbl.rows.length - 1);
                    var oCell = oRow.insertCell(-1);
                    var sK = 'n' + <?= $sJsMV ?>;
                    oCell.innerHTML = '<input type="text" id="<?= $sFieldName_ ?>[' + sK + ']" name="<?= $sFieldName_ ?>[' + sK + ']" value="' + sId + '" size="5" />';
                    oCell.innerHTML += '<input type="button" value="..." onclick="jsUtils.OpenWindow(\'/bitrix/admin/iblock_element_search.php?lang=<?= LANG ?>&amp;IBLOCK_ID=<?= $iIBlockId ?>&amp;n=<?= $sFieldName_ ?>&amp;k=' + sK + '\', 600, 500);" />';
                    oCell.innerHTML += '&nbsp;<span id="sp_<?= md5($sFieldName_) ?>_' + sK + '">' + sName + '</span>';
                    <?= $sJsMV ?>++;
                };
            </script>
            <?php
            $sReturn .= ob_get_clean();
        }
        return $sReturn;
    }

    private static function _getElements($mElementId = []): array
    {
        $arReturn = [];

        if (!empty($mElementId)) {
            if (!CModule::IncludeModule('iblock')) {
                return $arReturn;
            }

            $arFilter = ['ID' => []];
            $mElementId = is_array($mElementId) ? $mElementId : [$mElementId];
            foreach ($mElementId as $iValue) {
                $iValue = (int)$iValue;
                if ($iValue > 0) {
                    $arFilter['ID'][] = $iValue;
                }
            }

            if (!empty($arFilter['ID'])) {
                $arSelect = ['ID', 'NAME', 'IBLOCK_ID', 'IBLOCK_TYPE_ID'];
                $rsItems = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
                while ($arItem = $rsItems->GetNext(false, false)) {
                    $arReturn[$arItem['ID']] = $arItem;
                }
            }
        }
        return $arReturn;
    }
}