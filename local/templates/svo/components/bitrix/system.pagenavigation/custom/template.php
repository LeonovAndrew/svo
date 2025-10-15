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

if (!$arResult["NavShowAlways"]) {
  if ($arResult["NavRecordCount"] == 0 && ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false) || $arResult['NavPageCount'] == 1)
    return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"] . "&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?" . $arResult["NavQueryString"] : "");
?>

<div class="news__pagination article-pagination">

  <? if ($arResult["bDescPageNumbering"] === true): ?>

    <? //TODO Разобраться, нужен ли вообще обратный порядок пагинации ?>

  <? else: ?>

            <?
            $firstPage = 1;
            $lastPage = $arResult["NavPageCount"];

            // Define the number of pages to display around the current page
            $pagesAround = 2;

            // Display the first page if it's not the first page in the range
            if ($arResult["NavPageNomer"] > ($pagesAround + 1)) {
              echo '<button class="article-pagination__btn"><a href="' . $arResult["sUrlPath"] . '?' . $strNavQueryString . 'PAGEN_' . $arResult["NavNum"] . '=1">1</a></button>';

              // Add "..." if there are more than two pages between the first page and the start of the range
              if ($arResult["NavPageNomer"] > ($pagesAround + 2)) {
                echo '<span class="article-pagination__space"> ... </span>';
              }
            }

            $start = max(1, $arResult["NavPageNomer"] - $pagesAround);
            $end = min($arResult["NavPageCount"], $arResult["NavPageNomer"] + $pagesAround);

            for ($i = $start; $i <= $end; $i++) {
              if ($i == $arResult["NavPageNomer"]) {
                echo '<button class="article-pagination__btn active">' . $i . '</button>';
              } else {
				 echo '<button class="article-pagination__btn"><a href="' . $arResult["sUrlPath"] . '?' . $strNavQueryString . 'PAGEN_' . $arResult["NavNum"] . '=' . $i . '">' . $i . '</a></button>';
              }
            }

            if ($arResult["NavPageNomer"] < ($arResult["NavPageCount"] - $pagesAround)) {
              // Add "..." if there are more than two pages between the end of the range and the last page
              if ($arResult["NavPageNomer"] < ($arResult["NavPageCount"] - $pagesAround - 1)) {
                echo '<span class="article-pagination__space"> ... </span>';
              }

              echo '<button class="article-pagination__btn"><a href="' . $arResult["sUrlPath"] . '?' . $strNavQueryString . 'PAGEN_' . $arResult["NavNum"] . '=' . $arResult["NavPageCount"] . '">' . $arResult["NavPageCount"] . '</a></button>';
            }
            ?>

                  <? endif ?>

</div>