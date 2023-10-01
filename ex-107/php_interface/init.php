<?php

$arClasses = [
    'handlers' => '/bitrix/php_interface/include/handlers.php',
];
\CModule::AddAutoloadClasses(null, $arClasses);

RegisterModuleDependences('iblock', 'OnAfterIBlockElementUpdate', 'handlers', 'handlers', 'OnAfterIBlockElementUpdateHandler');
