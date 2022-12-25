<section class="feedback">
    <div class="content">
        <div class="feedback-wrap">
            <div class="feedback-title">
                <div class="feedback-title__inner">
                    <div class="heading">
                        <h3>Получите бесплатную консультацию, если Вам нужна помощь</h3>
                    </div>
                    <p>Заполните форму и мы Вам обязательно поможем!</p>
                </div>
            </div>
            <div class="feedback-form">
                <form class="default-form" id="formFeedback" action="<?= SITE_AJAX_PATH ?>/forms/form_consultation.php" method="post" enctype="multipart/form-data" data-metrika="form_besplat_consultacija">
                    <input type="hidden" name="theme" value="Получите бесплатную консультацию">
                    <input type="hidden" name="type" value="Получите бесплатную консультацию">
                    <div class="form-inputs">
                        <div class="form-input">
                            <input class="form-control" id="feedbackName" placeholder="" name="name">
                            <label class="form-input__label" for="feedbackName">
                                <span>Ваше имя *</span>
                            </label>
                        </div>
                        <div class="form-input">
                            <input class="form-control phone-mask" type="tel" id="feedbackPhone" placeholder="" name="phone">
                            <label class="form-input__label" for="feedbackPhone">
                                <span>Телефон *</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-checkbox">
                        <div class="checkbox">
                            <input type="checkbox" name="checkbox" id="feedbackCheck">
                            <label for="feedbackCheck">
                                <span class="checkbox__box"></span>
                                Нажимая на кнопку, вы соглашаетесь с
                                <a href="/privacy/">политикой конфиденциальности</a>
                            </label>
                        </div>
                    </div>
                    <div class="form-btn">
                        <button class="btn btn-blue big btn-block">
                            <span class="btn__text"><span>Оставить заявку</span></span>
                        </button>
                    </div>
                    <div class="form-captcha">
                        Этот сайт защищен с помощью reCAPTCHA и соответствует
                        <a rel="nofollow" href="https://policies.google.com/privacy" target="_blank">Политике конфиденциальности</a> и
                        <a rel="nofollow" href="https://policies.google.com/terms" target="_blank">Условиям использования</a> Google.
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>