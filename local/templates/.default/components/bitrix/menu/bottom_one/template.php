<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var $arParams */
$this->setFrameMode(true);
?>
<?php if (!empty($arResult)): ?>
    <div class="footer__links">
        <?php foreach ($arResult as $arItem): ?>
            <?php if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) continue; ?>
            <div class="footer__links-item">
                <a class="footer__links-link<?= !empty($arItem["SELECTED"]) ? ' selected' : '' ?>" href="<?= $arItem["LINK"] ?>">
                    <?= $arItem["TEXT"] ?>
                </a>
            </div>
        <?php endforeach ?>
    </div>
<?php endif ?>