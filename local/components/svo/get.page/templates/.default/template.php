<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<div class="element-detail">
    <h1><?= $arResult["FIELDS"]["NAME"] ?></h1>

    <? if ($arResult["FIELDS"]["PREVIEW_TEXT"]): ?>
        <div class="preview-text">
            <?= $arResult["FIELDS"]["PREVIEW_TEXT"] ?>
        </div>
    <? endif; ?>

    <? if ($arResult["FIELDS"]["DETAIL_TEXT"]): ?>
        <div class="detail-text">
            <?= $arResult["FIELDS"]["DETAIL_TEXT"] ?>
        </div>
    <? endif; ?>

    <? if (!empty($arResult["PROPERTIES"])): ?>
        <div class="properties">
            <h2>Свойства</h2>
            <ul>
                <? foreach ($arResult["PROPERTIES"] as $code => $property): ?>
                    <? if (!empty($property["VALUE"])): ?>
                        <li>
                            <strong><?= $property["NAME"] ?>:</strong>
                            <? if (is_array($property["~VALUE"])): ?>
                                <?= implode(", ", $property["~VALUE"]) ?>
                            <? else: ?>
                                <?= $property["~VALUE"] ?>
                            <? endif; ?>
                        </li>
                    <? endif; ?>
                <? endforeach; ?>
            </ul>
        </div>
    <? endif; ?>
</div>