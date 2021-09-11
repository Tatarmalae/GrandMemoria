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
$this->SetViewTarget('no_bg');
echo ' title_not-bg';
$this->EndViewTarget();
?>

<?php $this->SetViewTarget('after_title') ?>
<span class="label label_small label_marengo">
        <?= $arResult['IBLOCK_SECTION']['NAME'] ?>
    </span>
<?php $this->EndViewTarget() ?>

<?php $this->SetViewTarget('before_parent_sect') ?>
<div class="article-bg">
    <div class="img">
        <div class="img__inner object-fit">
            <picture>
                <source media="(max-width:1279px)" data-srcset="<?= CFile::GetPath($arResult['PREVIEW_PICTURE']['ID']) ?>" srcset="">
                <img class="lazy" data-src="<?= CFile::GetPath($arResult['DETAIL_PICTURE']['ID']) ?>" alt="<?= $arResult['NAME'] ?>" src="">
            </picture>
        </div>
    </div>
</div>
<?php $this->EndViewTarget() ?>

<article>
    <?= $arResult['DETAIL_TEXT'] ?>
    <?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/stock_banner.php", [], ["SHOW_BORDER" => true]); ?>
</article>
