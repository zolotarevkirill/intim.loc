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



$strReturn .= '<ul class="breadcrumb">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);

	$nextRef = ($index < $itemSize-2 && $arResult[$index+1]["LINK"] <> ""? ' itemref="bx_breadcrumb_'.($index+1).'"' : '');
	$child = ($index > 0? '"' : '');
	$arrow = ($index > 0? '' : '');

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
            
        
		$strReturn .= '
			
				'.$arrow.'
				<li><a href="'.$arResult[$index]["LINK"].'" title="'.$title.'">
					'.$title.'
				</a></li>
			';
	}
	else
	{
		$strReturn .= '
			
				'.$arrow.'
				<li><a href="'.$arResult[$index]["LINK"].'">'.$title.'</a></li>
			';
	}
}

$strReturn .= '</ul>';

return $strReturn;
?>
