<section class="calculation">
    <div class="content">
        <div class="heading">
            <div class="heading__content">
                <h2>Расчет похорон</h2>
            </div>
            <div class="calculation-logo">
                <p>Мы с уважением относимся к памяти об усопшем и традициям религий, берем все на себя.</p>
                <a class="logo-link" href="<?= SITE_DIR ?>">
                    <div class="logo">
                        <img src="<?= SITE_STYLE_PATH ?>/img/general/logo-short.svg" alt="<?= SITE_SERVER_NAME ?>">
                    </div>
                </a>
            </div>
        </div>
        <div class="calculation-wrap">
            <div class="calculation-top">
                <div class="calculation-top__info">
                    <span>Прогресс заполнения</span>
                    <span>
                        <span class="now">1</span>
                        /
                        <span class="all">5</span>
                    </span>
                </div>
                <div class="calculation-line">
                    <div class="calculation-line__inner line" style="width:20%;"></div>
                </div>
            </div>
            <div class="calculation-content">
                <div class="calculation-item calculation-item_active">
                    <h4>Расчет стоимости похорон</h4>
                    <div class="calculation-radio">
                        <div class="calculation-radio__wrap">
                            <div class="radio">
                                <input type="radio" name="radio" id="calculationCheck1_1" value="Захоронение">
                                <label for="calculationCheck1_1">
                                    <span class="radio__box"></span>
                                    Захоронение
                                </label>
                                <div class="radio-bg"></div>
                            </div>
                        </div>
                        <div class="calculation-radio__wrap">
                            <div class="radio">
                                <input type="radio" name="radio" id="calculationCheck1_2" value="Кремация">
                                <label for="calculationCheck1_2">
                                    <span class="radio__box"></span>
                                    Кремация
                                </label>
                                <div class="radio-bg"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="calculation-item">
                    <div class="calculation-group">
                        <h4>Гробы</h4>
                        <div class="calculation-items items">
                            <div class="item">
                                <div class="dropdown dropdown_white dropdown_hint">
                                    <div class="dropdown-label" id="calculationDrop2_1" data-toggle="dropdown" aria-expanded="false">
                                        <svg class="icon__arrow-drop" width="32" height="32">
                                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                        </svg>
                                        <div class="dropdown-wrap">
                                            <div class="dropdown-wrap__column">
                                                <div class="dropdown-hint">Выбрать вид</div>
                                                <div class="dropdown-value">Не выбран</div>
                                            </div>
                                            <div class="dropdown-wrap__column">
                                                <span class="dropdown-sum">от
                                                    <span class="sum">0</span>
                                                    ₽
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="dropdown-menu" aria-labelledby="calculationDrop2_1">
                                        <li data-value="Не выбран" data-sum="0">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Не выбран</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">0</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Гробы обитые тканью" data-sum="4000">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Гробы обитые тканью</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">4000</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Гробы лакированные (классические и комбинированные)" data-sum="14500">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Гробы лакированные (классические и комбинированные)</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">14500</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="гробы Премиум (из элитных пород дерева)" data-sum="40000">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">гробы Премиум (из элитных пород дерева)</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">40000</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Гробы Элитные (двухкрышечные)" data-sum="70000">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Гробы Элитные (двухкрышечные)</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">70000</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Гробы мусульманские" data-sum="12000">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Гробы мусульманские</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">12000</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Гробы Цинковые (материал и опайка)" data-sum="5500">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Гробы Цинковые (материал и опайка)</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">5500</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="dropdown dropdown_white dropdown_hint">
                                    <div class="dropdown-label" id="calculationDrop2_2" data-toggle="dropdown" aria-expanded="false">
                                        <svg class="icon__arrow-drop" width="32" height="32">
                                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                        </svg>
                                        <div class="dropdown-wrap">
                                            <div class="dropdown-wrap__column">
                                                <div class="dropdown-hint">Похоронный комплект в гроб</div>
                                                <div class="dropdown-value">Не выбран</div>
                                            </div>
                                            <div class="dropdown-wrap__column">
                                                <span class="dropdown-sum">от
                                                    <span class="sum">0</span>
                                                    ₽
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="dropdown-menu" aria-labelledby="calculationDrop2_2">
                                        <li data-value="Не выбран" data-sum="0">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Не выбран</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">0</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Х/б (постель, подушка, покрывало)" data-sum="3000">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Х/б (постель, подушка, покрывало)</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">3000</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Шелковый(Постель, подушка, покрывало)" data-sum="4600">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Шелковый(Постель, подушка, покрывало)</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">4600</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Парчовый(Постель, подушка, покрывало)" data-sum="5900">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Парчовый(Постель, подушка, покрывало)</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">5900</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Атласный(Постель, подушка, покрывало)" data-sum="4600">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Атласный(Постель, подушка, покрывало)</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">4600</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="dropdown dropdown_white dropdown_hint">
                                    <div class="dropdown-label" id="calculationDrop2_3" data-toggle="dropdown" aria-expanded="false">
                                        <svg class="icon__arrow-drop" width="32" height="32">
                                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                        </svg>
                                        <div class="dropdown-wrap">
                                            <div class="dropdown-wrap__column">
                                                <div class="dropdown-hint">Композиция на крышку гроба</div>
                                                <div class="dropdown-value">Не выбран</div>
                                            </div>
                                            <div class="dropdown-wrap__column">
                                                <span class="dropdown-sum">от
                                                    <span class="sum">0</span>
                                                    ₽
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="dropdown-menu" aria-labelledby="calculationDrop2_3">
                                        <li data-value="Не выбран" data-sum="0">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Не выбран</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">0</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Композиция из искусственных цветов" data-sum="2000">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Композиция из искусственных цветов</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">2000</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Композиция из живых цветов" data-sum="25000">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Композиция из живых цветов</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">25000</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calculation-group">
                        <h4>Комплект одежды для усопшего</h4>
                        <div class="calculation-items items">
                            <div class="item">
                                <div class="dropdown dropdown_white dropdown_hint">
                                    <div class="dropdown-label" id="calculationDrop2_4" data-toggle="dropdown" aria-expanded="false">
                                        <svg class="icon__arrow-drop" width="32" height="32">
                                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                        </svg>
                                        <div class="dropdown-wrap">
                                            <div class="dropdown-wrap__column">
                                                <div class="dropdown-hint">Комплект</div>
                                                <div class="dropdown-value">Не выбран</div>
                                            </div>
                                            <div class="dropdown-wrap__column">
                                                <span class="dropdown-sum">от
                                                    <span class="sum">0</span>
                                                    ₽
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="dropdown-menu" aria-labelledby="calculationDrop2_4">
                                        <li data-value="Не выбран" data-sum="0">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Не выбран</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">0</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Костюм мужской похоронный" data-sum="4900">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Костюм мужской похоронный</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">4900</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Костюм женский похоронный" data-sum="4900">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Костюм женский похоронный</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">4900</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Саван мусульманский мужской" data-sum="2000">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Саван мусульманский мужской</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">2000</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Саван мусульманский женский" data-sum="2000">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Саван мусульманский женский</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">2000</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="calculation-item">
                    <div class="calculation-group">
                        <h4>Венки</h4>
                        <div class="calculation-items items">
                            <div class="item">
                                <div class="dropdown dropdown_white dropdown_hint">
                                    <div class="dropdown-label" id="calculationDrop3_1" data-toggle="dropdown" aria-expanded="false">
                                        <svg class="icon__arrow-drop" width="32" height="32">
                                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                        </svg>
                                        <div class="dropdown-wrap">
                                            <div class="dropdown-wrap__column">
                                                <div class="dropdown-hint">Венок</div>
                                                <div class="dropdown-value">Не выбран</div>
                                            </div>
                                            <div class="dropdown-wrap__column">
                                                <span class="dropdown-sum">от
                                                    <span class="sum">0</span>
                                                    ₽
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="dropdown-menu" aria-labelledby="calculationDrop3_1">
                                        <li data-value="Не выбран" data-sum="0">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Не выбран</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">0</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Венок 90-180см «Стандарт»" data-sum="2100">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Венок 90-180см «Стандарт»</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">2100</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Венок 90-180см «Заказной»" data-sum="2500">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Венок 90-180см «Заказной»</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">2500</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Венок 90-180см «Элит»" data-sum="3900">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Венок 90-180см «Элит»</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">3900</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Венок из живых цветов «Заказной»" data-sum="25000">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Венок из живых цветов «Заказной»</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">25000</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="dropdown dropdown_white dropdown_hint">
                                    <div class="dropdown-label" id="calculationDrop3_2" data-toggle="dropdown" aria-expanded="false">
                                        <svg class="icon__arrow-drop" width="32" height="32">
                                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                        </svg>
                                        <div class="dropdown-wrap">
                                            <div class="dropdown-wrap__column">
                                                <div class="dropdown-hint">Венок в изголовье</div>
                                                <div class="dropdown-value">Не выбран</div>
                                            </div>
                                            <div class="dropdown-wrap__column">
                                                <span class="dropdown-sum">от
                                                    <span class="sum">0</span>
                                                    ₽
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="dropdown-menu" aria-labelledby="calculationDrop3_2">
                                        <li data-value="Не выбран" data-sum="0">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Не выбран</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">0</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Венок в изголовье" data-sum="1200">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Венок в изголовье</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">1200</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="dropdown dropdown_white dropdown_hint">
                                    <div class="dropdown-label" id="calculationDrop3_3" data-toggle="dropdown" aria-expanded="false">
                                        <svg class="icon__arrow-drop" width="32" height="32">
                                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                        </svg>
                                        <div class="dropdown-wrap">
                                            <div class="dropdown-wrap__column">
                                                <div class="dropdown-hint">Траурная лента</div>
                                                <div class="dropdown-value">Не выбран</div>
                                            </div>
                                            <div class="dropdown-wrap__column">
                                                <span class="dropdown-sum">от
                                                    <span class="sum">0</span>
                                                    ₽
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="dropdown-menu" aria-labelledby="calculationDrop3_3">
                                        <li data-value="Не выбран" data-sum="0">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Не выбран</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">0</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Траурная лента" data-sum="900">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Траурная лента</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">900</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calculation-group">
                        <h4>Кресты</h4>
                        <div class="calculation-items items">
                            <div class="item">
                                <div class="dropdown dropdown_white dropdown_hint">
                                    <div class="dropdown-label" id="calculationDrop3_4" data-toggle="dropdown" aria-expanded="false">
                                        <svg class="icon__arrow-drop" width="32" height="32">
                                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                        </svg>
                                        <div class="dropdown-wrap">
                                            <div class="dropdown-wrap__column">
                                                <div class="dropdown-hint">Материал</div>
                                                <div class="dropdown-value">Не выбран</div>
                                            </div>
                                            <div class="dropdown-wrap__column">
                                                <span class="dropdown-sum">от
                                                    <span class="sum">0</span>
                                                    ₽
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="dropdown-menu" aria-labelledby="calculationDrop3_4">
                                        <li data-value="Не выбран" data-sum="0">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Не выбран</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">0</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Крест из металла" data-sum="3800">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Крест из металла</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">3800</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Крест (сосна) 200-260см." data-sum="3500">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Крест (сосна) 200-260см.</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">3500</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Крест (дуб) 200-260см." data-sum="5200">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Крест (дуб) 200-260см.</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">5200</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Крест резной 200-260 см (Орех, дуб, сосна)" data-sum="9000">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Крест резной 200-260 см (Орех, дуб, сосна)</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">9000</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="dropdown dropdown_white dropdown_hint">
                                    <div class="dropdown-label" id="calculationDrop3_5" data-toggle="dropdown" aria-expanded="false">
                                        <svg class="icon__arrow-drop" width="32" height="32">
                                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                        </svg>
                                        <div class="dropdown-wrap">
                                            <div class="dropdown-wrap__column">
                                                <div class="dropdown-hint">Табличка на крест</div>
                                                <div class="dropdown-value">Не выбран</div>
                                            </div>
                                            <div class="dropdown-wrap__column">
                                                <span class="dropdown-sum">от
                                                    <span class="sum">0</span>
                                                    ₽
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="dropdown-menu" aria-labelledby="calculationDrop3_5">
                                        <li data-value="Не выбран" data-sum="0">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Не выбран</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">0</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Трафарет на крест" data-sum="1500">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Трафарет на крест</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">1500</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="calculation-item">
                    <div class="calculation-group">
                        <h4>Услуги транспортировки</h4>
                        <div class="calculation-items items">
                            <div class="item">
                                <div class="dropdown dropdown_white dropdown_hint">
                                    <div class="dropdown-label" id="calculationDrop4_1" data-toggle="dropdown" aria-expanded="false">
                                        <svg class="icon__arrow-drop" width="32" height="32">
                                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                        </svg>
                                        <div class="dropdown-wrap">
                                            <div class="dropdown-wrap__column">
                                                <div class="dropdown-hint">Выбрать вид</div>
                                                <div class="dropdown-value">Не выбран</div>
                                            </div>
                                            <div class="dropdown-wrap__column">
                                                <span class="dropdown-sum">от
                                                    <span class="sum">0</span>
                                                    ₽
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="dropdown-menu" aria-labelledby="calculationDrop4_1">
                                        <li data-value="Не выбран" data-sum="0">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Не выбран</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">0</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Доставка предметов ритуала" data-sum="2000">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Доставка предметов ритуала</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">2000</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Морг - кладбище (крематорий)" data-sum="11000">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Морг - кладбище (крематорий)</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">11000</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Морг - кладбище (крематорий) - возврат домой" data-sum="12000">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Морг - кладбище (крематорий) - возврат домой</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">12000</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Заезд за родственниками - морг - кладбище(крематорий) - возврат домой" data-sum="13500">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Заезд за родственниками - морг - кладбище(крематорий) - возврат домой</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">13500</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Заезд за родственниками - морг - заезд в храм - кладбище(крематорий) - возврат домой" data-sum="14500">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Заезд за родственниками - морг - заезд в храм - кладбище(крематорий) - возврат домой</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">14500</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calculation-group">
                        <h4>Услуги ритуального сотрудника</h4>
                        <div class="calculation-items items">
                            <div class="item">
                                <div class="dropdown dropdown_white dropdown_hint">
                                    <div class="dropdown-label" id="calculationDrop4_2" data-toggle="dropdown" aria-expanded="false">
                                        <svg class="icon__arrow-drop" width="32" height="32">
                                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                        </svg>
                                        <div class="dropdown-wrap">
                                            <div class="dropdown-wrap__column">
                                                <div class="dropdown-hint">Услуги ритуального агента</div>
                                                <div class="dropdown-value">Не выбран</div>
                                            </div>
                                            <div class="dropdown-wrap__column">
                                                <span class="dropdown-sum">от
                                                    <span class="sum">0</span>
                                                    ₽
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="dropdown-menu" aria-labelledby="calculationDrop4_2">
                                        <li data-value="Не выбран" data-sum="0">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Не выбран</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">0</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Комплекс 1 (Подбор принадлежностей и транспорта, сопровождение церемонии)" data-sum="4000">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Комплекс 1 (Подбор принадлежностей и транспорта, сопровождение церемонии)</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">4000</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Комплекс 2 (Подбор принадлежностей и транспорта, сбор необходимых документов, сопровождение церемонии)" data-sum="8200">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Комплекс 2 (Подбор принадлежностей и транспорта, сбор необходимых документов, сопровождение церемонии)</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">8200</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Комплекс 3 (Подбор принадлежностей и транспорта, сбор и оформление документов, сопровождение церемонии)" data-sum="12200">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Комплекс 3 (Подбор принадлежностей и транспорта, сбор и оформление документов, сопровождение церемонии)</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">12200</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Комплекс 4 (Подбор принадлежностей и транспорта, сбор и оформление документов, полное сопровождение на всех этапах)" data-sum="15200">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Комплекс 4 (Подбор принадлежностей и транспорта, сбор и оформление документов, полное сопровождение на всех этапах)</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">15200</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="dropdown dropdown_white dropdown_hint">
                                    <div class="dropdown-label" id="calculationDrop4_3" data-toggle="dropdown" aria-expanded="false">
                                        <svg class="icon__arrow-drop" width="32" height="32">
                                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                        </svg>
                                        <div class="dropdown-wrap">
                                            <div class="dropdown-wrap__column">
                                                <div class="dropdown-hint">Услуги сопроводительной бригады</div>
                                                <div class="dropdown-value">Не выбран</div>
                                            </div>
                                            <div class="dropdown-wrap__column">
                                                <span class="dropdown-sum">от
                                                    <span class="sum">0</span>
                                                    ₽
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="dropdown-menu" aria-labelledby="calculationDrop4_3">
                                        <li data-value="Не выбран" data-sum="0">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Не выбран</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">0</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="«Стандарт» (4 человека)" data-sum="8000">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">«Стандарт» (4 человека)</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">8000</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="«Стандарт» (6 человека)" data-sum="12000">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">«Стандарт» (6 человека)</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">12000</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="«Элит» ( 4 человека)" data-sum="10000">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">«Элит» ( 4 человека)</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">10000</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="«Элит» ( 6 человек)" data-sum="14000">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">«Элит» ( 6 человек)</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от
                                                        <span class="sum">14000</span>
                                                        ₽
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="calculation-item">
                    <div class="calculation-finish items">
                        <div class="item">
                            <div class="calculation-result">
                                <h4>Информация о заказе</h4>
                                <ul></ul>
                            </div>
                        </div>
                        <div class="item">
                            <div class="calculation-form">
                                <form class="default-form" id="formCalculationResult" action="" method="post" enctype="multipart/form-data">
                                    <div class="form-inputs">
                                        <div class="form-input">
                                            <input class="form-control phone-mask" type="tel" id="calculationResultPhone" placeholder="" name="phone">
                                            <label class="form-input__label" for="calculationResultPhone">
                                                <span>Телефон *</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-checkbox">
                                        <div class="checkbox">
                                            <input type="checkbox" name="checkbox" id="calculationResultCheck">
                                            <label for="calculationResultCheck">
                                                <span class="checkbox__box"></span>
                                                Нажимая на кнопку, вы соглашаетесь с
                                                <a href="/privacy/">политикой конфиденциальности</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-btn">
                                        <button class="btn btn-blue big btn-block">
                                            <span class="btn__text">
                                                <span>Оставить заявку</span>
                                            </span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="calculation-bottom">
                <div class="calculation-btn">
                    <button class="btn btn-blue-light big btn-prev" type="button">
                        <span class="btn__text">
                            <span data-text="Назад">Назад</span>
                        </span>
                    </button>
                    <button class="btn btn-blue big btn-next" type="button">
                        <span class="btn__text">
                            <span data-text="Далее">Далее</span>
                        </span>
                    </button>
                </div>
                <span class="calculation-sum">Итого: от
                    <span class="sum">0</span>
                    ₽
                </span>
            </div>
        </div>
    </div>
</section>