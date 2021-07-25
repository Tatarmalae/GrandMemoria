<?php

use Bitrix\Main\Diag\Debug;
use Dev\Catalog;

try {
    $arMenu = Catalog::getIBlockListByTypeID('info');
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}
?>
<?php if (!empty($arMenu)): ?>
    <div class="information-items information-items_btn items">
        <?php foreach ($arMenu as $item): ?>
            <a class="information-item item link-item" href="<?= \CIBlock::ReplaceDetailUrl($item['LIST_PAGE_URL'], [], true, 'S') ?>">
                <div class="box">
                    <?php if (!empty($item['ICO'])): ?>
                        <div class="information-item__icon">
                            <img src="<?= CFile::GetPath($item['ICO']) ?>" alt="<?= $item['NAME'] ?>">
                        </div>
                    <?php endif ?>
                    <h4><?= $item['NAME'] ?></h4>
                    <?php if (!empty($item['DESCRIPTION'])): ?>
                        <p><?= $item['DESCRIPTION'] ?></p>
                    <?php endif ?>
                    <div class="more-btn">
                        <button class="slider-btn slider-btn_next" type="button">
                            <svg class="icon__slider-next" width="32" height="32">
                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#slider-next"></use>
                            </svg>
                        </button>
                    </div>
                </div>
            </a>
        <?php endforeach ?>
    </div>
<?php endif ?>