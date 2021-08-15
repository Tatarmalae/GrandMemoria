<?php
/**
 * @var $arParams
 */
?>
<div class="map-wrap">
    <div class="map">
        <div class="map__inner">
            <div id="mapAddresses" data-center='<?= json_encode($arParams['ADDRESS'][0]) ?>' data-coordinates='<?= json_encode($arParams['ADDRESS'], true) ?>'></div>
        </div>
    </div>
</div>