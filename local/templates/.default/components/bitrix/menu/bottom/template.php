<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?php if (!empty($arResult)): ?>
    <?php $previousLevel = 0; ?>
    <?php foreach ($arResult as $arItem): ?>
        <?= ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel) ? str_repeat("</ul></div><span class='footer__sublist-label'>+ Еще</span></div>", ($previousLevel - $arItem["DEPTH_LEVEL"])) : ''; ?>
        <?php if ($arItem["IS_PARENT"]): ?>
            <?php if ($arItem["DEPTH_LEVEL"] == 1): ?>
                <div class="footer__column">
                    <div class="footer__list">
                        <a class="footer__list-title<?= $arItem["SELECTED"] ? ' selected' : '' ?>" href="<?= $arItem["LINK"] ?>">
                            <?= $arItem["TEXT"] ?>
                        </a>
                        <ul class="footer__sublist">
            <?php else: ?>
                <li class="footer__sublist-item">
                    <a class="footer__sublist-link<?= $arItem["SELECTED"] ? ' selected' : '' ?>" href="<?= $arItem["LINK"] ?>">
                        <?= $arItem["TEXT"] ?>
                    </a>
            <?php endif ?>
        <?php else: ?>
            <?php if ($arItem["PERMISSION"] > "D"): ?>
                <?php if ($arItem["DEPTH_LEVEL"] == 1): ?>
                    <div class="footer__column">
                        <a class="footer__list-title<?= $arItem["SELECTED"] ? ' selected' : '' ?>" href="<?= $arItem["LINK"] ?>">
                            <?= $arItem["TEXT"] ?>
                        </a>
                    </div>
                <?php else: ?>
                    <li class="footer__sublist-item">
                        <a class="footer__sublist-link<?= $arItem["SELECTED"] ? ' selected' : '' ?>" href="<?= $arItem["LINK"] ?>">
                            <?= $arItem["TEXT"] ?>
                        </a>
                    </li>
                <?php endif ?>
            <?php endif ?>
        <?php endif ?>
        <?php $previousLevel = $arItem["DEPTH_LEVEL"];?>
    <?php endforeach ?>
    <?= ($previousLevel > 1) ? str_repeat("</li>", ($previousLevel - 1)) : '' ?>
<?php endif ?>