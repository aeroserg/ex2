<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
echo $arResult["H1_TITLE"];
?>

<?foreach ($arResult["ITEMS"] as $arItem):?>
<h3><?=$arItem["TITLE"]?></h3>
<ul>

	<?foreach($arItem["ITEM_TEXT"] as $arText){
		echo $arText;
	}?>

</ul>
<?endforeach;?>