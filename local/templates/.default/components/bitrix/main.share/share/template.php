<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $arResult
 */
?>
<?php if ($arResult["PAGE_URL"]) : ?>
    <div class="socials-icons">
        <?php if (is_array($arResult["BOOKMARKS"]) && count($arResult["BOOKMARKS"]) > 0) : ?>
            <?php foreach (array_reverse($arResult["BOOKMARKS"]) as $name => $arBookmark): ?>
                <?= $arBookmark["ICON"] ?>
            <?php endforeach ?>
        <?php endif ?>
    </div>
<?php else : ?>
    <?= GetMessage("SHARE_ERROR_EMPTY_SERVER") ?>
<?php endif ?>