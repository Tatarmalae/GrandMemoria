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
    <?php $this->SetViewTarget('before_parent_sect'); ?>
    <div class="categories">
        <div class="content">
            <ul class="nav nav-tabs categories-items" id="priceTab" role="tablist">
                <?php foreach ($arResult['TAGS'] as $key => $tag): ?>
                    <li class="nav-item categories-li">
                        <a class="nav-link categories-item<?= $key == 0 ? ' active' : '' ?>" id="tab-<?= $key + 1 ?>" href="#tab<?= $key + 1 ?>" data-toggle="tab" role="tab" aria-controls="tab<?= $key + 1 ?>" aria-selected="<?= $key == 0 ? 'true' : 'false' ?>">
                            <span><?= $tag['NAME'] ?></span>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
    <?php $this->EndViewTarget(); ?>
<?php endif ?>

<div class="tab-content" id="priceTabContent">
    <?php foreach ($arResult['TAGS'] as $key => $tag): ?>
        <div class="tab-pane fade<?= $key == 0 ? ' show active' : '' ?>" id="tab<?= $key + 1 ?>" role="tabpanel" aria-labelledby="tab-<?= $key + 1 ?>">
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
                                <a class="btn btn-blue big btn-block" href="#" data-toggle="modal" data-target="#modalCheckout" data-theme="<?= $arItem['ID'] ?>">
                                    <span class="btn__text">
                                        <span data-text="Заказать">Заказать</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    <?php endforeach ?>
</div>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/feedback_form.php", [], ["SHOW_BORDER" => true]); ?>
