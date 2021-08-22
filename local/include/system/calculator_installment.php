<section class="section_padding section_glitter calculator">
    <div class="content">
        <div class="heading">
            <div class="heading__content">
                <h2>Калькулятор рассрочки</h2>
            </div>
        </div>
        <div class="calculator-wrap">
            <div class="calculator-items items">
                <div class="calculator-item item">
                    <h4>Рассчитайте сумму рассрочки:</h4>
                    <div class="calculator-slider">
                        <div class="calculator-slider__line">
                            <span class="calculator-slider__line-label">Стоимость памятника</span>
                            <span class="calculator-count"><span class="calc-sum">0</span> руб.</span>
                        </div>
                        <div class="calculator-toggle">
                            <input type="range" min="0" max="40000" step="1" value="10000" id="rangeSum">
                        </div>
                        <div class="calculator-slider__line">
                            <span class="calculator-slider__line-label">40 000 руб.</span>
                        </div>
                    </div>
                    <div class="calculator-slider">
                        <div class="calculator-slider__line">
                            <span class="calculator-slider__line-label">Первоначальный взнос ( от 10% до 60%)</span>
                            <span class="calculator-count"><span class="calc-contribution">0</span> %</span>
                        </div>
                        <div class="calculator-toggle">
                            <input type="range" min="0" max="60" step="1" value="30" id="rangeContribution">
                        </div>
                        <div class="calculator-slider__line">
                            <span class="calculator-slider__line-label">60%</span>
                        </div>
                    </div>
                    <div class="calculator-slider">
                        <div class="calculator-slider__line">
                            <span class="calculator-slider__line-label">Срок рассрочки</span>
                            <span class="calculator-count"><span class="calc-time">0</span> мес.</span>
                        </div>
                        <div class="calculator-toggle">
                            <input type="range" min="0" max="12" step="1" value="6" id="rangeTime">
                        </div>
                        <div class="calculator-slider__line">
                            <span class="calculator-slider__line-label">12 мес.</span>
                        </div>
                    </div>
                </div>
                <div class="calculator-item item">
                    <div class="box">
                        <div class="calculator-info">
                            <div class="calculator-info__line">
                                <div class="items">
                                    <div class="item">
                                        <div class="calculator-info__item">
                                            <span class="calculator-info__item-label">Общая сумма рассрочки:</span>
                                            <span class="calculator-count"><span class="calc-generalSum">0</span> руб.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="calculator-info__line">
                                <div class="items">
                                    <div class="item">
                                        <div class="calculator-info__item">
                                            <span class="calculator-info__item-label">Первый взнос в %:</span>
                                            <span class="calculator-count"><span class="calc-contributionPercent">0</span> %</span>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="calculator-info__item">
                                            <span class="calculator-info__item-label">Первый взнос в ₽:</span>
                                            <span class="calculator-count"><span class="calc-contributionRuble">0</span> руб.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="calculator-info__line">
                                <div class="items">
                                    <div class="item">
                                        <div class="calculator-info__item">
                                            <span class="calculator-info__item-label">Переплата:</span>
                                            <span class="calculator-count"><span class="calc-overpayment">0</span> руб.</span>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="calculator-info__item">
                                            <span class="calculator-info__item-label">Ежемесячный платеж:</span>
                                            <span class="calculator-sum"><span class="calc-payment">0</span> руб.</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="more-btn">
                            <button class="btn btn-blue big btn-block" type="button" data-toggle="modal" data-target="#modalInstallmentPlan">
                                <span class="btn__text"><span data-text="Оставить заявку">Оставить заявку</span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>