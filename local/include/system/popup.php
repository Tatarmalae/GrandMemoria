<?php //Корзина ?>
<div class="modal fade" id="modalBasket" tabindex="-1" role="dialog" aria-labelledby="modalBasketLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button class="modal-close" type="button" data-dismiss="modal" aria-label="Close">
                <svg class="icon__close-modal" width="48" height="48">
                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#close-modal"></use>
                </svg>
            </button>
            <div class="modal-body">
                <a class="logo-link" href="<?= SITE_DIR ?>">
                    <div class="logo">
                        <img src="<?= SITE_STYLE_PATH ?>/img/general/logo.svg" alt="<?= SITE_SERVER_NAME ?>"/>
                    </div>
                </a>
                <div class="modal-scroll">
                    <div class="modal-scroll__inner">
                        <div class="modal-basket">
                            <h2 class="static">Товар успешно добавлен в корзину</h2>
                            <div class="modal-basket__product">
                                <div class="catalog-item catalog-item_line">
                                    <div class="catalog-item__img img">
                                        <div class="img__inner object-fit">
                                            <img class="lazy" data-src="" alt="" src="">
                                        </div>
                                        <div class="catalog-item__labels label-wrap"></div>
                                    </div>
                                    <div class="catalog-item__content">
                                        <span class="label label_small label_fiery-rose">В наличии</span>
                                        <h4></h4>
                                        <div class="price price_small">
                                            <span class="price-now"></span>
                                            <s class="price-old"></s>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="popup__count"></p>
                            <div class="more-btn">
                                <a class="btn btn-blue big" href="/basket/">
                                    <span class="btn__text">
                                        <span>Перейти в корзину</span>
                                    </span>
                                </a>
                                <button class="btn btn-blue-light big" type="button" data-dismiss="modal">
                                    <span class="btn__text">
                                        <span>Вернуться к просмотру</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php //Заказать звонок ?>
<div class="modal fade" id="modalCall" tabindex="-1" role="dialog" aria-labelledby="modalCallLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button class="modal-close" type="button" data-dismiss="modal" aria-label="Close">
                <svg class="icon__close-modal" width="48" height="48">
                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#close-modal"></use>
                </svg>
            </button>
            <div class="modal-body">
                <a class="logo-link" href="<?= SITE_DIR ?>">
                    <div class="logo">
                        <img src="<?= SITE_STYLE_PATH ?>/img/general/logo.svg" alt="<?= SITE_SERVER_NAME ?>"/>
                    </div>
                </a>
                <div class="modal-start">
                    <div class="modal-scroll">
                        <div class="modal-scroll__inner">
                            <h2 class="static">Заказать звонок</h2>
                            <p>Оставьте свои данные, и мы свяжемся с вами в ближайшее время.</p>
                            <div class="modal-form">
                                <form class="default-form" id="formCall" action="<?= SITE_AJAX_PATH ?>/forms/form_callback.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="theme" value="">
                                    <input type="hidden" name="type" value="Заказать звонок">
                                    <div class="form-inputs">
                                        <div class="form-input">
                                            <input class="form-control" id="callName" placeholder="" name="name"/>
                                            <label class="form-input__label" for="callName">
                                                <span>Ваше имя *</span>
                                            </label>
                                        </div>
                                        <div class="form-input">
                                            <input class="form-control phone-mask" type="tel" id="callPhone" placeholder="" name="phone"/>
                                            <label class="form-input__label" for="callPhone">
                                                <span>Телефон *</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-checkbox">
                                        <div class="checkbox">
                                            <input type="checkbox" name="checkbox" id="callCheck"/>
                                            <label for="callCheck">
                                                <span class="checkbox__box"></span>
                                                Нажимая на кнопку, вы соглашаетесь с
                                                <a href="/privacy/">политикой конфиденциальности</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-btn">
                                        <button class="btn btn-blue big">
                                            <span class="btn__text">
                                                <span>Отправить</span>
                                            </span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-success">
                    <h2>Заявка отправлена</h2>
                    <p>Спасибо! Мы свяжемся с вами в ближайшее время.</p>
                    <div class="more-btn">
                        <button class="btn btn-blue big" type="button" data-dismiss="modal">
                            <span class="btn__text">
                                <span>Вернуться к просмотру</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php //Получить консультацию ?>
