<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $arResult
 */
?>
<?php if (count($arResult["ITEMS"]) > 0): ?>
    <section class="section_padding section_black-haze articles">
        <div class="content">
            <div class="heading">
                <div class="heading__content">
                    <h2>Другие статьи</h2>
                </div>
            </div>
            <div class="articles-items items">
                <?php foreach ($arResult["ITEMS"] as $arItem): ?>
                    <div class="articles-item item">
                        <div class="<?= !empty($arItem['PREVIEW_PICTURE']['ID']) ? 'box' : 'articles-info' ?>">
                            <?php if (!empty($arItem['PREVIEW_PICTURE']['ID'])): ?>
                                <div class="articles-item__img img">
                                    <div class="img__inner object-fit">
                                        <img src="" class="lazy" data-src="<?= CFile::GetPath($arItem['PREVIEW_PICTURE']['ID']) ?>" alt="<?= $arItem['NAME'] ?>">
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="articles-bg">
                                    <img src="" class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/articles/bg.svg" alt="bg">
                                </div>
                            <?php endif ?>
                            <div class="articles-item__content">
                                <?php if (!empty($arItem['IBLOCK_SECTION']['NAME'])): ?>
                                    <span class="label label_small label_marengo">
                                        <?= $arItem['IBLOCK_SECTION']['NAME'] ?>
                                    </span>
                                <?php endif ?>
                                <span class="h4">
                                    <?= $arItem['NAME'] ?>
                                </span>
                                <div class="more">
                                    <a class="more__link" href="<?= $arItem["DETAIL_PAGE_URL"] ?>">
                                        <span>Подробнее</span>
                                        <svg class="icon__arrow-right" width="24" height="24">
                                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
<?php endif ?>
