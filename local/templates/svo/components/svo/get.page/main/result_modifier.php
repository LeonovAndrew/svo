<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?php
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var string $templateName
 * @var string $componentPath
 */
use Bitrix\Main\Loader;
use Bitrix\Iblock\Elements\ElementSolutionTable;
?>
<?php
if (!CModule::IncludeModule('iblock')) {
    ShowError('Модуль инфоблоков не установлен');
    return;
}
/*****************REVIEWS**********/
// Параметры выборки
$arFilter = [
    'IBLOCK_CODE' => 'mainReviews', // Символьный код инфоблока
    'ACTIVE' => 'Y',                // Только активные элементы
];
$arSelect = [
    'ID',
    'NAME',                         // Название элемента
    'PREVIEW_PICTURE',              // Превью-картинка
    'PROPERTY_VIDEO',               // Свойство типа файл (VIDEO)
];
$arOrder = ['SORT' => 'ASC'];       // Сортировка (можно изменить)
$nPageSize = 15;                    // Лимит элементов

// Получаем элементы
$dbItems = CIBlockElement::GetList(
    $arOrder,
    $arFilter,
    false,
    ['nTopCount' => $nPageSize],
    $arSelect
);

$arResult['REVIEWS'] = [];
while ($arItem = $dbItems->GetNext()) {
    // Обрабатываем превью-картинку (получаем путь)
    $arItem['PREVIEW_PICTURE'] = CFile::GetPath($arItem['PREVIEW_PICTURE']);

    // Обрабатываем свойство VIDEO (получаем путь к файлу)
    if ($arItem['PROPERTY_VIDEO_VALUE']) {
        $arItem['PROPERTY_VIDEO_VALUE'] = CFile::GetPath($arItem['PROPERTY_VIDEO_VALUE']);
    }

    // Записываем в итоговый массив
    $arResult['REVIEWS'][] = [
        'NAME' => $arItem['NAME'],
        'PREVIEW_PICTURE' => $arItem['PREVIEW_PICTURE'],
        'VIDEO' => $arItem['PROPERTY_VIDEO_VALUE'],
    ];
}

/********FAQ************/
$arFilter = [
    'IBLOCK_CODE' => 'questions', // Символьный код инфоблока
    'ACTIVE' => 'Y',                // Только активные элементы
];
$arSelect = [
    'ID',
    'NAME',
    'DETAIL_TEXT',
];
$arOrder = ['SORT' => 'ASC'];
$nPageSize = 15;

// Получаем элементы
$dbItems = CIBlockElement::GetList(
    $arOrder,
    $arFilter,
    false,
    ['nTopCount' => $nPageSize],
    $arSelect
);

$arResult['FAQ'] = [];
while ($arItem = $dbItems->GetNext()) {
    // Записываем в итоговый массив
    $arResult['FAQ'][] = [
        'NAME' => $arItem['NAME'],
        'ANSVER' => $arItem['DETAIL_TEXT'],
    ];
}

/*******************/
$arResult['SOLUTION'] = [];
$arFilter = [
    'IBLOCK_CODE' => 'solution', // Символьный код инфоблока
    'ACTIVE' => 'Y',                // Только активные элементы
];


$res = CIBlockElement::GetList([], $arFilter, false, false, ["ID", 'NAME', 'PREVIEW_PICTURE', 'DETAIL_PAGE_URL', 'DETAIL_PICTURE', "PROPERTY_*"]);

while ($element = $res->GetNextElement()) {
    $arFields= $element->GetFields();
    $arParams = $element->GetProperties();
    $arImg = [];
    $arImg['src'] = '';
    if(!empty($arFields['PREVIEW_PICTURE'])){
        $arImg = CFile::ResizeImageGet($arFields['PREVIEW_PICTURE'], ['width' => 600, 'height' => 400], BX_RESIZE_IMAGE_PROPORTIONAL);
    }elseif (!empty($arFields['PREVIEW_PICTURE'])){
        $arImg = CFile::ResizeImageGet($arFields['DETAIL_PICTURE'], ['width' => 600, 'height' => 400], BX_RESIZE_IMAGE_PROPORTIONAL);
    }

    $arResult['SOLUTION'][] = [
        'NAME' => $arFields['NAME'],
        'URL' => $arFields['DETAIL_PAGE_URL'],
        'IMG' => $arImg['src'],
        'PROBLEM' => $arParams['PROBLEM']['VALUE'][0],
        'SOLUTION' => $arParams['SOLUTION']['VALUE'][0],
        'RESULT' => $arParams['RESULT']['VALUE'][0],
    ];
}
?>