<div class="modal fade" id="modalConsultation" tabindex="-1" role="dialog" aria-labelledby="modalConsultationLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button class="modal-close" type="button" data-dismiss="modal" aria-label="Close">
                <svg class="icon__close-modal" width="48" height="48">
                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#close-modal"></use>
                </svg>
            </button>
            <div class="modal-body">
                <a class="logo-link" href="<?= SITE_DIR ?>">
                    <div class="logo">
                        <img src="<?= SITE_STYLE_PATH ?>/img/general/logo.svg" alt="<?= SITE_SERVER_NAME ?>"/>
                    </div>
                </a>
                <div class="modal-start">
                    <div class="modal-scroll">
                        <div class="modal-scroll__inner">
                            <h2 class="static">Получить консультацию</h2>
                            <p>Оставьте свои данные, и мы свяжемся с вами в ближайшее время.</p>
                            <div class="modal-form">
                                <form class="default-form" id="formConsultation" action="<?= SITE_AJAX_PATH ?>/forms/form_consultation.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="theme" value="">
                                    <input type="hidden" name="type" value="Получить консультацию">
                                    <div class="form-inputs">
                                        <div class="form-input">
                                            <input class="form-control" id="consultationName" placeholder="" name="name"/>
                                            <label class="form-input__label" for="consultationName">
                                                <span>Ваше имя *</span>
                                            </label>
                                        </div>
                                        <div class="form-input">
                                            <input class="form-control phone-mask" type="tel" id="consultationPhone" placeholder="" name="phone"/>
                                            <label class="form-input__label" for="consultationPhone">
                                                <span>Телефон *</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-checkbox">
                                        <div class="checkbox">
                                            <input type="checkbox" name="checkbox" id="consultationCheck"/>
                                            <label for="consultationCheck">
                                                <span class="checkbox__box"></span>
                                                Нажимая на кнопку, вы соглашаетесь с
                                                <a href="/privacy/">политикой конфиденциальности</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-btn">
                                        <button class="btn btn-blue big">
                                            <span class="btn__text">
                                                <span>Отправить</span>
                                            </span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-success">
                    <h2>Заявка отправлена</h2>
                    <p>Спасибо! Мы свяжемся с вами в ближайшее время.</p>
                    <div class="more-btn">
                        <button class="btn btn-blue big" type="button" data-dismiss="modal">
                            <span class="btn__text">
                                <span>Вернуться к просмотру</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php //Задать вопрос ?>
<div class="modal fade" id="modalQuestion" tabindex="-1" role="dialog" aria-labelledby="modalQuestionLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button class="modal-close" type="button" data-dismiss="modal" aria-label="Close">
                <svg class="icon__close-modal" width="48" height="48">
                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#close-modal"></use>
                </svg>
            </button>
            <div class="modal-body">
                <a class="logo-link" href="<?= SITE_DIR ?>">
                    <div class="logo">
                        <img src="<?= SITE_STYLE_PATH ?>/img/general/logo.svg" alt="<?= SITE_SERVER_NAME ?>"/>
                    </div>
                </a>
                <div class="modal-start">
                    <div class="modal-scroll">
                        <div class="modal-scroll__inner">
                            <h2 class="static">Задать вопрос</h2>
                            <p>Напишите нам, мы с удовольствием вам поможем.</p>
                            <div class="modal-form">
                                <form class="default-form" id="formQuestion" action="<?= SITE_AJAX_PATH ?>/forms/form_faq.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="type" value="Задать вопрос">
                                    <div class="form-inputs">
                                        <div class="form-input">
                                            <input class="form-control" id="questionName" placeholder="" name="name"/>
                                            <label class="form-input__label" for="questionName">
                                                <span>Ваше имя *</span>
                                            </label>
                                        </div>
                                        <div class="form-input">
                                            <input class="form-control phone-mask" type="tel" id="questionPhone" placeholder="" name="phone"/>
                                            <label class="form-input__label" for="questionPhone">
                                                <span>Телефон *</span>
                                            </label>
                                        </div>
                                        <div class="form-input">
                                            <input class="form-control" type="email" id="questionEmail" placeholder="" name="email"/>
                                            <label class="form-input__label" for="questionEmail">
                                                <span>E–mail *</span>
                                            </label>
                                        </div>
                                        <div class="form-input">
                                            <textarea class="form-control" rows="4" id="questionMessage" placeholder="" name="message"></textarea>
                                            <label class="form-input__label" for="questionMessage">
                                                <span>Задать вопрос *</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-checkbox">
                                        <div class="checkbox">
                                            <input type="checkbox" name="checkbox" id="questionCheck"/>
                                            <label for="questionCheck">
                                                <span class="checkbox__box"></span>
                                                Нажимая на кнопку, вы соглашаетесь с
                                                <a href="/privacy/">политикой конфиденциальности</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-btn">
                                        <button class="btn btn-blue big">
                                            <span class="btn__text">
                                                <span>Отправить</span>
                                            </span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-success">
                    <h2>Вопрос отправлен</h2>
                    <p>Спасибо! Мы обработаем вопрос и свяжемся с вами в ближайшее время.</p>
                    <div class="more-btn">
                        <button class="btn btn-blue big" type="button" data-dismiss="modal">
                            <span class="btn__text">
                                <span>Вернуться к просмотру</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php //Оформить рассрочку ?>
