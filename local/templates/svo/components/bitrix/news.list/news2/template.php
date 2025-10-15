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
	$arr = array_filter($arResult["ITEMS"], function ($item) {
		return $item["ID"] != $GLOBALS["EXCLUDE_ID"];
	});
?>

<? if (count($arr) > 0): ?>

<section class="read-more">
    <div class="container">
        <h2 class="read-more__title block-title">Статьи</h2>

        <div class="read-more__slider swiper" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="swiper-wrapper">
                <?foreach($arr as $arItem):?>
					<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					?>
					<div class="news-item swiper-slide">
						<a href="/statyi/<?=$arItem["CODE"]?>/" class="news-item__img-link">
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
						<a href="/statyi/<?=$arItem["CODE"]?>/" class="news-item__link"> Подробнее </a>
					</div>
				<?endforeach;?>
            </div>
        </div>

        <div class="read-more__pagination pagination"></div>

		<div class="read-more__more-wrap">
			<a href="/statyi/" class="read-more__more-btn">
				Все статьи
			</a>
		</div>
		
    </div>
</section>

<style>

	.read-more {
		padding-bottom: 0;
	}

	.read-more__more-wrap {
		display: flex;
		justify-content: center;
		margin-top: 4.375rem;
	}

	.read-more__more-btn {
		margin: 0 auto;
		font-weight: 600;
		font-size: 1.25rem;
		text-decoration: underline !important;
		text-align: center;
		color: #1252DA;
	}

	@media all and (max-width: 1024px) {
		.read-more__more-wrap {
			margin-top: 3.75rem;
		}
	}

	@media all and (max-width: 600px) {
		.read-more__more-wrap {
			margin-top: 2.25rem;
		}
	}

</style>

<? endif; ?>