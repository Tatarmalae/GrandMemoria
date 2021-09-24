<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $arResult
 */
$clientID = 'navigation_' . $arResult['NavNum'];
$this->setFrameMode(true);

if (!$arResult["NavShowAlways"]) {
    if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false)) return;
}
?>
<div class="filter-bottom">
    <?php
    $strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"] . "&amp;" : "");
    $strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?" . $arResult["NavQueryString"] : "");
    $arResult["nStartPage"] = 1;
    $arResult["nEndPage"] = $arResult["NavPageCount"];

    $sPrevHref = '';
    if ($arResult["NavPageNomer"] > 1) {
        $bPrevDisabled = false;
        if ($arResult["bSavePage"] || $arResult["NavPageNomer"] > 2) {
            $sPrevHref = $arResult["sUrlPath"] . '?' . $strNavQueryString . 'PAGEN_' . $arResult["NavNum"] . '=' . ($arResult["NavPageNomer"] - 1);
        } else {
            $sPrevHref = $arResult["sUrlPath"] . $strNavQueryStringFull;
        }
    } else {
        $bPrevDisabled = true;
    }
    $sNextHref = '';
    if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]) {
        $bNextDisabled = false;
        $sNextHref = $arResult["sUrlPath"] . '?' . $strNavQueryString . 'PAGEN_' . $arResult["NavNum"] . '=' . ($arResult["NavPageNomer"] + 1);
    } else {
        $bNextDisabled = true;
    }
    ?>
    <nav class="pagination-wrapper" aria-label="navigation">
        <ul class="pagination">
            <?php if (!$bPrevDisabled): ?>
                <li class="pagination-item">
                    <a class="pagination-icon" href="<?= $sPrevHref; ?>" id="<?= $clientID ?>_previous_page">
                        <svg class="icon__arrow-right" width="24" height="24" style="transform: rotate(180deg)">
                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                        </svg>
                    </a>
                </li>
            <?php endif; ?>
            <?php
            $bFirst = true;
            $bPoints = false;
            do {
                if ($arResult["nStartPage"] <= 2 || $arResult["nEndPage"] - $arResult["nStartPage"] <= 1 || abs($arResult['nStartPage'] - $arResult["NavPageNomer"]) <= 2) {
                    if ($arResult["nStartPage"] == $arResult["NavPageNomer"]): ?>
                        <li class="pagination-item active">
                            <span class="pagination-link"><?= $arResult["nStartPage"] ?></span>
                        </li>
                    <?php elseif ($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false): ?>
                        <li class="pagination-item">
                            <a class="pagination-link" href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>">
                                <?= $arResult["nStartPage"] ?>
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="pagination-item">
                            <a class="pagination-link" href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>">
                                <?= $arResult["nStartPage"] ?>
                            </a>
                        </li>
                    <?php endif;
                    $bFirst = false;
                    $bPoints = true;
                } else {
                    if ($bPoints) { ?>
                        <li class="pagination-item">
                            <span class="pagination-link">...</span>
                        </li>
                        <?php $bPoints = false;
                    }
                }
                $arResult["nStartPage"]++;
            } while ($arResult["nStartPage"] <= $arResult["nEndPage"]); ?>
            <?php if (!$bNextDisabled): ?>
                <li class="pagination-item">
                    <a class="pagination-icon" href="<?= $sNextHref; ?>" id="<?= $clientID ?>_next_page">
                        <svg class="icon__arrow-right" width="24" height="24">
                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                        </svg>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
    <?php if (!$bNextDisabled): ?>
        <a class="btn btn-blue-light big pagination__more" href="<?= $sNextHref; ?>'" id="<?= $clientID ?>_next_page">
            <span class="btn__text">
                <span data-text="Показать еще">Показать еще</span>
            </span>
        </a>
    <?php endif; ?>
</div>