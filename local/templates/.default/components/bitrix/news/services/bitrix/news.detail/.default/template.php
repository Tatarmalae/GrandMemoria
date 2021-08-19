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
<?php $this->SetViewTarget('cover__bg') ?>
<div class="cover__bg" style="background-image: url(<?= $arResult['DETAIL_PICTURE']['SRC'] ?>)"></div>
<?php $this->EndViewTarget() ?>
<?php $this->SetViewTarget('cover__anons') ?>
<p><?= $arResult['PREVIEW_TEXT'] ?></p>
<div class="more-btn">
    <?php //TODO: передать в модалку ссылку на услугу ?>
    <a class="btn btn-blue big" href="#" data-toggle="modal" data-target="#modalConsultation">
        <span class="btn__text">
            <span data-text="Получить консультацию">Получить консультацию</span>
        </span>
    </a>
</div>
<?php $this->EndViewTarget() ?>
<article>
    <?= $arResult['DETAIL_TEXT'] ?>
    <?php if (!empty($arResult['PROPERTIES']['PRICE_LIST']['VALUE'])): ?>
        <h2><?= $arResult['PROPERTIES']['PRICE_LIST']['NAME'] ?></h2>
        <div class="table">
            <div class="table-head">
                <div class="table-th">Наименование</div>
                <div class="table-th">Цена</div>
            </div>
            <div class="table-body box">
                <?php foreach ($arResult['PROPERTIES']['PRICE_LIST']['VALUE'] as $key => $item): ?>
                    <div class="table-tr">
                        <div class="table-td">
                            <p><?= $item ?></p>
                        </div>
                        <div class="table-td">
                            <span class="table-sum"><?= $arResult['PROPERTIES']['PRICE_LIST']['DESCRIPTION'][$key] ?> ₽</span>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    <?php endif ?>
</article>
