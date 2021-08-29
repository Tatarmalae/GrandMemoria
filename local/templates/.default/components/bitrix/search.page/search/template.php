<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
?>
<?php $this->SetViewTarget('after_title') ?>
<div class="results-form">
    <form class="default-form" id="formResults" action="" method="get">
        <input type="hidden" name="how" value="<?= $arResult["REQUEST"]["HOW"] == "d" ? "d" : "r" ?>"/>
        <div class="form-input">
            <input class="form-control<?= ($arResult["REQUEST"]["QUERY"]) ? ' valid is-focus' : '' ?>" id="resultsName" type="text" name="q" value="<?= $arResult["REQUEST"]["QUERY"] ?>" size="40"/>
            <label class="form-input__label" for="resultsName">
                <span>Поиск по сайту</span>
            </label>
        </div>
        <div class="form-btn">
            <?php // TODO: баг в js - при нажатии submit всплывает popup успешной отправки]!?>
            <button type="submit" class="btn btn-blue big">
                <span class="btn__arrow">
                    <svg class="icon__search" width="20" height="20">
                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#search"></use>
                    </svg>
                </span>
                <span class="btn__text">
                    <span>Найти</span>
                </span>
            </button>
        </div>
    </form>
</div>
<?php $this->EndViewTarget() ?>

<?php if (count($arResult["SEARCH"]) > 0): ?>
    <div class="results-links">
        <?php foreach ($arResult["SEARCH"] as $arItem): ?>
            <div class="results-link">
                <h4>
                    <a href="<?= $arItem["URL"] ?>">
                        <?= $arItem["TITLE_FORMATED"] ?>
                    </a>
                </h4>
                <p><?= $arItem["BODY_FORMATED"] ?></p>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="results-empty">
        <p>К сожалению на ваш поисковой запрос не чего не найдено</p>
    </div>
    <?php $this->SetViewTarget('after_parent_sect'); ?>

    <?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/types.php", ['TITLE' => 'Возможно вам нужно'], ["SHOW_BORDER" => true]); ?>

    <?php $this->EndViewTarget() ?>
<?php endif; ?>
<?php if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <?= $arResult["NAV_STRING"] ?>
<?php endif; ?>
<style>
    .results-link b {
        font-weight: 700;
    }
</style>