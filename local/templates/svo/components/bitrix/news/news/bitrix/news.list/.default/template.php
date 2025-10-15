<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<section class="news">
    <div class="container">
        <?
        $APPLICATION->IncludeComponent(
            "bitrix:breadcrumb",
            "breadcrumbs1",
            [
                "PATH" => "",
                "SITE_ID" => "s1",
                "START_FROM" => "0",
            ]
        );
        ?>

        <h1 class="news__title block-title marked">Новости</h1>

        <div class="news__items" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">

            <? foreach ($arResult["ITEMS"] as $arItem): ?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), ["CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')]);
                ?>
                <div class="news-item">
                    <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="news-item__img-link">
                        <img
                                src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                                alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
                                class="news-item__img"
                        />
                    </a>
                    <? if ($arParams["DISPLAY_DATE"] != "N" && $arItem["DISPLAY_ACTIVE_FROM"]): ?>
                        <span class="news-item__date marked"> <?= $arItem["DISPLAY_ACTIVE_FROM"] ?> </span>
                    <? endif ?>
                    <span class="news-item__title">
						<?= $arItem["NAME"] ?>
					</span>
                    <a href="<?= $arItem["DETAIL_PAGE_URL"] ?>" class="news-item__link"> Подробнее </a>
                </div>
            <? endforeach; ?>
        </div>

        <?php echo $arResult["NAV_STRING"]; ?>
    </div>
</section>