<div class="modal fade" id="modalInstallment" tabindex="-1" role="dialog" aria-labelledby="modalInstallmentLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button class="modal-close" type="button" data-dismiss="modal" aria-label="Close">
                <svg class="icon__close-modal" width="48" height="48">
                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#close-modal"></use>
                </svg>
            </button>
            <div class="modal-body">
                <a class="logo-link" href="<?= SITE_DIR ?>">
                    <div class="logo">
                        <img src="<?= SITE_STYLE_PATH ?>/img/general/logo.svg" alt="<?= SITE_SERVER_NAME ?>"/>
                    </div>
                </a>
                <div class="modal-start">
                    <div class="modal-scroll">
                        <div class="modal-scroll__inner">
                            <h2 class="static">Оформить рассрочку</h2>
                            <p>Оставьте свои данные, и мы свяжемся с вами в ближайшее время.</p>
                            <div class="modal-form">
                                <form class="default-form" id="formInstallment" action="<?= SITE_AJAX_PATH ?>/forms/form_installment.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="theme" value="">
                                    <input type="hidden" name="type" value="Оформить рассрочку">
                                    <div class="form-inputs">
                                        <div class="form-input">
                                            <input class="form-control" id="installmentName" placeholder="" name="name"/>
                                            <label class="form-input__label" for="installmentName">
                                                <span>Ваше имя *</span>
                                            </label>
                                        </div>
                                        <div class="form-input">
                                            <input class="form-control phone-mask" type="tel" id="installmentPhone" placeholder="" name="phone"/>
                                            <label class="form-input__label" for="installmentPhone">
                                                <span>Телефон *</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-checkbox">
                                        <div class="checkbox">
                                            <input type="checkbox" name="checkbox" id="installmentCheck"/>
                                            <label for="installmentCheck">
                                                <span class="checkbox__box"></span>
                                                Нажимая на кнопку, вы соглашаетесь с
                                                <a href="/privacy/">политикой конфиденциальности</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-btn">
                                        <button class="btn btn-blue big">
                                            <span class="btn__text">
                                                <span>Отправить</span>
                                            </span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-success">
                    <h2>Заявка отправлена</h2>
                    <p>Спасибо! Мы свяжемся с вами в ближайшее время.</p>
                    <div class="more-btn">
                        <button class="btn btn-blue big" type="button" data-dismiss="modal">
                            <span class="btn__text">
                                <span>Вернуться к просмотру</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php //Купить в 1 клик ?>
