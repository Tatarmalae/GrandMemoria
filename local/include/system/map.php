<?php
/**
 * @var $arParams
 */
?>
<div class="map">
    <div class="map__inner">
        <div id="<?= $arParams['ID'] ?>" data-center='<?= json_encode($arParams['ADDRESS'][0]) ?>' data-coordinates='<?= json_encode($arParams['ADDRESS'], true) ?>'></div>
    </div>
</div>