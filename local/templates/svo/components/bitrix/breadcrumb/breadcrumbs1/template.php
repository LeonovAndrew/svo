<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';

$strReturn .= '<ul class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '
				<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
					<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" class="breadcrumbs__link"> '.$title.' </a>
					<meta itemprop="position" content="'.($index + 1).'" />
				</li>';
	}
	else
	{
		$strReturn .= '
			<li class="breadcrumbs__current">
				<span class="breadcrumbs__link">'.$title.'</span>
			</li>';
	}
}

$strReturn .= '</ul>';

return $strReturn;
