<section class="types">
    <div class="content">
        <?php if (!empty($arParams['TITLE'])): ?>
            <div class="heading">
                <div class="heading__content">
                    <h2><?= $arParams['TITLE'] ?></h2>
                </div>
            </div>
        <?php endif ?>
        <div class="types-box box">
            <div class="box__inner">
                <div class="types-items items">
                    <div class="types-item item">
                        <span class="label label_big label_fiery-rose">ВСЕ В НАЛИЧИИ</span>
                        <h3>Каталог товаров</h3>
                        <p>Вы найдете все необходимое для похорон. Для экономии времени на поиски воспользуйтесь нашим онлайн-каталогом.</p>
                        <div class="more-btn">
                            <a class="btn btn-blue big btn-block" href="/catalog/">
                                <span class="btn__text">
                                    <span data-text="Перейти в каталог">Перейти в каталог</span>
                                </span>
                            </a>
                        </div>
                        <div class="more">
                            <a class="more__link" href="/info/installment/">
                                <span>Рассчитать рассрочку</span>
                                <svg class="icon__arrow-right" width="24" height="24">
                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="types-item item">
                        <span class="label label_big label_fiery-rose">КРУГЛОСУТОЧНО</span>
                        <h3>Ритуальные услуги</h3>
                        <p>Приезд специалиста в течение 30 минут. Организуем весь процесс похорон на всех кладбищах Казани и РТ.</p>
                        <div class="more-btn">
                            <a class="btn btn-blue big btn-block" href="/services/">
                                <span class="btn__text">
                                    <span data-text="Посмотреть все услуги">Посмотреть все услуги</span>
                                </span>
                            </a>
                        </div>
                        <div class="more">
                            <a class="more__link" href="#" data-toggle="modal" data-target="#modalConsultation" data-theme="Ритуальные услуги">
                                <span>Получить консультацию</span>
                                <svg class="icon__arrow-right" width="24" height="24">
                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#arrow-right"></use>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>