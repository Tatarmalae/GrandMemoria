<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;
if (empty($arResult)) return "";

$strReturn = '<nav class="breadcrumb-wrapper" aria-label="breadcrumb" itemprop="http://schema.org/breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList"><ul class="breadcrumb breadcrumb_white">';
$itemSize = count($arResult);

for ($index = 0; $index < $itemSize; $index++) {
    $title = htmlspecialcharsex($arResult[$index]["TITLE"]);
    $arrow = ($index > 0 ? '<svg class="icon__arrow-right" width="16" height="16"><use xlink:href="' . SITE_STYLE_PATH . '/img/general/svg-symbols.svg#arrow-right"></use></svg>' : '');

    if ($arResult[$index]["LINK"] <> "" && $index != $itemSize - 1) {
        $strReturn .= '
			<li class="breadcrumb-item" id="bx_breadcrumb_' . $index . '" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				' . $arrow . '
				<a href="' . $arResult[$index]["LINK"] . '" title="' . $title . '" itemprop="item">
					<span itemprop="name">' . $title . '</span>
				</a>
				<meta itemprop="position" content="' . ($index + 1) . '" />
			</li>';
    } else {
        $strReturn .= '
			<li class="breadcrumb-item" aria-current="page">
				' . $arrow . '
				...
			</li>';
    }
}
$strReturn .= '</ul></nav>';
return $strReturn;