<div class="modal fade" id="modalBuyOneClick" tabindex="-1" role="dialog" aria-labelledby="modalBuyOneClickLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button class="modal-close" type="button" data-dismiss="modal" aria-label="Close">
                <svg class="icon__close-modal" width="48" height="48">
                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#close-modal"></use>
                </svg>
            </button>
            <div class="modal-body">
                <a class="logo-link" href="<?= SITE_DIR ?>">
                    <div class="logo">
                        <img src="<?= SITE_STYLE_PATH ?>/img/general/logo.svg" alt="<?= SITE_SERVER_NAME ?>"/>
                    </div>
                </a>
                <div class="modal-start">
                    <div class="modal-scroll">
                        <div class="modal-scroll__inner">
                            <h2 class="static">Купить в 1 клик</h2>
                            <p>Оставьте свои данные, и мы свяжемся с вами в ближайшее время.</p>
                            <div class="modal-form">
                                <form class="default-form" id="formBuyOneClick" action="<?= SITE_AJAX_PATH ?>/forms/form_one_click.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="theme" value="">
                                    <input type="hidden" name="type" value="Купить в 1 клик">
                                    <div class="form-inputs">
                                        <div class="form-input">
                                            <input class="form-control phone-mask" type="tel" id="buyOneClickPhone" placeholder="" name="phone"/>
                                            <label class="form-input__label" for="buyOneClickPhone">
                                                <span>Телефон *</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-checkbox">
                                        <div class="checkbox">
                                            <input type="checkbox" name="checkbox" id="buyOneClickCheck"/>
                                            <label for="buyOneClickCheck">
                                                <span class="checkbox__box"></span>
                                                Нажимая на кнопку, вы соглашаетесь с
                                                <a href="/privacy/">политикой конфиденциальности</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-btn">
                                        <button class="btn btn-blue big">
                                            <span class="btn__text">
                                                <span>Отправить</span>
                                            </span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-success">
                    <h2>Заявка отправлена</h2>
                    <p>Спасибо! Мы свяжемся с вами в ближайшее время.</p>
                    <div class="more-btn">
                        <button class="btn btn-blue big" type="button" data-dismiss="modal">
                            <span class="btn__text">
                                <span>Вернуться к просмотру</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php //Расчет рассрочки ?>
<div class="modal fade" id="modalInstallmentPlan" tabindex="-1" role="dialog" aria-labelledby="modalInstallmentPlanLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button class="modal-close" type="button" data-dismiss="modal" aria-label="Close">
                <svg class="icon__close-modal" width="48" height="48">
                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#close-modal"></use>
                </svg>
            </button>
            <div class="modal-body">
                <a class="logo-link" href="<?= SITE_DIR ?>">
                    <div class="logo">
                        <img src="<?= SITE_STYLE_PATH ?>/img/general/logo.svg" alt="<?= SITE_SERVER_NAME ?>"/>
                    </div>
                </a>
                <div class="modal-start">
                    <div class="modal-scroll">
                        <div class="modal-scroll__inner">
                            <h2 class="static">Расчет рассрочки на памятник</h2>
                            <p>Оставьте свои данные, и мы свяжемся с вами в ближайшее время.</p>
                            <div class="modal-form">
                                <form class="default-form" id="formInstallmentPlan" action="<?= SITE_AJAX_PATH ?>/forms/form_installment_plan.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="theme" value="">
                                    <input type="hidden" name="type" value="Расчет рассрочки">
                                    <div class="form-inputs">
                                        <div class="form-input">
                                            <input class="form-control" id="installmentPlanName" placeholder="" name="name"/>
                                            <label class="form-input__label" for="installmentPlanName">
                                                <span>Ваше имя *</span>
                                            </label>
                                        </div>
                                        <div class="form-input">
                                            <input class="form-control phone-mask" type="tel" id="installmentPlanPhone" placeholder="" name="phone"/>
                                            <label class="form-input__label" for="installmentPlanPhone">
                                                <span>Телефон *</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-checkbox">
                                        <div class="checkbox">
                                            <input type="checkbox" name="checkbox" id="installmentPlanCheck"/>
                                            <label for="installmentPlanCheck">
                                                <span class="checkbox__box"></span>
                                                Нажимая на кнопку, вы соглашаетесь с
                                                <a href="/privacy/">политикой конфиденциальности</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-btn">
                                        <button class="btn btn-blue big">
                                            <span class="btn__text">
                                                <span>Отправить</span>
                                            </span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-success">
                    <h2>Заявка отправлена</h2>
                    <p>Спасибо! Мы свяжемся с вами в ближайшее время.</p>
                    <div class="more-btn">
                        <button class="btn btn-blue big" type="button" data-dismiss="modal">
                            <span class="btn__text">
                                <span>Вернуться к просмотру</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php //Оформить заказ ?>
