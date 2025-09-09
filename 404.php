<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

http_response_code(404);
define("ERROR_404", "Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Страница не найдена");
?>
<style>
    .error-404 {
        display: flex;
        flex-direction: column;
        gap: 20px;
        align-items: center;
    }
    .error-404 h1 {
        font-size: 200px;
        font-weight: 600;
        color: #1252da;
    }
    @media (max-width: 765px) {
        .error-404 h1 {
            font-size: 140px;
            font-weight: 600;
            color: #1252da;
        }
    }
</style>
    <section style="padding-top: 120px;">
        <div class="container">
            <div class="error-404">
                <h1>404</h1>
                <p>К сожалению, страница не найдена.</p>
                <a href="/" class="btn">На главную</a>
            </div>
        </div>
    </section>

<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>