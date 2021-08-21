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
                        <img src="<?= SITE_STYLE_PATH ?>/img/general/logo.svg" alt="<?= SITE_SERVER_NAME ?>">
                    </div>
                </a>
            </div>
        </div>
        <div class="calculation-wrap">
            <div class="calculation-top">
                <div class="calculation-top__info">
                    <span>Прогресс заполнения</span>
                    <span>
                        <span class="now">1</span>/
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
                                                <span class="dropdown-sum">от<span class="sum">0</span>₽</span>
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
                                                    <span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Вид" data-sum="1000">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Вид 1</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от <span class="sum">1000</span> ₽</span>
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
                                                <span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
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
                                                    <span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Похоронный комплект" data-sum="500">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Похоронный комплект 1</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от <span class="sum">500</span> ₽</span>
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
                                                <span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
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
                                                    <span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Композиция на крышку" data-sum="700">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Композиция на крышку 1</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от <span class="sum">700</span> ₽</span>
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
                                                <span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
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
                                                    <span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Комплект" data-sum="1000">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Комплект 1</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от <span class="sum">1000</span> ₽</span>
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
                                                <div class="dropdown-hint">Материал, размер</div>
                                                <div class="dropdown-value">Не выбран</div>
                                            </div>
                                            <div class="dropdown-wrap__column">
                                                <span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
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
                                                    <span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Материал, размер" data-sum="1000">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Материал, размер 1</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от <span class="sum">1000</span> ₽</span>
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
                                                <div class="dropdown-hint">Траурная лента</div>
                                                <div class="dropdown-value">Не выбран</div>
                                            </div>
                                            <div class="dropdown-wrap__column">
                                                <span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
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
                                                    <span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Траурная лента" data-sum="800">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Траурная лента 1</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от <span class="sum">800</span> ₽</span>
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
                                    <div class="dropdown-label" id="calculationDrop3_3" data-toggle="dropdown" aria-expanded="false">
                                        <svg class="icon__arrow-drop" width="32" height="32">
                                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                        </svg>
                                        <div class="dropdown-wrap">
                                            <div class="dropdown-wrap__column">
                                                <div class="dropdown-hint">Материал</div>
                                                <div class="dropdown-value">Не выбран</div>
                                            </div>
                                            <div class="dropdown-wrap__column">
                                                <span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
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
                                                    <span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Материал" data-sum="800">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Материал 1</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от <span class="sum">800</span> ₽</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item">
                                <div class="dropdown dropdown_white dropdown_hint">
                                    <div class="dropdown-label" id="calculationDrop3_4" data-toggle="dropdown" aria-expanded="false">
                                        <svg class="icon__arrow-drop" width="32" height="32">
                                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                        </svg>
                                        <div class="dropdown-wrap">
                                            <div class="dropdown-wrap__column">
                                                <div class="dropdown-hint">Табличка на крест</div>
                                                <div class="dropdown-value">Не выбран</div>
                                            </div>
                                            <div class="dropdown-wrap__column">
                                                <span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
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
                                                    <span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Табличка на крест" data-sum="600">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Табличка на крест 1</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от <span class="sum">600</span> ₽</span>
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
                                                <span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
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
                                                    <span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Вид" data-sum="400">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Вид 1</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от <span class="sum">400</span> ₽</span>
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
                                                <div class="dropdown-hint">Услуги сопроводительной бригады</div>
                                                <div class="dropdown-value">Не выбран</div>
                                            </div>
                                            <div class="dropdown-wrap__column">
                                                <span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
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
                                                    <span class="dropdown-sum">от <span class="sum">0</span> ₽</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-value="Услуги" data-sum="400">
                                            <div class="dropdown-wrap">
                                                <div class="dropdown-wrap__column">
                                                    <div class="dropdown-value">Услуги 1</div>
                                                </div>
                                                <div class="dropdown-wrap__column">
                                                    <span class="dropdown-sum">от <span class="sum">400</span> ₽</span>
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
                                                <a href="#">политикой конфиденциальности</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-btn">
                                        <button class="btn btn-blue big btn-block">
                                            <span class="btn__text"><span>Оставить заявку</span></span>
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
                        <span class="btn__text"><span data-text="Назад">Назад</span></span>
                    </button>
                    <button class="btn btn-blue big btn-next" type="button">
                        <span class="btn__text"><span data-text="Далее">Далее</span></span>
                    </button>
                </div>
                <span class="calculation-sum">Итого: от <span class="sum">0</span> ₽</span>
            </div>
        </div>
    </div>
</section>