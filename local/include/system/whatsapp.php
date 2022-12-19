<?php

use Bitrix\Main\Config\Option;

?>
<div class="banner banner_xs">
    <div class="content">
        <div class="banner-box bg_glitter">
            <div class="banner-inner">
                <div class="banner-content">
                    <h2>Остались<br>вопросы?</h2>
                    <p>Задайте вопрос нашим специалистам по телефону <b>
                            <a href="tel:+<?= preg_replace('~\D+~', '', Option::get("askaron.settings", "UF_PHONE")) ?>">
                                <?= Option::get("askaron.settings", "UF_PHONE"); ?>
                            </a>
                        </b> или в мессенджер WhatsApp
                    </p>
                    <div class="more-btn">
                        <a class="btn btn-green big" href="whatsapp://send?phone=<?= preg_replace('~\D+~', '', Option::get("askaron.settings", "UF_WHATSAPP")) ?>" target="_blank">
                            <span class="btn__arrow">
                                <svg class="icon__whatsapp" width="26" height="26">
                                    <use xlink:href="<?= SITE_STYLE_PATH ?>/img/general/svg-symbols.svg#whatsapp"></use>
                                </svg>
                            </span>
                            <span class="btn__text">
                                <span data-text="Перейти в чат WhatsApp">Перейти в чат WhatsApp</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>