<div class="modal fade" id="modalCheckout" tabindex="-1" role="dialog" aria-labelledby="modalCheckoutLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button class="modal-close" type="button" data-dismiss="modal" aria-label="Close">
                <svg class="icon__close-modal" width="48" height="48">
                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#close-modal"></use>
                </svg>
            </button>
            <div class="modal-body">
                <a class="logo-link" href="<?= SITE_DIR ?>">
                    <div class="logo">
                        <img src="<?= SITE_STYLE_PATH ?>/img/general/logo.svg" alt="<?= SITE_SERVER_NAME ?>"/>
                    </div>
                </a>
                <div class="modal-start">
                    <div class="modal-scroll">
                        <div class="modal-scroll__inner">
                            <h2 class="static">Оформить заказ</h2>
                            <p>Оставьте свои данные, и мы свяжемся с вами в ближайшее время.</p>
                            <div class="modal-form">
                                <form class="default-form" id="formCheckout" action="<?= SITE_AJAX_PATH ?>/forms/form_checkout.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="theme" value="">
                                    <input type="hidden" name="type" value="Оформить заказ">
                                    <div class="form-inputs">
                                        <div class="form-input">
                                            <input class="form-control" id="checkoutName" placeholder="" name="name"/>
                                            <label class="form-input__label" for="checkoutName">
                                                <span>Ваше имя *</span>
                                            </label>
                                        </div>
                                        <div class="form-input">
                                            <input class="form-control phone-mask" type="tel" id="checkoutPhone" placeholder="" name="phone"/>
                                            <label class="form-input__label" for="checkoutPhone">
                                                <span>Телефон *</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-checkbox">
                                        <div class="checkbox">
                                            <input type="checkbox" name="checkbox" id="checkoutCheck"/>
                                            <label for="checkoutCheck">
                                                <span class="checkbox__box"></span>
                                                Нажимая на кнопку, вы соглашаетесь с
                                                <a href="/privacy/">политикой конфиденциальности</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-btn">
                                        <button class="btn btn-blue big">
                                            <span class="btn__text">
                                                <span>Отправить</span>
                                            </span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-success">
                    <h2>Заказ оформлен</h2>
                    <p>Спасибо! Мы свяжемся с вами в ближайшее время.</p>
                    <div class="more-btn">
                        <button class="btn btn-blue big" type="button" data-dismiss="modal">
                            <span class="btn__text">
                                <span>Вернуться к просмотру</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php //Написать нам ?>
<div class="modal fade" id="modalCommunication" tabindex="-1" role="dialog" aria-labelledby="modalCommunicationLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button class="modal-close" type="button" data-dismiss="modal" aria-label="Close">
                <svg class="icon__close-modal" width="48" height="48">
                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#close-modal"></use>
                </svg>
            </button>
            <div class="modal-body">
                <a class="logo-link" href="<?= SITE_DIR ?>">
                    <div class="logo">
                        <img src="<?= SITE_STYLE_PATH ?>/img/general/logo.svg" alt="<?= SITE_SERVER_NAME ?>"/>
                    </div>
                </a>
                <div class="modal-start">
                    <div class="modal-scroll">
                        <div class="modal-scroll__inner">
                            <h2 class="static">Написать нам</h2>
                            <p>Директор лично читает письма и принимает решения.</p>
                            <div class="modal-form">
                                <form class="default-form file__form" id="formCommunication" action="<?= SITE_AJAX_PATH ?>/forms/form_communication.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="theme" value="">
                                    <input type="hidden" name="type" value="Написать нам">
                                    <div class="form-inputs">
                                        <div class="form-input">
                                            <input class="form-control" id="communicationName" placeholder="" name="name"/>
                                            <label class="form-input__label" for="communicationName">
                                                <span>Ваше имя *</span>
                                            </label>
                                        </div>
                                        <div class="form-input">
                                            <input class="form-control phone-mask" type="tel" id="communicationPhone" placeholder="" name="phone"/>
                                            <label class="form-input__label" for="communicationPhone">
                                                <span>Телефон *</span>
                                            </label>
                                        </div>
                                        <div class="form-input">
                                            <input class="form-control" type="email" id="communicationEmail" placeholder="" name="email"/>
                                            <label class="form-input__label" for="communicationEmail">
                                                <span>E–mail *</span>
                                            </label>
                                        </div>
                                        <div class="form-input">
                                            <textarea class="form-control" rows="4" id="communicationMessage" placeholder="" name="message"></textarea>
                                            <label class="form-input__label" for="communicationMessage">
                                                <span>Задать вопрос *</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-file">
                                        <label class="file" for="communicationFile">
                                            <input type="hidden"/>
                                            <input type="file" name="file[]" id="communicationFile"/>
                                            <div class="file__icon">
                                                <div class="file__icon-hide">
                                                    <div class="file__close">
                                                        <svg class="icon__file-close" width="22" height="22">
                                                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#file-close"></use>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="file__text" data-text="+ Прикрепить файл">+ Прикрепить файл</div>
                                        </label>
                                    </div>
                                    <div class="form-checkbox">
                                        <div class="checkbox">
                                            <input type="checkbox" name="checkbox" id="communicationCheck"/>
                                            <label for="communicationCheck">
                                                <span class="checkbox__box"></span>
                                                Нажимая на кнопку, вы соглашаетесь с
                                                <a href="/privacy/">политикой конфиденциальности</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-btn">
                                        <button class="btn btn-blue big">
                                            <span class="btn__text">
                                                <span>Отправить</span>
                                            </span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-success">
                    <h2>Успешно отправлено</h2>
                    <p>Спасибо! Мы обработаем обращение и свяжемся с вами в ближайшее время.</p>
                    <div class="more-btn">
                        <button class="btn btn-blue big" type="button" data-dismiss="modal">
                            <span class="btn__text">
                                <span>Вернуться к просмотру</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php //Оставить отзыв ?>
