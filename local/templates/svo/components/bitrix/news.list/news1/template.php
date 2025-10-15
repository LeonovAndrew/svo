<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

<?
	$exclude_id = $arParams["EXCLUDE_ID"];
?>

<? if (count($arResult["ITEMS"]) - 1 > 0): ?>

<section class="read-more">
    <div class="container">
        <h2 class="read-more__title block-title">Читайте также</h2>

        <div class="read-more__slider swiper" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="swiper-wrapper">
                <?foreach($arResult["ITEMS"] as $arItem):?>
					<? if ($arItem['ID'] != $exclude_id): ?>
					<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					?>
					<div class="news-item swiper-slide">
						<a href="/news/<?=$arItem["CODE"]?>/" class="news-item__img-link">
							<img
								src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
								alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
								class="news-item__img"
							/>
						</a>
						<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
							<span class="news-item__date marked"> <?= $arItem["DISPLAY_ACTIVE_FROM"]?> </span>
						<?endif?>
						<span class="news-item__title">
							<?= $arItem["NAME"]?>
						</span>
						<a href="/news/<?=$arItem["CODE"]?>/" class="news-item__link"> Подробнее </a>
					</div>
					<? endif; ?>
				<?endforeach;?>
            </div>
        </div>

        <div class="read-more__pagination pagination"></div>
    </div>
</section>

<? endif; ?>