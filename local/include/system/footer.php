<?php
/**
 * @var $APPLICATION
 */

use Bitrix\Main\Config\Option;

?>
<footer class="footer">
    <div class="footer__wrap">
        <div class="footer-top">
            <div class="footer__row">
                <div class="footer__column">
                    <a class="logo-link" href="<?= SITE_DIR ?>">
                        <div class="logo">
                            <img src="<?= SITE_STYLE_PATH ?>/img/general/logo-white.svg" alt="<?= SITE_SERVER_NAME ?>"/>
                        </div>
                    </a>
                    <?php $APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "bottom_one",
                        [
                            "ROOT_MENU_TYPE" => "bottom_one",
                            "MAX_LEVEL" => "2",
                            "CHILD_MENU_TYPE" => "left",
                            "USE_EXT" => "Y",
                            "DELAY" => "N",
                            "ALLOW_MULTI_SELECT" => "N",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "MENU_CACHE_GET_VARS" => [],
                            "COMPONENT_TEMPLATE" => "bottom_one",
                        ],
                        false
                    ); ?>
                </div>
                <div class="footer__column">
                    <?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/components/address_footer.php", [], ["SHOW_BORDER" => true]); ?>
                </div>
                <div class="footer__column footer__column_contacts">
                    <div class="footer__list">
                        <span class="footer__list-title">Способы связи:</span>
                        <div class="footer__contacts">
                            <div class="footer__contacts-item">
                                <a class="footer__contacts-link" href="tel:+<?= preg_replace('~\D+~', '', Option::get("askaron.settings", "UF_PHONE")) ?>">
                                    <span>
                                        <svg class="icon__phone" width="28" height="28">
                                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#phone"></use>
                                        </svg>
                                    </span>
                                    <?= Option::get("askaron.settings", "UF_PHONE"); ?>
                                </a>
                            </div>
                            <div class="footer__contacts-item">
                                <a class="footer__contacts-link" href="mailto:<?= Option::get("askaron.settings", "UF_EMAIL"); ?>">
                                    <span>
                                        <svg class="icon__email" width="24" height="24">
                                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#email"></use>
                                        </svg>
                                    </span>
                                    <?= Option::get("askaron.settings", "UF_EMAIL"); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/components/social_footer.php", [], ["SHOW_BORDER" => true]); ?>
                </div>
            </div>
        </div>
        <div class="footer-center">
            <div class="footer__row">
                <?php $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "bottom",
                    [
                        "ROOT_MENU_TYPE" => "bottom",
                        "MAX_LEVEL" => "2",
                        "CHILD_MENU_TYPE" => "left",
                        "USE_EXT" => "Y",
                        "DELAY" => "N",
                        "ALLOW_MULTI_SELECT" => "N",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "MENU_CACHE_GET_VARS" => [],
                        "COMPONENT_TEMPLATE" => "bottom",
                    ],
                    false
                ); ?>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer__row">
                <div class="footer__column">
                    <div class="footer__copyright">© <?= date('Y') ?> Гранд Мемориа Ритуал</div>
                </div>
                <div class="footer__column">
                    <div class="creator">
                        <div class="creator-text">Разработка сайта «
                            <a href="https://www.behance.net/k_pashukov" target="_blank">k.pashukov</a>
                            »
                        </div>
                    </div>
                </div>
                <div class="footer__column">
                    <a class="footer__link" href="/privacy/">Политика конфиденциальности</a>
                </div>
            </div>
        </div>
    </div>
</footer>