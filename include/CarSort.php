<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
global $DB, $USER_FIELD_MANAGER;
$ID = 0;
$IBLOCK_ID = 5;

if (CModule::IncludeModule("iblock")) {
    global $USER_FIELD_MANAGER;

    $aSection = CIBlockSection::GetList(array(), array(
                'IBLOCK_CODE' => 'products',
            ))->Fetch();

    if (!$aSection) {
        throw new Exception('Секция не найдена');
    }

    $USER_FIELD_MANAGER->Update('IBLOCK_5_SECTION', 955, array(
        'UF_GIRL' => '1'
    )); 
}