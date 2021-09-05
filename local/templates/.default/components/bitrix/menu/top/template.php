<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?php if (!empty($arResult)): ?>
    <nav class="nav-menu">
        <?php $previousLevel = 0; ?>
        <?php foreach ($arResult as $arItem): ?>
            <?= ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel) ? str_repeat("</ul></div></div></div></div></div>", ($previousLevel - $arItem["DEPTH_LEVEL"])) : ''; ?>
            <?php if ($arItem["IS_PARENT"]): ?>
                <?php if ($arItem["DEPTH_LEVEL"] == 1): ?>
                    <div class="nav-menu__item nav-menu__item_drop">
                        <a class="nav-menu__link<?= $arItem["SELECTED"] ? ' selected' : '' ?>" href="<?= $arItem["LINK"] ?>">
                            <span><?= $arItem["TEXT"] ?></span>
                        </a>
                        <div class="megamenu">
                            <span class="megamenu__close">
                                <svg class="icon__close-modal" width="40" height="40">
                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#close-modal"></use>
                                </svg>
                            </span>
                            <div class="megamenu-wrap">
                                <div class="content">
                                    <div class="megamenu-content">
                                        <div class="megamenu-top">
                                            <a class="megamenu__link" href="<?= $arItem["LINK"] ?>">
                                                <span><?= $arItem["TEXT"] ?></span>
                                                <svg class="icon__arrow-right" width="28" height="28">
                                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                                                </svg>
                                            </a>
                                        </div>
                                        <ul class="megamenu-menu">
                <?php else: ?>
                    <div class="nav-menu__item">
                        <a class="nav-menu__link<?= $arItem["SELECTED"] ? ' selected' : '' ?>" href="<?= $arItem["LINK"] ?>">
                            <span><?= $arItem["TEXT"] ?></span>
                        </a>
                <?php endif ?>
            <?php else: ?>
                <?php if ($arItem["PERMISSION"] > "D"): ?>
                    <?php if ($arItem["DEPTH_LEVEL"] == 1): ?>
                        <div class="nav-menu__item">
                            <a class="nav-menu__link<?= $arItem["SELECTED"] ? ' selected' : '' ?>" href="<?= $arItem["LINK"] ?>">
                                <span><?= $arItem["TEXT"] ?></span>
                            </a>
                        </div>
                    <?php else: ?>
                        <li class="megamenu-menu__item">
                            <a class="megamenu-menu__link<?= $arItem["SELECTED"] ? ' selected' : '' ?>" href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a>
                        </li>
                    <?php endif ?>
                <?php endif ?>
            <?php endif ?>
            <?php $previousLevel = $arItem["DEPTH_LEVEL"];?>
        <?php endforeach ?>
        <?= ($previousLevel > 1) ? str_repeat("</div>", ($previousLevel - 1)) : '' ?>
    </nav>
<?php endif ?>