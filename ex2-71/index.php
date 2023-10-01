<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Разделы");
?>

<?
$APPLICATION->IncludeComponent(
	"bitrix:simplecomp.exam",
    "",
    Array(
		"IBLOCK_ID" => "2",
		"CLASSIFIER_IBLOCK_ID" => "5",
		"DETAIL_URL_TEMPLATE" => "/products/#ELEMENT_CODE#/",
		"PROPERTY_CODE" => "PROPERTY_COMPANY_NAME",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600"
	)
);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>