<?php
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetTitle('Главная');

$APPLICATION->IncludeComponent(
    "svo:get.page",
    "main",
    [
        "CACHE_NOTES" => "",
        "CACHE_TIME" => 3600,
        "CACHE_TYPE" => "A",
        "ELEMENT_ID" => 1,
        "IBLOCK_ID" => 1,
    ]
);

require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');