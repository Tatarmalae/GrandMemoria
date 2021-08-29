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
if (empty($arResult)) return;
?>
<div class="catalog-items items" data-type="line">
    <?php foreach ($arResult['SECTIONS'] as $sections): ?>
        <div class="catalog-item item link-item">
            <div class="box">
                <a class="catalog-item__img img" href="<?= $sections['SECTION_PAGE_URL'] ?>">
                    <div class="img__inner object-fit">
                        <img class="lazy" data-src="<?= CFile::GetPath($sections['PICTURE']['ID']) ?>" alt="" src="<?= $sections['NAME'] ?>">
                    </div>
                </a>
                <div class="catalog-item__content">
                    <h4>
                        <a href="<?= $sections['SECTION_PAGE_URL'] ?>">
                            <?= $sections['NAME'] ?>
                        </a>
                    </h4>
                    <?php if (!empty($sections['ITEMS'])): ?>
                        <ul>
                            <?php foreach ($sections['ITEMS'] as $item): ?>
                                <li>
                                    <a href="<?= $item['SECTION_PAGE_URL'] ?>">
                                        <?= $item['NAME'] ?>
                                    </a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    <?php endif ?>
                    <div class="price price_small">
                        <span class="price-now">
                            <?php //TODO: price ?>
                            от 17 000 ₽
                        </span>
                    </div>
                    <div class="more-btn">
                        <a class="slider-btn slider-btn_next" href="<?= $sections['SECTION_PAGE_URL'] ?>">
                            <svg class="icon__slider-next" width="32" height="32">
                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-next"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>

<?php $this->SetViewTarget('after_parent_sect'); ?>

<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/installment_banner.php", [], ["SHOW_BORDER" => true]); ?>

<?php $this->EndViewTarget() ?>

