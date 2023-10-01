<?php
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
global $CACHE_MANAGER;

CModule::IncludeModule("iblock");

$iblockId = $arParams['IBLOCK_ID'];
$ClassifierIblockId = $arParams['CLASSIFIER_IBLOCK_ID'];
$prop = $arParams['PROPERTY_CODE'];

$cacheId = "my_cache_id"; 
$cacheTime = $arParams['CACHE_TIME'];
$cacheDir = "/my_cache";


if ($this->StartResultCache($cacheTime, $cacheId, $cacheDir))
{
   if (defined('BX_COMP_MANAGED_CACHE') && is_object($GLOBALS['CACHE_MANAGER']))
   {
            $GLOBALS['CACHE_MANAGER']->RegisterTag('my_cache_id');   
   }

	$res2 = \CIBlockElement::GetList(
				[],
				["IBLOCK_ID" => $ClassifierIblockId],
				false,
				false,
				[]
	);
	
	while($ob = $res2->GetNext())
	{
	
		$arResult["ITEMS"][$ob['ID']]["TITLE"] = $ob['NAME'];
	
		$res = \CIBlockElement::GetList(
					[],
					["IBLOCK_ID" => $iblockId, $prop => $ob['ID']],
					false,
					false,
					[]
		);
	
		while($currentElId = $res->GetNext())
		{	
	
			$itemProps = CIBlockElement::GetPropertyValues(
				$iblockId,
				$currentElId,
				true,
				array()
			);
				while($el = $itemProps->GetNext())
				{
					$arResult["ITEMS"][$ob['ID']]["ITEM_TEXT"][] = "<li>" . $currentElId['NAME'] . " - " . $el[2] . " - " . $el[7] . " - " . $el[6] . " - <a href=" . $currentElId["DETAIL_PAGE_URL"] . ">ссылка на детальный просмоттр - ". $currentElId["DETAIL_PAGE_URL"] . "</a></li>";
				}
	
		}
	
	}
	
	$arResult["H1_TITLE"] = "<h1 id='pagetitle'>Разделов - " . count($arResult["ITEMS"]) . "</h1>";
	$this->IncludeComponentTemplate();

}
else
{
   $this->AbortResultCache();
}