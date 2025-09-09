<?php
IncludeModuleLangFile(__FILE__);

if (class_exists("svo_settings"))
    return;

use Bitrix\Main\ModuleManager;

class svo_settings extends CModule
{
    var $MODULE_ID = "svo.settings";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;

    public function __construct()
    {
        $arModuleVersion = [];

        include(__DIR__ . "/version.php");
        if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion)) {
            $this->MODULE_VERSION = $arModuleVersion["VERSION"];
            $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        }

        $this->MODULE_NAME = 'Настройки сайта';
        $this->MODULE_DESCRIPTION = 'Настройки сайта';
    }

    function DoInstall()
    {
        ModuleManager::registerModule($this->MODULE_ID);
    }

    function DoUninstall()
    {
        ModuleManager::unRegisterModule($this->MODULE_ID);
    }
}