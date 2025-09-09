<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Iblock\InheritedProperty\ElementValues;

class GetPageComponent extends CBitrixComponent
{
    public function onPrepareComponentParams($arParams)
    {
        $arParams["IBLOCK_ID"] = (int)$arParams["IBLOCK_ID"];
        $arParams["ELEMENT_ID"] = (int)$arParams["ELEMENT_ID"];
        $arParams["CACHE_TIME"] = (int)$arParams["CACHE_TIME"] > 0 ? (int)$arParams["CACHE_TIME"] : 3600;
        return $arParams;
    }

    public function executeComponent()
    {
        if (!\Bitrix\Main\Loader::includeModule('iblock')) {
            throw new \Exception('Модуль iblock не установлен');
        }
        if ($this->startResultCache()) {
            $this->getElement();
            $this->includeComponentTemplate();
        }
        // SEO всегда устанавливаем, даже при использовании кеша
        $this->setSeo();
    }

    protected function getElement()
    {
        if (!CModule::IncludeModule("iblock")) {
            $this->abortResultCache();
            ShowError("Модуль инфоблоков не установлен");
            return;
        }

        $filter = [
            "IBLOCK_ID" => $this->arParams["IBLOCK_ID"],
            "ACTIVE" => "Y",
            $this->arParams["ELEMENT_ID"] > 0 ? "ID" : "CODE" =>
                $this->arParams["ELEMENT_ID"] > 0 ? $this->arParams["ELEMENT_ID"] : $this->arParams["ELEMENT_CODE"]
        ];

        $res = CIBlockElement::GetList([], $filter, false, false, ["*", "PROPERTY_*"]);

        if ($element = $res->GetNextElement()) {
            $this->arResult["FIELDS"] = $element->GetFields();
            $this->arResult["PROPERTIES"] = $element->GetProperties();
        } else {
            $this->abortResultCache();
            ShowError("Элемент не найден");
        }
    }

    protected function setSeo()
    {
        global $APPLICATION;

        if (empty($this->arResult["FIELDS"])) return;

        $ipropElementValues = new ElementValues(
            $this->arParams["IBLOCK_ID"],
            $this->arResult["FIELDS"]["ID"]
        );

        $iPropertyValues = $ipropElementValues->getValues();

        if ($iPropertyValues["ELEMENT_META_TITLE"]) {
            $APPLICATION->SetPageProperty("title", $iPropertyValues["ELEMENT_META_TITLE"]);
        }
        if ($iPropertyValues["ELEMENT_META_DESCRIPTION"]) {
            $APPLICATION->SetPageProperty("description", $iPropertyValues["ELEMENT_META_DESCRIPTION"]);
        }
        if ($iPropertyValues["ELEMENT_META_KEYWORDS"]) {
            $APPLICATION->SetPageProperty("keywords", $iPropertyValues["ELEMENT_META_KEYWORDS"]);
        }

        if (empty($APPLICATION->GetPageProperty("title")) && $this->arResult["FIELDS"]["NAME"]) {
            $APPLICATION->SetTitle($this->arResult["FIELDS"]["NAME"]);
        }
    }
}