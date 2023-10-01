
<?
function OnAfterIBlockElementUpdateHandler(&$arFields) {
    $cacheId = "my_cache_id"; 
    $cacheDir = "/my_cache"; 

    if ($arFields['IBLOCK_ID'] == 2) {
        $GLOBALS["CACHE_MANAGER"]->Clean($cacheId, $cacheDir);
    }
}