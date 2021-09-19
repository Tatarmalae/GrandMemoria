<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');
global $APPLICATION;
$APPLICATION->RestartBuffer();
include_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/urlrewrite.php');
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404", "Y");
@define("404", true);
require($_SERVER["DOCUMENT_ROOT"] . "/local/templates/404/header.php");
$APPLICATION->SetTitle("Ошибка 404");
?>
    <section class="not-found">
        <div class="content">
            <div class="not-found__wrapper items">
                <div class="not-found__content item">
                    <article>
                        <a class="logo-link" href="index.html">
                            <div class="logo">
                                <img src="<?= SITE_STYLE_PATH ?>/img/general/logo.svg" alt="<?= SITE_SERVER_NAME ?>">
                            </div>
                        </a>
                        <h2>Что-то пошло не так</h2>
                        <p>
                            Извините, запрашиваемая Вами страница не найдена. Возможно, введен некорректный адрес, или страница была удалена
                        </p>
                        <div class="more-btn">
                            <a class="btn btn-blue big" href="<?= SITE_DIR ?>">
                                <span class="btn__text">
                                    <span data-text="Вернуться на главную">Вернуться на главную</span>
                                </span>
                            </a>
                        </div>
                    </article>
                </div>
                <div class="not-found__img item">
                    <div class="not-found__bg">
                        <img src="<?= SITE_STYLE_PATH ?>/img/content/not-found/bg.svg" alt="<?= SITE_SERVER_NAME ?>">
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php require($_SERVER["DOCUMENT_ROOT"] . "/local/templates/404/footer.php"); ?>
<?php die(); ?>