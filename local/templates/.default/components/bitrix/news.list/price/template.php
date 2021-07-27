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
$this->setFrameMode(true);
?>
<?php if (!empty($arResult['TAGS'])): ?>
    <?php $this->SetViewTarget('before_parent_sect');// TODO: какой сценарий? Аякс? Табы? ?>
    <div class="categories">
        <div class="content">
            <div class="categories-items">
                <?php foreach ($arResult['TAGS'] as $key => $tag): ?>
                    <a class="categories-item<?= $key == 0 ? ' categories-item_active' : ''//TODO: после клика активный класс    ?> " href="#<?= $tag['ID'] ?>">
                        <span><?= $tag['NAME'] ?></span>
                    </a>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <?php $this->EndViewTarget(); ?>
<?php endif ?>

<div class="content">
    <?php foreach ($arResult['TAGS'] as $key => $tag): ?>
        <div class="tariffs-items items">
            <?php foreach ($arResult["ITEMS"] as $arItem): ?>
                <?php
                if ($arItem['IBLOCK_SECTION_ID'] !== $tag['ID']) continue;
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), ["CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]);
                ?>
                <div class="tariffs-item item" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <div class="box">
                        <h4><?= $arItem['NAME'] ?></h4>
                        <?php if (!empty($arItem['PREVIEW_TEXT'])): ?>
                            <span class="tariffs-item__price">
                                <?= $arItem['PREVIEW_TEXT'] ?>
                            </span>
                        <?php endif ?>
                        <?php if (!empty($arItem['DETAIL_TEXT'])): ?>
                            <div class="tariffs-item__content">
                                <?= $arItem['DETAIL_TEXT'] ?>
                            </div>
                        <?php endif ?>
                        <div class="more-btn">
                            <a class="btn btn-blue big btn-block" href="#" data-toggle="modal" data-target="#modalCheckout"<?php //TODO: передать id услуги ?>>
                            <span class="btn__text">
                                <span data-text="Заказать">Заказать</span>
                            </span>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    <?php endforeach ?>
</div>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/feedback_form.php", [], ["SHOW_BORDER" => true]); ?>
