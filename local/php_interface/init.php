<?php

if(file_exists($_SERVER['DOCUMENT_ROOT'].'/local/php_interface/includes/functions.php')){
    include_once $_SERVER['DOCUMENT_ROOT'].'/local/php_interface/includes/functions.php';
}

// Получаем домен из запроса
$currentHost = $_SERVER['HTTP_HOST'];

// Проверяем, не является ли текущий домен svo.leonovlo.beget.tech
if ($currentHost !== 'svo.leonovlo.beget.tech') {
    // Проверяем, используется ли HTTPS
    $isHttps = false;

    // Проверяем стандартный порт HTTPS
    if (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443) {
        $isHttps = true;
    }

    // Проверяем заголовок X-Forwarded-Proto (для прокси/балансировщиков нагрузки)
    if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
        $isHttps = true;
    }

    // Проверяем HTTPS переменную сервера
    if (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1)) {
        $isHttps = true;
    }

    // Если не HTTPS, делаем редирект
    if (!$isHttps) {
        $redirect = 'https://' . $currentHost . $_SERVER['REQUEST_URI'];
        header('HTTP/1.1 301 Moved Permanently');
        header('Location: ' . $redirect);
        exit();
    }
}
?>