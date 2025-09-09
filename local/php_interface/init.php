<?php

if(file_exists($_SERVER['DOCUMENT_ROOT'].'/local/php_interface/includes/functions.php')){
    include_once $_SERVER['DOCUMENT_ROOT'].'/local/php_interface/includes/functions.php';
}
if ($_SERVER['SERVER_PORT'] != 443 && $_SERVER['HTTP_X_FORWARDED_PROTO'] != 'https') {
    $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect);
    exit();
}