<div class="modal fade" id="modalReviews" tabindex="-1" role="dialog" aria-labelledby="modalReviewsLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button class="modal-close" type="button" data-dismiss="modal" aria-label="Close">
                <svg class="icon__close-modal" width="48" height="48">
                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#close-modal"></use>
                </svg>
            </button>
            <div class="modal-body">
                <a class="logo-link" href="<?= SITE_DIR ?>">
                    <div class="logo">
                        <img src="<?= SITE_STYLE_PATH ?>/img/general/logo.svg" alt="<?= SITE_SERVER_NAME ?>"/>
                    </div>
                </a>
                <div class="modal-start">
                    <div class="modal-scroll">
                        <div class="modal-scroll__inner">
                            <h2 class="static">Оставить отзыв</h2>
                            <p>Поделитесь отзывам о нашей работе</p>
                            <div class="modal-form">
                                <form class="default-form file__form" id="formReviews" action="<?= SITE_AJAX_PATH ?>/forms/form_reviews.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="theme" value="">
                                    <input type="hidden" name="type" value="Оставить отзыв">
                                    <div class="form-inputs">
                                        <div class="form-input">
                                            <input class="form-control" id="reviewsName" placeholder="" name="name"/>
                                            <label class="form-input__label" for="reviewsName">
                                                <span>Ваше имя *</span>
                                            </label>
                                        </div>
                                        <div class="form-input">
                                            <input class="form-control phone-mask" type="tel" id="reviewsPhone" placeholder="" name="phone"/>
                                            <label class="form-input__label" for="reviewsPhone">
                                                <span>Телефон *</span>
                                            </label>
                                        </div>
                                        <div class="form-input">
                                            <input class="form-control" type="email" id="reviewsEmail" placeholder="" name="email"/>
                                            <label class="form-input__label" for="reviewsEmail">
                                                <span>E–mail *</span>
                                            </label>
                                        </div>
                                        <div class="form-input">
                                            <textarea class="form-control" rows="4" id="reviewsMessage" placeholder="" name="message"></textarea>
                                            <label class="form-input__label" for="reviewsMessage">
                                                <span>Задать вопрос *</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-file">
                                        <label class="file" for="reviewsFile">
                                            <input type="hidden"/>
                                            <input type="file" name="file[]" id="reviewsFile"/>
                                            <div class="file__icon">
                                                <div class="file__icon-hide">
                                                    <div class="file__close">
                                                        <svg class="icon__file-close" width="22" height="22">
                                                            <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#file-close"></use>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="file__text" data-text="+ Прикрепить файл">+ Прикрепить файл</div>
                                        </label>
                                    </div>
                                    <div class="form-checkbox">
                                        <div class="checkbox">
                                            <input type="checkbox" name="checkbox" id="reviewsCheck"/>
                                            <label for="reviewsCheck">
                                                <span class="checkbox__box"></span>
                                                Нажимая на кнопку, вы соглашаетесь с
                                                <a href="/privacy/">политикой конфиденциальности</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-btn">
                                        <button class="btn btn-blue big">
                                            <span class="btn__text">
                                                <span>Отправить</span>
                                            </span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-success">
                    <h2>Отзыв отправлен</h2>
                    <p>Спасибо! Мы обработаем вопрос и свяжемся с вами в ближайшее время.</p>
                    <div class="more-btn">
                        <button class="btn btn-blue big" type="button" data-dismiss="modal">
                            <span class="btn__text">
                                <span>Вернуться к просмотру</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php //Получить акционное предложение ?>
