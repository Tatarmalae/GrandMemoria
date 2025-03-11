<?php

declare(strict_types=1);

/**
 * @global $APPLICATION CMain
 */

use Bitrix\Main\Localization\Loc;

CJSCore::Init(['jquery2']);

global $APPLICATION;
$APPLICATION->SetTitle(Loc::getMessage('RIM_SETTINGS_MENU_ALL_INFO_BLOCKS_TITLE'));

#region Form data
$formData = \Rarus\ImageMinify\Main\Utility::getConvertIblock();
#endregion

#region Request handler
$request = \Bitrix\Main\Context::getCurrent()->getRequest();
if ($request->isAjaxRequest() && count($request->getPostList()->toArray()) > 0) {
    try {
        global $USER;
        if (!$USER->IsAdmin()) {
            throw new Exception(Loc::getMessage('RIM_COMMON_MESSAGE_ONLY_ADMIN'));
        }

        if (!check_bitrix_sessid()) {
            throw new Exception(Loc::getMessage('RIM_COMMON_MESSAGE_VERIFICATION_SESSION_ERROR'));
        }

        $data = json_decode((string)$request->get('data'));
        $result = \Rarus\ImageMinify\Main\Utility::setConvertedIblock((array)$data);

        if (!$result) {
            throw new Exception(Loc::getMessage('RIM_COMMON_MESSAGE_ERROR'));
        }

        ob_end_clean();
        echo json_encode([
            'result' => 'ok',
            'error'  => ''
        ]);
        exit;
    } catch (Exception $e) {
        ob_end_clean();
        echo json_encode([
            'result' => 'fail',
            'error'  => $e->getMessage()
        ]);
        exit;
    }
}
#endregion
?>

<!-- region Success and Error messages-->
<div class="adm-info-message-wrap adm-info-message-red" style="display: none;">
    <div class="adm-info-message">
        <div class="adm-info-message-title">
            <?= Loc::getMessage('RIM_COMMON_MESSAGE_ERROR_DEFAULT') ?></div>
        <p id="error-message-block"></p>
        <div class="adm-info-message-icon"></div>
    </div>
</div>
<div class="adm-info-message-wrap adm-info-message-green" style="display: none;">
    <div class="adm-info-message">
        <div class="adm-info-message-title">
            <?= Loc::getMessage('RIM_COMMON_MESSAGE_WARNING_DEFAULT') ?></div>
        <p id="success-message-block"></p>
        <div class="adm-info-message-icon"></div>
    </div>
</div>
<!-- endregion Success and Error messages-->

<div class="adm-detail-block">
    <div class="adm-detail-content-wrap">
        <form action="" enctype="multipart/form-data">
            <div class="adm-detail-content">
                <div class="adm-detail-title">
                    <?= Loc::getMessage('RIM_SETTINGS_MENU_ALL_INFO_BLOCKS_TITLE') ?>
                </div>
                <div class="adm-detail-content-item-block">
                    <table class="adm-detail-content-table edit-table">
                        <tbody>
                        <?php
                        foreach ($formData as $formItem) : ?>
                            <tr>
                                <td class="adm-detail-content-cell-l" style="width: 40%">
                                    <?= $formItem['label'] ?>
                                </td>
                                <td class="adm-detail-content-cell-r" style="width: 60%">
                                    <input type="checkbox"
                                           name="<?= $formItem['optionId'] ?>"
                                           value="<?= $formItem['optionValue'] ?>"
                                           id="<?= $formItem['optionId'] ?>"
                                           <?= ($formItem['optionValue'] === 'Y') ? 'checked' : '' ?>
                                           class="adm-designed-checkbox">
                                    <label class="adm-designed-checkbox-label"
                                           for="<?= $formItem['optionId'] ?>"
                                           title=""></label>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="adm-detail-content-btns-wrap" style="left: 0;">
                <div class="adm-detail-content-btns">
                    <input type="submit" name="save" value="<?= GetMessage('MAIN_SAVE') ?>"
                           title="<?= GetMessage('MAIN_SAVE') ?>" class="adm-btn-save">
                    <input
                        type="button" value="<?= GetMessage('MAIN_RESET') ?>" name="cancel"
                        onclick="top.window.location='?lang=<?= LANG ?>'" title="<?= GetMessage('MAIN_RESET') ?>">
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    let successMassage = '<?=Loc::getMessage('RIM_MODULE_FORM_SUCCESS_MESSAGE')?>';

    $(document).ready(function () {
        // action
        $("form").submit(function () {
            const $form = $(this);

            const formData = new FormData();

            let optionsList = {};
            $form.find('input[type=checkbox]').each(function (i, el) {
                let checked = (el.checked) ? 'Y' : '';
                optionsList[el.name] = checked
            })

            formData.append('sessid', BX.bitrix_sessid());
            formData.append('data', JSON.stringify(optionsList));

            $.ajax({
                url: '',
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                beforeSend: function () {
                    $('.adm-info-message-red').hide();
                    $('.adm-info-message-green').hide();

                    // start animate
                    BX.showWait();
                    BX.style(document.querySelector('.adm-detail-block'), 'opacity', 0.5);

                    // catch all input in div and disabled their
                    $('.adm-detail-content-btns').find('input').attr('disabled', 'true');
                }
            }).done(function (json) {
                if ('ok' === json.result) {
                    window.setTimeout(function () {
                        $('.adm-info-message-green').show();
                        $('#success-message-block').html(successMassage);

                        // end animate
                        BX.closeWait();
                        BX.style(document.querySelector('.adm-detail-block'), 'opacity', 1);
                    }, 3000);
                    $('.adm-detail-content-btns').find('input').removeAttr('disabled');
                } else {
                    $('.adm-info-message-red').show();
                    $('#error-message-block').text(json.error);

                    // end animate
                    BX.closeWait();
                    BX.style(document.querySelector('.adm-detail-block'), 'opacity', 1);
                    $('.adm-detail-content-btns').find('input').removeAttr('disabled');
                }
            });
            // disabling the default action
            return false;
        });
    });
</script>

