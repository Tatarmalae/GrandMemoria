<?php

use Bitrix\Main\Config\Option;

?>
<div class="message">
    <div class="message-buttons">
        <a class="message-button message-button--red" href="tel:+<?= preg_replace('~\D+~', '', Option::get("askaron.settings", "UF_PHONE")) ?>">
            <span>Позвонить</span>
        </a>
        <a class="message-button message-button--blue" href="whatsapp://send?phone=<?= preg_replace('~\D+~', '', Option::get("askaron.settings", "UF_WHATSAPP")) ?>" target="_blank">
            <span>Написать в WhatsApp</span>
        </a>
    </div>
</div>