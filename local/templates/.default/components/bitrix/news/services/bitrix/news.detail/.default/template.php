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
    <a class="btn btn-blue big" href="#" data-toggle="modal" data-target="#modalConsultation" data-theme="<?= $arResult['NAME'] ?>">
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
    <?php if (!empty($arResult['PROPERTIES']['PHOTO']['VALUE'])): ?>
        <div class="gallery-items gallery-items_size-4 items">
            <?php foreach ($arResult['PROPERTIES']['PHOTO']['VALUE'] as $key => $arItem): ?>
                <a class="gallery-item item" href="#" data-fancybox="gallery" data-options="{&quot;src&quot; : &quot;<?= CFile::GetPath($arItem) ?>&quot;}" data-caption="<?= $arResult['PROPERTIES']['PHOTO']['DESCRIPTION'][$key] ?>">
                    <div class="gallery-item__img img img-1by1">
                        <div class="gallery__zoom">
                            <div class="gallery__zoom-inner">
                                <svg class="icon__search" width="14" height="14">
                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#search"></use>
                                </svg>
                                <span>Смотреть</span>
                            </div>
                        </div>
                        <div class="img__inner object-fit">
                            <img class="lazy" data-src="<?= CFile::GetPath($arItem) ?>" alt="<?= $arResult['PROPERTIES']['PHOTO']['DESCRIPTION'][$key] ?>">
                        </div>
                    </div>
					<p style="font-size:18px; text-align:center"><?= $arResult['PROPERTIES']['PHOTO']['DESCRIPTION'][$key] ?></p>
                </a>
            <?php endforeach ?>
        </div>
    <?php endif ?>
</article>
