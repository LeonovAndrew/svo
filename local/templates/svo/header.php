<?php

use Bitrix\Main\Page\Asset;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
          rel="stylesheet">
    <link
            href="https://unpkg.com/aos@2.3.1/dist/aos.css"
            rel="stylesheet"
    />
    <?php
    global $APPLICATION;
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
    $host = $_SERVER['HTTP_HOST'];
    $uri = $APPLICATION->GetCurPage(false); // без параметров
    ?>
    <link rel="canonical" href="<?= $protocol ?>://<?= $host ?><?= $uri ?>"/>
    <?php Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/assets/main-ChIB8fuU.css?v=" . time()); ?>
    <?php $APPLICATION->ShowHead(); ?>
    <title><?php $APPLICATION->ShowTitle(); ?></title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="/local/templates/svo/js/animations.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.min.js"></script>
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            $("#modal").iziModal();
            $("#modal-success").iziModal();

            $(".modal__skip").on("click", () => {
                document.querySelectorAll(".modal")?.forEach(modal => {
                    $(modal).iziModal("close");
                });
            });
            $(".modal__skip_close").on("click", () => {
                document.querySelectorAll(".modal")?.forEach(modal => {
                    $(modal).iziModal("close");
                });
            });
        });

        function showPopup () {
            $('#modal-success').iziModal('open');
        }
    </script>
    <script type="module" crossorigin src="/local/templates/svo/assets/main-aQT3TlVc.js?v=<?= time(); ?>"></script>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (m, e, t, r, i, k, a) {
            m[i] = m[i] || function () {
                (m[i].a = m[i].a || []).push(arguments)
            };
            m[i].l = 1 * new Date();
            for (var j = 0; j < document.scripts.length; j++) {
                if (document.scripts[j].src === r) {
                    return;
                }
            }
            k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
        })(window, document, 'script', 'https://mc.yandex.ru/metrika/tag.js', 'ym');

        ym(97327791, 'init', {webvisor: true, clickmap: true, accurateTrackBounce: true, trackLinks: true});
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/97327791" style="position:absolute; left:-9999px;" alt=""/></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
</head>
<body>
<div id="panel">
    <?php $APPLICATION->ShowPanel(); ?>
</div>
<div class="wrapper">
    <header class="header">
        <div class="container">
            <div class="header__wrap">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "top_menu",
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

                <a
                        href="#"
                        data-izimodal-open="#modal"
                        type="button"
                        class="header__btn btn"
                >
                    Связаться с нами
                </a>

                <button
                        type="button"
                        class="header__mobile-btn"
                ></button>
            </div>
        </div>

        <div class="header__drop-down">
            <div class="container">
                <? $APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "mobile_menu",
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
                </ul>
            </div>
        </div>
    </header>

    <main class="main">