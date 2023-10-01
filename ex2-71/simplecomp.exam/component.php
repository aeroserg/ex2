<?php
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();

/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
CModule::IncludeModule("iblock");



$iblockId = $arParams['IBLOCK_ID'];
$ClassifierIblockId = $arParams['CLASSIFIER_IBLOCK_ID'];
$prop = $arParams['PROPERTY_CODE'];

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
		var_dump($currentElId);
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
