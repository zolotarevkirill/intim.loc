<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
global $USER;
CModule::IncludeModule("main");
CModule::IncludeModule("iblock");

if ($_POST) {
    $aEmail = trim($_POST['aEmail']);
    $aPswd = trim($_POST['aPswd']);

    $arAuthResult = $USER->Login($aEmail, $aPswd, "Y");
    $APPLICATION->arAuthResult = $arAuthResult;
}

