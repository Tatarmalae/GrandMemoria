<?php

/** @var $arParams */

use Bitrix\Main\Diag\Debug;
use Dev\Catalog;

try {
    $arResult = Catalog::getHLBlockByTableName('b_hlbd_placement', false);
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}
?>
<?php if (!empty($arResult)): ?>
    <section class="rating">
        <div class="content">
            <div class="heading">
                <div class="heading__content">
                    <h2><?= $arParams['TITLE'] ?></h2>
                </div>
            </div>
            <div class="rating-items items">
                <?php foreach ($arResult as $item): ?>
                    <div class="rating-item item">
                        <div class="rating-wrap">
                            <div class="rating-item__icon">
                                <img src="<?= CFile::GetPath($item['UF_FILE']) ?>" alt="<?= $item['UF_NAME'] ?>">
                            </div>
                            <div class="rating-info">
                                <?php if (!empty($item['UF_DESCRIPTION'])): ?>
                                    <span class="rating-info__count">
                                        <?= $item['UF_DESCRIPTION'] ?>
                                    </span>
                                <?php endif ?>
                                <div class="rating-info__stars">

                                    <div class="stars">
                                        <?php for ($i = 0; $i < (int)$item['UF_DESCRIPTION']; $i++): ?>
                                            <div class="star">
                                                <svg class="icon__star" width="28" height="28">
                                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#star"></use>
                                                </svg>
                                            </div>
                                        <?php endfor ?>
                                    </div>
                                    <?php if (!empty($item['UF_FULL_DESCRIPTION'])): ?>
                                        <div class="rating-info__sum">
                                            Отзывов: <?= $item['UF_FULL_DESCRIPTION'] ?>
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                <?php if($arParams['SHOW_MORE'] === 'Y'): ?>
                    <div class="rating-item item">
                        <a class="rating-more" href="/reviews/">
                            <div class="rating-more__content">
                                <span class="h5">Смотреть отзывы</span>
                                <div class="slider-btn slider-btn_white slider-btn_next">
                                    <svg class="icon__slider-next" width="32" height="32">
                                        <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-next"></use>
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </section>
<?php endif ?>