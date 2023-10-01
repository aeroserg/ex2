<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();

echo $arResult["H1_TITLE"];
?>
<? echo "Метка времени: " . time();?>
<?foreach ($arResult["ITEMS"] as $arItem):?>
<h3><?=$arItem["TITLE"]?></h3>
<ul>

	<?foreach($arItem["ITEM_TEXT"] as $arText){
		echo $arText;
	}?>

</ul>
<?endforeach;?>