<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

$response = [
    'success' => false,
    'message' => '',
];

try {
    $name = trim($_POST['name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $region = trim($_POST['region'] ?? '');
    $old = trim($_POST['old'] ?? '');

    if (empty($name)) throw new Exception('Укажите ФИО');
    if (empty($phone)) throw new Exception('Укажите телефон');

    $arFields = [
        'AUTHOR' => $name,
        'AUTHOR_REGION' => $region,
        'AUTHOR_PHONE' => $phone,
        'AUTHOR_OLD' => $old,
        'DATE_CREATE' => date('d.m.Y H:i:s'),
    ];

    $eventName = 'FORM_SUBMIT';
    CEvent::Send($eventName, SITE_ID, $arFields);

    $response['fields'] = $arFields;

    $response['success'] = true;
    $response['message'] = 'Сообщение успешно отправлено!';

    \Bitrix\Main\Loader::includeModule('iblock');

    $el = new CIBlockElement;

    $PROP = [];
    $PROP['PHONE'] = $phone;
    $PROP['AGE'] = $old;
    $PROP['REGION'] = $region;

    $arLoadProductArray = [
        "IBLOCK_ID" => 2,
        "NAME" => $name,
        "ACTIVE" => "Y",
        "DATE_ACTIVE_FROM" => ConvertTimeStamp(time(), "FULL"),
        "PROPERTY_VALUES" => $PROP,
    ];

    $el->Add($arLoadProductArray);
    $response['arLoadProductArray']  = $arLoadProductArray;
} catch (Exception $e) {
    $response['message'] = $e->getMessage();
}

header('Content-Type: application/json');
echo json_encode($response);
die();