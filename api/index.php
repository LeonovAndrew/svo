<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

header('Content-Type: application/json');

// ==== Конфигурация ====
define("API_LOGIN", COption::GetOptionString('svo.settings', 'login'));
define("API_PASSWORD", COption::GetOptionString('svo.settings', 'password'));
$IBLOCK_ID = 2;

// ==== Авторизация ====
$login = $_GET['login'] ?? '';
$password = $_GET['password'] ?? '';

if ($login !== API_LOGIN || $password !== API_PASSWORD) {
    echo json_encode(['error' => 'Доступ запрещен']);
    die();
}

// ==== Фильтрация по last_id ====
$lastId = (int)($_GET['last_id'] ?? 0);

$arFilter = ["IBLOCK_ID" => $IBLOCK_ID, "ACTIVE" => "Y"];
if ($lastId > 0) {
    $arFilter[">ID"] = $lastId;
}

// ==== Выборка ====
\Bitrix\Main\Loader::includeModule('iblock');

$res = CIBlockElement::GetList(
    ["ID" => "ASC"],
    $arFilter,
    false,
    false,
    ["ID", "NAME", "PROPERTY_PHONE", "PROPERTY_AGE", "PROPERTY_REGION"]
);

$data = [];
while ($ar = $res->Fetch()) {
    $data[] = [
        'id' => (int)$ar['ID'],
        'name' => $ar['NAME'],
        'phone' => $ar['PROPERTY_PHONE_VALUE'],
        'age' => $ar['PROPERTY_AGE_VALUE'],
        'region' => $ar['PROPERTY_REGION_VALUE'],
    ];
}

// ==== Результат ====
echo json_encode($data, JSON_UNESCAPED_UNICODE);
die();