<header class="header">
    <div class="header__info">
        <div class="header__inner">
            <div class="logo-link">
                <div class="logo-wrap">
                    <a class="logo" href="<?= SITE_DIR ?>">
                        <img src="<?= SITE_STYLE_PATH ?>/img/general/logo.svg" alt=""/>
                    </a>
                    <div class="logo-text">
                        <?= \Bitrix\Main\Config\Option::get("askaron.settings", "UF_LOGO_TEXT"); ?>
                        <strong>
                            <?= \Bitrix\Main\Config\Option::get("askaron.settings", "UF_SHEDULE"); ?>
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
                            <?= \Bitrix\Main\Config\Option::get("askaron.settings", "UF_ADDRESS_HEADER"); ?>
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
                        <a href="tel:+<?= preg_replace('~\D+~', '', \Bitrix\Main\Config\Option::get("askaron.settings", "UF_PHONE")) ?>">
                            <?= \Bitrix\Main\Config\Option::get("askaron.settings", "UF_PHONE"); ?>
                        </a>
                        <a href="#" data-toggle="modal" data-target="#modalCall">
                            <strong>Заказать звонок</strong>
                        </a>
                    </div>
                </div>
                <div class="header__column header__column_btn header__column_basket">
                    <a class="btn btn-blue-light small btn-basket" href="/basket/">
                        <span class="btn__arrow">
                            <svg class="icon__basket" width="20" height="20">
                                <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#basket"></use>
                            </svg>
                        </span>
                        <span class="btn__text">
                            <span data-text="Корзина">Корзина
                                <span class="btn-basket__count">0</span>
                            </span>
                        </span>
                        <span class="btn-basket__add">2</span>
                    </a>
                </div>
                <div class="header__column header__column_btn header__column_calculation">
                    <a class="btn btn-blue small" href="/calc/">
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
                <nav class="nav-menu">
                    <div class="nav-menu__item nav-menu__item_drop">
                        <a class="nav-menu__link" href="#">
                            <span>Каталог товаров</span>
                        </a>
                        <div class="megamenu">
                            <span class="megamenu__close">
                                <svg class="icon__close-modal" width="40" height="40">
                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#close-modal"></use>
                                </svg>
                            </span>
                            <div class="megamenu-wrap">
                                <div class="content">
                                    <div class="megamenu-content">
                                        <div class="megamenu-top">
                                            <a class="megamenu__link" href="#">
                                                <span>Каталог товаров</span>
                                                <svg class="icon__arrow-right" width="28" height="28">
                                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                                                </svg>
                                            </a>
                                        </div>
                                        <ul class="megamenu-menu">
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">Памятники</a>
                                            </li>
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">Ограды</a>
                                            </li>
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">Венки и корзины</a>
                                            </li>
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">Траурные ленты</a>
                                            </li>
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">Благоустройство</a>
                                            </li>
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">Гробы</a>
                                            </li>
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">Таблички</a>
                                            </li>
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">Мусульманские принадлежности</a>
                                            </li>
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">Аксессуары</a>
                                            </li>
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">Кресты</a>
                                            </li>
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">Одежда</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav-menu__item nav-menu__item_drop">
                        <a class="nav-menu__link" href="#">
                            <span>Ритуальные услуги</span>
                        </a>
                        <div class="megamenu">
                            <span class="megamenu__close">
                                <svg class="icon__close-modal" width="40" height="40">
                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#close-modal"></use>
                                </svg>
                            </span>
                            <div class="megamenu-wrap">
                                <div class="content">
                                    <div class="megamenu-content">
                                        <div class="megamenu-top">
                                            <a class="megamenu__link" href="#">
                                                <span>Ритуальные услуги</span>
                                                <svg class="icon__arrow-right" width="28" height="28">
                                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                                                </svg>
                                            </a>
                                        </div>
                                        <ul class="megamenu-menu">
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">Организация похорон</a>
                                            </li>
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">Оформление бумаг о смерти</a>
                                            </li>
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">Погребение умершего</a>
                                            </li>
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">Похороны ветеранов ВОВ</a>
                                            </li>
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">Кремация тела умершего</a>
                                            </li>
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">Омовение тела умершего</a>
                                            </li>
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">Установка памятников</a>
                                            </li>
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">Груз 200</a>
                                            </li>
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">Перевозка тела умершего</a>
                                            </li>
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">Услуги священнослужителя</a>
                                            </li>
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">Гравировка памятников</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav-menu__item">
                        <a class="nav-menu__link" href="#">
                            <span>Акции и скидки</span>
                        </a>
                    </div>
                    <div class="nav-menu__item">
                        <a class="nav-menu__link" href="#">
                            <span>Отзывы</span>
                        </a>
                    </div>
                    <div class="nav-menu__item nav-menu__item_drop">
                        <a class="nav-menu__link" href="#">
                            <span>Полезная информация</span>
                        </a>
                        <div class="megamenu">
                            <span class="megamenu__close">
                                <svg class="icon__close-modal" width="40" height="40">
                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#close-modal"></use>
                                </svg>
                            </span>
                            <div class="megamenu-wrap">
                                <div class="content">
                                    <div class="megamenu-content">
                                        <div class="megamenu-top">
                                            <a class="megamenu__link" href="#">
                                                <span>Полезная информация</span>
                                                <svg class="icon__arrow-right" width="28" height="28">
                                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                                                </svg>
                                            </a>
                                        </div>
                                        <ul class="megamenu-menu">
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">Наши работы</a>
                                            </li>
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">Рассрочка на памятники</a>
                                            </li>
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">Вопрос–ответ</a>
                                            </li>
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">Цены на комплекты</a>
                                            </li>
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">Оплата и доставка</a>
                                            </li>
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">Морги и кладбища</a>
                                            </li>
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">Оптовая продажа гранита и мрамора</a>
                                            </li>
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">О компании</a>
                                            </li>
                                            <li class="megamenu-menu__item">
                                                <a class="megamenu-menu__link" href="#">Статьи</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav-menu__item">
                        <a class="nav-menu__link" href="#">
                            <span>Контакты</span>
                        </a>
                    </div>
                </nav>
            </div>
            <div class="search">
                <div class="search__inner">
                    <div class="search__text">
                        <input type="search" placeholder="Поиск"/>
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
            </div>
            <div class="burger">
                <div class="burger__line"></div>
                <div class="burger__line"></div>
                <div class="burger__line"></div>
            </div>
        </div>
    </div>
</header>