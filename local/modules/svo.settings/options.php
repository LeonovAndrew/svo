<?php

use Bitrix\Main\Localization\Loc;
use Bitrix\Sale\PaySystem\Manager;

Loc::loadMessages(__FILE__);

if ($APPLICATION->GetGroupRight('svo.settings') >= 'R') {
    $aTabs = [
        [
            'DIV' => 'edit1',
            'TAB' => 'Настройки сайта',
            'TITLE' => 'Настройки сайта',
        ],
    ];

    $tabControl = new CAdminTabControl('tabControl', $aTabs);

    if ($_REQUEST['save'] && check_bitrix_sessid()) {
        COption::SetOptionString('svo.settings', 'phone', $_REQUEST['phone']);
        COption::SetOptionString('svo.settings', 'telegram', $_REQUEST['telegram']);
        COption::SetOptionString('svo.settings', 'vk', $_REQUEST['vk']);
        COption::SetOptionString('svo.settings', 'max', $_REQUEST['max']);
        COption::SetOptionString('svo.settings', 'ok', $_REQUEST['ok']);
        COption::SetOptionString('svo.settings', 'name', $_REQUEST['name']);
        COption::SetOptionString('svo.settings', 'login', $_REQUEST['login']);
        COption::SetOptionString('svo.settings', 'password', $_REQUEST['password']);
    }

    $tabControl->Begin();
    $tabControl->BeginNextTab();

    ?>
    <form method="post" action="<?= $APPLICATION->GetCurPage() ?>?mid=<?= urlencode($mid) ?>&lang=<?= LANGUAGE_ID ?>">
        <?= bitrix_sessid_post() ?>
        <tr>
            <td width="40%">Телефон:</td>
            <td width="60%">
                <input type="text" name="phone"
                       value="<?= htmlspecialcharsbx(COption::GetOptionString('svo.settings', 'phone')) ?>">
            </td>
        </tr>
        <tr>
            <td width="40%">Telegram:</td>
            <td width="60%">
                <input type="text" name="telegram"
                       value="<?= htmlspecialcharsbx(COption::GetOptionString('svo.settings', 'telegram')) ?>">
            </td>
        </tr>
        <tr>
            <td width="40%">ВК:</td>
            <td width="60%">
                <input type="text" name="vk"
                       value="<?= htmlspecialcharsbx(COption::GetOptionString('svo.settings', 'vk')) ?>">
            </td>
        </tr>
        <tr>
            <td width="40%">MAX:</td>
            <td width="60%">
                <input type="text" name="max"
                       value="<?= htmlspecialcharsbx(COption::GetOptionString('svo.settings', 'max')) ?>">
            </td>
        </tr>
        <tr>
            <td width="40%">Одноклассники:</td>
            <td width="60%">
                <input type="text" name="ok"
                       value="<?= htmlspecialcharsbx(COption::GetOptionString('svo.settings', 'ok')) ?>">
            </td>
        </tr>
        <tr>
            <td width="40%">Название в подвале:</td>
            <td width="60%">
                <input type="text" name="name"
                       value="<?= htmlspecialcharsbx(COption::GetOptionString('svo.settings', 'name')) ?>">
            </td>
        </tr>
        <tr>
            <td width="40%">Логин для API:</td>
            <td width="60%">
                <input type="text" name="login"
                       value="<?= htmlspecialcharsbx(COption::GetOptionString('svo.settings', 'login')) ?>">
            </td>
        </tr>
        <tr>
            <td width="40%">Пароль для API:</td>
            <td width="60%">
                <input type="text" name="password"
                       value="<?= htmlspecialcharsbx(COption::GetOptionString('svo.settings', 'password')) ?>">
            </td>
        </tr>
        <?
        $tabControl->Buttons();
        ?>
        <input type="submit" name="save" value="Сохрарнить">
        <?
        $tabControl->End();
        ?>
    </form>
    <?
}