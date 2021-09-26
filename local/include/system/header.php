<?php
/**
 * @var $APPLICATION
 */

use Bitrix\Main\Config\Option;
use Dev\Basket;

?>
<header class="header">
    <div class="header__info">
        <div class="header__inner">
            <div class="logo-link">
                <div class="logo-wrap">
                    <a class="logo" href="<?= SITE_DIR ?>">
                        <img src="<?= SITE_STYLE_PATH ?>/img/general/logo.svg" alt="<?= SITE_SERVER_NAME ?>"/>
                    </a>
                    <div class="logo-text">
                        <?= Option::get("askaron.settings", "UF_LOGO_TEXT"); ?>
                        <strong>
                            <?= Option::get("askaron.settings", "UF_SHEDULE"); ?>
                        </strong>
                    </div>
                </div>
            </div>
            <div class="header__group">
                <div class="header__column header__column_address">
                    <div class="header-contacts">
                        <svg class="icon__address" width="20" height="20">
                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#address"></use>
                        </svg>
                        <span>
                            <?= Option::get("askaron.settings", "UF_ADDRESS_HEADER"); ?>
                        </span>
                        <a href="/contacts/">
                            <strong>Все наши адреса</strong>
                        </a>
                    </div>
                </div>
                <div class="header__column header__column_address">
                    <div class="header-contacts">
                        <svg class="icon__phone" width="20" height="20">
                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#phone"></use>
                        </svg>
                        <span>
                            <a href="tel:+<?= preg_replace('~\D+~', '', Option::get("askaron.settings", "UF_PHONE")) ?>">
                                <?= Option::get("askaron.settings", "UF_PHONE"); ?>
                            </a>
                        </span>
                        <a href="#" data-toggle="modal" data-target="#modalCall">
                            <strong>Заказать звонок</strong>
                        </a>
                    </div>
                </div>
                <div class="header__column header__column_btn header__column_basket">
                    <div class="btn-basket__yes">
                        <a class="btn btn-blue-light small btn-basket" href="/basket/">
                            <span class="btn__arrow">
                                <svg class="icon__basket" width="20" height="20">
                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#basket"></use>
                                </svg>
                            </span>
                            <span class="btn__text">
                                <span data-text="Корзина">Корзина
                                    <span class="btn-basket__count"><?= Basket::getCount() ?></span>
                                </span>
                            </span>
                        </a>
                        <span class="btn-basket__add"><?= Basket::getCount() ?></span>
                    </div>
                </div>
                <div class="header__column header__column_btn header__column_calculation">
                    <a class="btn btn-blue small" href="/calculation/">
                        <span class="btn__text">
                            <span data-text="Расчет похорон">Расчет похорон</span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="header__main">
        <div class="header__inner">
            <div class="header__main-nav">
                <?php $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "top",
                    [
                        "ROOT_MENU_TYPE" => "top",
                        "MAX_LEVEL" => "2",
                        "CHILD_MENU_TYPE" => "left",
                        "USE_EXT" => "Y",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "N",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => [],
                        "COMPONENT_TEMPLATE" => "top",
                    ],
                    false
                ); ?>
            </div>
            <div class="search">
                <form action="/search/" method="get">
                    <div class="search__inner">
                        <div class="search__text">
                            <label>
                                <input type="text" name="q" placeholder="Поиск"/>
                            </label>
                        </div>
                        <div class="search__icon">
                            <svg class="icon__search" width="20" height="20">
                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#search"></use>
                            </svg>
                        </div>
                        <div class="search__close">
                            <svg class="icon__close-modal" width="24" height="24">
                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#close-modal"></use>
                            </svg>
                        </div>
                    </div>
                </form>
            </div>
            <div class="burger">
                <div class="burger__line"></div>
                <div class="burger__line"></div>
                <div class="burger__line"></div>
            </div>
        </div>
    </div>
</header>