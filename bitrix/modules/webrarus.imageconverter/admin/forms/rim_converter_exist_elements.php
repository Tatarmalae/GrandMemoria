<?php

declare(strict_types=1);

/**
 * @global $APPLICATION CMain
 */

use Bitrix\Main\Localization\Loc;

CJSCore::Init(['jquery2']);

global $APPLICATION;
$APPLICATION->SetTitle(Loc::getMessage('RIM_CONVERT_EXIST_ELEMENTS'));

#region Get iblock list
$formData = \Rarus\ImageMinify\Main\Utility::getIBlockList([], [], ['ID', 'NAME']);

foreach ($formData as $key => $formItem) {
    $formData[$key] = [
        'name'  => 'IBLOCK_' . $formItem['ID'],
        'title' => $formItem['NAME'],
        'value' => $formItem['ID']
    ];
}
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

        $data = (array)json_decode((string)$request->get('data'));

        $result = false;

        if (is_array($data) && count($data) > 0 && (string)$request->get('getElementList') === 'Y') {
            ob_end_clean();
            echo json_encode([
                'result'   => 'ok',
                'elements' => \Rarus\ImageMinify\Main\Utility::getElementsIdList($data),
                'error'    => ''
            ]);
            exit;
        } elseif ((int)$request->get('element_id') > 0) {
            ob_end_clean();

            echo json_encode([
                'result' => \Rarus\ImageMinify\Events\ConvertImagesToWebp::convertElement(
                    (int)$request->get('element_id')
                ),
                'message' => 'converted',
                'error'  => ''
            ]);
            exit;
        } else {
            throw new Exception(Loc::getMessage('RIM_COMMON_MESSAGE_ERROR_DEFAULT'));
        }

    } catch (Exception $e) {
        ob_end_clean();
        echo json_encode([
            'result' => false,
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
                                    <?= $formItem['title'] ?>
                                </td>
                                <td class="adm-detail-content-cell-r" style="width: 60%">
                                    <input type="checkbox"
                                           name="<?= $formItem['name'] ?>"
                                           id="<?= $formItem['name'] ?>"
                                           value="<?= $formItem['value'] ?>"
                                           class="adm-designed-checkbox">
                                    <label class="adm-designed-checkbox-label"
                                           for="<?= $formItem['name'] ?>"
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

            <!-- region Loader-->
            <div id="progressBar">
                <div id="progressBarFill"></div>
            </div>
            <!-- endregion Loader-->

            <div class="adm-detail-content-btns-wrap" style="left: 0;">
                <div class="adm-detail-content-btns">
                    <input type="submit"
                           name="save"
                           value="<?=Loc::getMessage('RIM_MODULE_FORM_CONVERT_ACTION')?>"
                           title="<?=Loc::getMessage('RIM_MODULE_FORM_SAVE_ACTION')?>"
                           class="adm-btn-save">
                    <input type="button"
                           name="select_all"
                           value="<?=Loc::getMessage('RIM_MODULE_FORM_SELECT_ALL_ACTION')?>"
                           title="<?=Loc::getMessage('RIM_MODULE_FORM_SELECT_ALL_ACTION')?>"
                           id="select-all-checkbox">
                    <input type="reset"
                           name="reset_all"
                           value="<?=Loc::getMessage('RIM_MODULE_FORM_RESET_ACTION')?>"
                           title="<?=Loc::getMessage('RIM_MODULE_FORM_RESET_ACTION')?>"
                           id="reset-all-checkbox">
                </div>
            </div>
        </form>
    </div>
</div>

<style>
    #progressBar {
        background-color: #f2f2f2;
        height: 10px;
        position: relative;
        margin: 0 17px 0 12px;
    }

    #progressBarFill {
        background-color: #4CAF50;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        width: 0;
        transition: width ease-in-out;
    }
</style>

<script>
    let successMassage = '<?=Loc::getMessage('RIM_MODULE_FORM_SUCCESS_MESSAGE')?>';

    $(document).ready(function () {
        // action
        $("form").submit(function () {
            updateProgress(0);

            const $form = $(this);
            const formData = new FormData();

            let optionsList = {};
            $form.find('input[type=checkbox]').each(function (i, el) {
                if (el.checked) {
                    optionsList[el.name] = el.value;
                }
            });

            formData.append('data', JSON.stringify(optionsList));
            formData.append('sessid', BX.bitrix_sessid());
            formData.append('getElementList', 'Y');

            $.ajax({
                url        : '',
                method     : "POST",
                data       : formData,
                processData: false,
                contentType: false,
                dataType   : "json",
                beforeSend : function () {
                    $('.adm-info-message-red').hide();
                    $('.adm-info-message-green').hide();

                    // start animate
                    BX.showWait();
                    BX.style(document.querySelector('.adm-detail-block'), 'opacity', 0.5);

                    // catch all input in div and disabled their
                    $('.adm-detail-content-btns').find('input').attr('disabled', 'true');
                }
            }).done(function (json) {
                if ('ok' === json.result && 0 < json.elements.length) {
                    sendRequest(json.elements, 0)
                }
            });
            // disabling the default action
            return false;
        });

        $('#select-all-checkbox').click(function () {
            $('form input:checkbox').prop('checked', true);
        });

        $('#reset-all-checkbox').click(function () {
            $('form input:checkbox').prop('checked', false);
        });
    });

    function sendRequest(arr, index) {
        if (index < arr.length) {
            const elementData = new FormData();
            elementData.append('element_id', `${arr[index]}`);
            elementData.append('sessid', BX.bitrix_sessid());

            $.ajax({
                url: '?convert=exist&lang=ru',
                method: 'POST',
                data: elementData,
                processData: false,
                contentType: false,
                dataType   : "json",
            })
                .done(response => {

                    // response processing
                    progress = ((index + 1) / arr.length) * 100;

                    updateProgress(progress);
                    // sending a request to the next element of the array
                    return sendRequest(arr, index + 1);
                })
                .fail(error => {
                    // error handling
                    console.error(error);
                    // sending a request to the next element of the array
                    return sendRequest(arr, index + 1);
                });
        } else {
            // if you have reached the end of the array

            // show message
            $('.adm-info-message-green').show();
            $('#success-message-block').html(successMassage);

            // end animate
            BX.closeWait();
            BX.style(document.querySelector('.adm-detail-block'), 'opacity', 1);
            $('.adm-detail-content-btns').find('input').removeAttr('disabled');
            // return empty promise
            return Promise.resolve();
        }
    }

    function updateProgress(progress){
        console.log(progress)
        let progressBarFill = document.getElementById("progressBarFill");
        progressBarFill.style.width = progress + "%";
    }

    // generating arbitrary values of the load band. For debugging.
    // var intervalID = setInterval(function() {
    //     updateProgress(Math.floor(Math.random() * 101));
    // }, 1000);
</script>