<div class="modal fade" id="modalStock" tabindex="-1" role="dialog" aria-labelledby="modalStockLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button class="modal-close" type="button" data-dismiss="modal" aria-label="Close">
                <svg class="icon__close-modal" width="48" height="48">
                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#close-modal"></use>
                </svg>
            </button>
            <div class="modal-body">
                <a class="logo-link" href="<?= SITE_DIR ?>">
                    <div class="logo">
                        <img src="<?= SITE_STYLE_PATH ?>/img/general/logo.svg" alt="<?= SITE_SERVER_NAME ?>"/>
                    </div>
                </a>
                <div class="modal-start">
                    <div class="modal-scroll">
                        <div class="modal-scroll__inner">
                            <h2 class="static">Получить акционное предложение</h2>
                            <p>Оставьте свои данные, и мы свяжемся с вами в ближайшее время.</p>
                            <div class="modal-form">
                                <form class="default-form" id="formStock" action="<?= SITE_AJAX_PATH ?>/forms/form_stock.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="theme" value="">
                                    <input type="hidden" name="type" value="Получить акционное предложение">
                                    <div class="form-inputs">
                                        <div class="form-input">
                                            <input class="form-control" id="stockName" placeholder="" name="name"/>
                                            <label class="form-input__label" for="stockName">
                                                <span>Ваше имя *</span>
                                            </label>
                                        </div>
                                        <div class="form-input">
                                            <input class="form-control phone-mask" type="tel" id="stockPhone" placeholder="" name="phone"/>
                                            <label class="form-input__label" for="stockPhone">
                                                <span>Телефон *</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-checkbox">
                                        <div class="checkbox">
                                            <input type="checkbox" name="checkbox" id="stockCheck"/>
                                            <label for="stockCheck">
                                                <span class="checkbox__box"></span>
                                                Нажимая на кнопку, вы соглашаетесь с
                                                <a href="/privacy/">политикой конфиденциальности</a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-btn">
                                        <button class="btn btn-blue big">
                                            <span class="btn__text">
                                                <span>Отправить</span>
                                            </span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-success">
                    <h2>Заявка отправлена</h2>
                    <p>Спасибо! Мы свяжемся с вами в ближайшее время.</p>
                    <div class="more-btn">
                        <button class="btn btn-blue big" type="button" data-dismiss="modal">
                            <span class="btn__text">
                                <span>Вернуться к просмотру</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade is-success" id="modalCalculationSuccess" tabindex="-1" role="dialog" aria-labelledby="modalCalculationSuccessLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button class="modal-close" type="button" data-dismiss="modal" aria-label="Close">
                <svg class="icon__close-modal" width="48" height="48">
                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#close-modal"></use>
                </svg>
            </button>
            <div class="modal-body">
                <a class="logo-link" href="<?= SITE_DIR ?>">
                    <div class="logo">
                        <img src="<?= SITE_STYLE_PATH ?>/img/general/logo.svg" alt="<?= SITE_SERVER_NAME ?>"/>
                    </div>
                </a>
                <div class="modal-success">
                    <h2 class="static">Расчет похорон отправлен</h2>
                    <p>Спасибо! Мы свяжемся с вами в ближайшее время.</p>
                    <div class="more-btn">
                        <button class="btn btn-blue big" type="button" data-dismiss="modal">
                            <span class="btn__text">
                                <span>Вернуться к просмотру</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalGallery" tabindex="-1" role="dialog" aria-labelledby="modalGalleryLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button class="modal-close" type="button" data-dismiss="modal" aria-label="Close">
                <svg class="icon__close-modal" width="48" height="48">
                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#close-modal"></use>
                </svg>
            </button>
            <div class="modal-body">
                <a class="logo-link" href="<?= SITE_DIR ?>">
                    <div class="logo">
                        <img src="<?= SITE_STYLE_PATH ?>/img/general/logo.svg" alt="<?= SITE_SERVER_NAME ?>"/>
                    </div>
                </a>
                <div class="modal-scroll">
                    <div class="modal-scroll__inner">
                        <div class="modal-gallery">
                            <div class="modal-gallery__img">
                                <div class="gallery-item">
                                    <div class="gallery-item__img img img-16by9">
                                        <div class="img__inner object-fit">
                                            <img class="lazy" data-src="<?= SITE_STYLE_PATH ?>/img/content/gallery/5.jpg" alt=""/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="overlay"></div>