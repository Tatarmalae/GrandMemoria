<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/**
 * @var $APPLICATION
 */
?>
<? //TODO: модалка?>
<div class="banner">
    <div class="content">
        <div class="banner-box bg_glitter">
            <div class="banner-inner">
                <div class="banner-content">
                    <h3>Мы открыты для общения</h3>
                    <p>Директор лично читает все письма и принимает решения по ним</p>
                    <div class="more-btn">
                        <a class="btn btn-blue big" href="#">
                            <span class="btn__text">
                                <span data-text="Напишите нам">Напишите нам</span>
                            </span>
                        </a>
                    </div>
                </div>
                <a class="logo-link" href="#">
                    <div class="logo">
                        <img src="<?= SITE_STYLE_PATH ?>/img/general/logo.svg" alt="">
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
</div>
<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/footer.php", [], ["SHOW_BORDER" => false]); ?>
</div>
<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/popup.php", [], ["SHOW_BORDER" => false]); ?>
<?php $APPLICATION->IncludeFile(SITE_INCLUDE_PATH . "/system/scripts_before_body.php", [], ["SHOW_BORDER" => false]); ?>
</body>
</html>