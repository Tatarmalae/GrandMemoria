<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var $arResult
 * @var $arParams
 * @var $APPLICATION
 */

use Bitrix\Main\Diag\Debug;
use Dev\Catalog;

try {
    $arResult = current(Catalog::getElementList(42, '', [], 1, ['CODE' => 'all']));
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}
if (count($arResult) == 0) return;
?>
<section class="article">
    <div class="content">
        <article>
            <?= $arResult['PREVIEW_TEXT'] ?>
        </article>
    </div>
</section>
