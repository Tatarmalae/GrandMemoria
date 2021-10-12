<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var $arResult
 */

use Bitrix\Main\Diag\Debug;
use Dev\Catalog;

try {
    $arResult = Catalog::getCalculation(38);
} catch (Throwable $e) {
    Debug::dumpToFile($e->getMessage());
}
?>
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
                <?php foreach ($arResult as $keys => $arItems): ?>
                    <div class="calculation-item<?= $keys == 0 ? ' calculation-item_active' : '' ?>">
                        <?php foreach ($arItems['ITEMS'] as $item): ?>
                            <?php if ($keys == 0): ?>
                                <h4><?= $item['NAME'] ?></h4>
                                <div class="calculation-radio">
                                    <?php foreach ($item['ELEMENTS'] as $keyElem => $element): ?>
                                        <div class="calculation-radio__wrap">
                                            <div class="radio">
                                                <input type="radio" name="radio" id="calculationCheck<?= ($keys + 1) . '_' . ($keyElem + 1) ?>" value="<?= $element['NAME'] ?>" data-type="type<?= $keyElem + 1 ?>">
                                                <label for="calculationCheck<?= ($keys + 1) . '_' . ($keyElem + 1) ?>">
                                                    <span class="radio__box"></span>
                                                    <?= $element['NAME'] ?>
                                                </label>
                                                <div class="radio-bg"></div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            <?php else: ?>
                                <div class="calculation-group" data-type="type<?= implode('_', $item['UF_TYPE']) ?>">
                                    <h4><?= $item['NAME'] ?></h4>
                                    <div class="calculation-items items">
                                        <?php foreach ($item['ELEMENTS'] as $keyElem => $element): ?>
                                            <div class="item">
                                                <div class="dropdown dropdown_white dropdown_hint">
                                                    <div class="dropdown-label" id="calculationDrop<?= ($keys + 1) . '_' . ($keyElem + 1) ?>" data-toggle="dropdown" aria-expanded="false">
                                                        <svg class="icon__arrow-drop" width="32" height="32">
                                                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-drop"></use>
                                                        </svg>
                                                        <div class="dropdown-wrap">
                                                            <div class="dropdown-wrap__column">
                                                                <div class="dropdown-hint">
                                                                    <?= $element['NAME'] ?>
                                                                </div>
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
                                                    <?php if (!empty($element['PROPERTIES']['DROPDOWN'])): ?>
                                                        <ul class="dropdown-menu" aria-labelledby="calculationDrop<?= ($keys + 1) . '_' . ($keyElem + 1) ?>">
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
                                                            <?php foreach ($element['PROPERTIES']['DROPDOWN'] as $propKey => $dropdown): ?>
                                                                <li data-value="<?= $dropdown['VALUE'] ?>" data-sum="<?= $dropdown['DESCRIPTION'] ?>">
                                                                    <div class="dropdown-wrap">
                                                                        <div class="dropdown-wrap__column">
                                                                            <div class="dropdown-value"><?= $dropdown['VALUE'] ?></div>
                                                                        </div>
                                                                        <div class="dropdown-wrap__column">
                                                                            <span class="dropdown-sum">от
                                                                                <span class="sum">
                                                                                    <?= number_format($dropdown['DESCRIPTION'], 0, ' ', ' ') ?>
                                                                                </span>
                                                                                ₽
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            <?php endforeach ?>
                                                        </ul>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            <?php endif ?>
                        <?php endforeach ?>
                    </div>
                    <?php if ($keys + 1 === count($arResult)): ?>
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
                                        <form class="default-form" id="formCalculationResult" action="<?= SITE_AJAX_PATH ?>/forms/form_calculation.php" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="theme" value="Расчет похорон">
                                            <input type="hidden" name="type" value="Расчет похорон">
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
                    <?php endif ?>
                <?php endforeach ?>
            </div>
            <div class="calculation-bottom">
                <div class="calculation-btn">
                    <button class="btn btn-blue-light big btn-prev" type="button">
                        <span class="btn__text">
                            <span data-text="Назад">Назад</span>
                        </span>
                    </button>
                    <button class="btn btn-blue big btn-next" type="button" disabled>
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
