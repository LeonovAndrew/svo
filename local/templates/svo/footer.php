<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();
?>



</main>
<footer class="footer">
    <div class="container">
        <div class="footer__column">
            <aside class="footer__clue">
                <p>
                    <?php echo \COption::GetOptionString('svo.settings', 'name'); ?>
                </p>
            </aside>
            <a href="/policy/" class="footer__policy">
                Политика конфиденциальности
            </a>
        </div>

        <div class="footer__column">
            <h2 class="footer__column-title block-title">
                Контакты
            </h2>

            <a href="tel:<?php echo \COption::GetOptionString('svo.settings', 'phone'); ?>" class="footer__phone">
                <?php echo \COption::GetOptionString('svo.settings', 'phone'); ?>
            </a>

            <span class="footer__phone-descr">
                            (Звонок бесплатный)
                        </span>

            <div class="footer__socials">
                <a target="_blank" href="<?php echo \COption::GetOptionString('svo.settings', 'telegram'); ?>" class="footer__social">
                    <img
                            src="/local/templates/svo/assets/tg-C6djGKtY.svg"
                            alt="Телеграм"
                    />
                </a>

                <a target="_blank" href="<?php echo \COption::GetOptionString('svo.settings', 'vk'); ?>" class="footer__social">
                    <img
                            src="/local/templates/svo/assets/vk-D3R6182j.svg"
                            alt="Вконтакте"
                    />
                </a>

                <a target="_blank" href="<?php echo \COption::GetOptionString('svo.settings', 'max'); ?>" class="footer__social">
                    <img src="/local/templates/svo/assets/max-CCdUcnu3.svg" alt="MAX"/>
                </a>

                <a target="_blank" href="<?php echo \COption::GetOptionString('svo.settings', 'ok'); ?>" class="footer__social">
                    <img
                            src="/local/templates/svo/assets/classmates-CYMTYhyN.svg"
                            alt="Одноклассники"
                    />
                </a>
            </div>
        </div>

        <div class="footer__column">
            <h2 class="footer__column-title block-title">
                Навигация
            </h2>

            <? $APPLICATION->IncludeComponent(
                "bitrix:menu",
                "footer_menu",
                [
                    "ROOT_MENU_TYPE" => "menu",
                    "CHILD_MENU_TYPE" => "submenu",
                    "USE_EXT" => "Y",
                    "DELAY" => "N",
                    "ALLOW_MULTI_SELECT" => "N",
                    "MENU_CACHE_TYPE" => "N",
                    "MENU_CACHE_TIME" => "3600",
                    "MENU_CACHE_USE_GROUPS" => "Y",
                    "MENU_CACHE_GET_VARS" => [],
                ],
                false,
                []
            ); ?>
        </div>
    </div>
</footer>

<a href="#" class="back-btn"><img src="/local/templates/svo/img/icons/back-arrow.svg" alt="Вверх" /></a>

<div
        role="dialog"
        aria-modal="true"
        aria-labelledby="modal-title"
        class="modal"
        id="modal"
>
    <button type="button" class="modal__skip">
        <svg
                width="42"
                height="42"
                viewBox="0 0 42 42"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
        >
            <path
                    d="M31.5 10.5L10.5 31.5"
                    stroke="#222222"
                    stroke-linecap="round"
                    stroke-linejoin="round"
            />
            <path
                    d="M10.5 10.5L31.5 31.5"
                    stroke="#222222"
                    stroke-linecap="round"
                    stroke-linejoin="round"
            />
        </svg>
    </button>

    <h2 id="modal-title" class="modal__title block-title">
        Если есть вопросы,
        <mark class="marked">свяжитесь с нами!</mark>
    </h2>

    <a href="tel:<?php echo \COption::GetOptionString('svo.settings', 'phone'); ?>" target="_blank" class="modal__phone">
        <?php echo \COption::GetOptionString('svo.settings', 'phone'); ?>
    </a>
    <span class="modal__phone-descr"> (Звонок бесплатный) </span>

    <div class="modal__socials">
        <a href="<?php echo \COption::GetOptionString('svo.settings', 'telegram'); ?>" target="_blank" class="modal__social">
            <img src="/local/templates/svo/assets/tg-C6djGKtY.svg" alt="Телеграм"/>
        </a>

        <a href="<?php echo \COption::GetOptionString('svo.settings', 'vk'); ?>" target="_blank" class="modal__social">
            <img src="/local/templates/svo/assets/vk-D3R6182j.svg" alt="Вконтакте"/>
        </a>

        <a href="<?php echo \COption::GetOptionString('svo.settings', 'max'); ?>" target="_blank" class="modal__social">
            <img src="/local/templates/svo/assets/max-CCdUcnu3.svg" alt="MAX"/>
        </a>

        <a href="<?php echo \COption::GetOptionString('svo.settings', 'ok'); ?>" target="_blank" class="modal__social">
            <img
                    src="/local/templates/svo/assets/classmates-CYMTYhyN.svg"
                    alt="Одноклассники"
            />
        </a>
    </div>
    <div class="btn_first_wrap">
        <a href="#callback" class="home__btn btn modal__skip_close">
            Оставить заявку
        </a>
    </div>
</div>

<div
        role="dialog"
        aria-modal="true"
        aria-labelledby="modal-title"
        class="modal"
        id="modal-success"
>
    <button type="button" class="modal__skip">
        <svg
                width="42"
                height="42"
                viewBox="0 0 42 42"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
        >
            <path
                    d="M31.5 10.5L10.5 31.5"
                    stroke="#222222"
                    stroke-linecap="round"
                    stroke-linejoin="round"
            />
            <path
                    d="M10.5 10.5L31.5 31.5"
                    stroke="#222222"
                    stroke-linecap="round"
                    stroke-linejoin="round"
            />
        </svg>
    </button>

    <h2 id="modal-title" class="modal__title block-title">Форма отправлена</h2>
    <p>Данные успешно отправлены. Мы скоро свяжемся с
        вами!</p>
</div>
</div>


<!-- Политика Cookie -->
<div id="cookie-policy" class="cookie-banner">
    <div class="cookie-text">
        Оставаясь на сайте, вы соглашаетесь с нашей
        <a class="" href="/policy/" target="_blank">Политикой обработки персональных данных и использованием cookie.</a>
    </div>
    <button id="cookie-accept">Согласен</button>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const banner = document.getElementById("cookie-policy");
        const acceptBtn = document.getElementById("cookie-accept");

        // Проверяем, соглашался ли пользователь ранее
        if (localStorage.getItem("cookieAccepted")) {
            banner.style.display = "none";
        }

        acceptBtn.addEventListener("click", function () {
            localStorage.setItem("cookieAccepted", "true");
            banner.style.display = "none";
        });
    });
</script>
</body>
</html>