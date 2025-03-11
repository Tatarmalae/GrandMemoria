<?php

declare(strict_types=1);

$moduleId = 'webrarus.imageconverter';
$moduleClass = 'webrarus_imageconverter';

Bitrix\Main\Localization\Loc::loadMessages($_SERVER['DOCUMENT_ROOT'] . BX_ROOT . '/modules/main/options.php');
Bitrix\Main\Localization\Loc::loadMessages(__FILE__);

global $APPLICATION;
if ($APPLICATION->GetGroupRight($moduleId) < "S") {
    $APPLICATION->AuthForm(Bitrix\Main\Localization\Loc::getMessage('RIM_MODULE_FORBIDDEN_TEXT'));
}

Bitrix\Main\Loader::includeModule($moduleId);

$request = Bitrix\Main\HttpApplication::getInstance()->getContext()->getRequest();

$arTabs = include __DIR__ . '/config.php';
if ($request->isPost() && $request['Update'] && check_bitrix_sessid()) {
    foreach ($arTabs as $aTab) {
        foreach ($aTab['OPTIONS'] as $arOption) {
            if (!is_array($arOption)) {
                continue;
            }

            if ($arOption['note']) {
                continue;
            }

            $optionName = $arOption[0];
            $optionKey = $arOption[1];
            $optionValue = $request->getPost($optionName);

            if ($optionName === 'rim_convert_quality_jpeg' || $optionName === 'rim_convert_quality_png') {
                $optionValue = (int)$optionValue;

                if ($optionValue === 0) {
                    CAdminMessage::ShowMessage(
                        \Bitrix\Main\Localization\Loc::getMessage(
                            'RIM_MODULE_SETTINGS_OPTION_QUALITY_INVALID_PARAM',
                            [
                                '#OPTION_KEY#'   => $optionKey,
                                '#OPTION_VALUE#' => $optionValue
                            ]
                        )
                    );
                    continue;
                }

                if ((int)$optionValue < 1 || (int)$optionValue > 100) {
                    CAdminMessage::ShowMessage(
                        \Bitrix\Main\Localization\Loc::getMessage(
                            'RIM_MODULE_SETTINGS_OPTION_QUALITY_INVALID_INTERVAL',
                            [
                                '#OPTION_KEY#' => $optionKey
                            ]
                        )
                    );
                    continue;
                }
            }

            Bitrix\Main\Config\Option::set(
                $moduleId,
                $optionName,
                is_array($optionValue)
                    ? implode(',', $optionValue)
                    : $optionValue
            );
        }
    }
}

$tabControl = new CAdminTabControl('tabControl', $arTabs);
?>

<?php
$tabControl->Begin(); ?>
<form method='post' action='<?= $APPLICATION->GetCurPage() ?>?mid=<?= htmlspecialcharsbx(
    $request['mid']
) ?>&lang=<?= $request['lang'] ?>'
      name='<?= $moduleClass ?>'>

    <?php
    foreach ($arTabs as $aTab):
        if ($aTab['OPTIONS']):?>
            <?php
            $tabControl->BeginNextTab(); ?>
            <?php
            __AdmSettingsDrawList($moduleId, $aTab['OPTIONS']); ?>
        <?php
        endif;
    endforeach; ?>

    <?php
    $tabControl->Buttons(); ?>
    <input type="submit" name="Update" class="adm-btn-save" value="<?= GetMessage('MAIN_SAVE') ?>">
    <input type="reset" name="reset" value="<?= GetMessage('MAIN_RESET') ?>">
    <?= bitrix_sessid_post(); ?>
</form>
<?php
$tabControl->End(); ?>
