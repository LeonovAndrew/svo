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
    $captcha_token = trim($_POST['smart-token'] ?? ''); // токен капчи

    // Проверка капчи
    if (empty($captcha_token)) throw new Exception('Не пройдена проверка капчи');

    // Валидация капчи через Яндекс API
    $captcha_secret = \COption::GetOptionString('svo.settings', 'yasecret');
    $captcha_url = 'https://smartcaptcha.yandexcloud.net/validate';

    $captcha_params = [
        'secret' => $captcha_secret,
        'token' => $captcha_token,
        'ip' => $_SERVER['REMOTE_ADDR'] // опционально
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $captcha_url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($captcha_params));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

    $captcha_response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($http_code !== 200) {
        throw new Exception('Ошибка при проверке капчи');
    }

    $captcha_result = json_decode($captcha_response, true);

    if (!$captcha_result['status'] === 'ok') {
        throw new Exception('Не пройдена проверка капчи');
    }

    // Проверка обязательных полей
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