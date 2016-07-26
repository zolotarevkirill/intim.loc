<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
require $_SERVER['DOCUMENT_ROOT'] . '/include/img.php';
global $DB, $USER_FIELD_MANAGER;

$ID = 0;
$IBLOCK_ID = 5;


$db = new PDO('mysql:host=localhost', 'root', '');
$db->exec('use testintim');
$db->exec('SET NAMES utf8');


$q = $db->query("SELECT * FROM category");

$cat_old = [];
$cat_new = [];

while ($r = $q->fetchObject()) {
    //print $r->id . '<br>';
    $cat_old[$r->id] = $r->title;
}
echo "<pre>";
//print_r($cat_old);

if (CModule::IncludeModule("iblock")) {

    //Cat
    $arFilter = Array('IBLOCK_ID' => $IBLOCK_ID);
    $db_list = CIBlockSection::GetList(Array(), $arFilter, true);

    while ($ar_result = $db_list->GetNext()) {
        $cat_new[$ar_result['ID']] = $ar_result['NAME'];
    }
    
    //print_r($cat_new);
    //
    $cnt = 0;
    foreach ($cat_old as $k => $v) {
        if(in_array($v, $cat_new)){
            print $v.'<br>';
            $cnt++;
        }else{
            print '-'.$v.'<br>';
        }
    }
    print count($cat_new).'<br>';;
    print $cnt;

//    //
//    //
//    //Prod
//    $arSelect = Array("ID", "NAME", "PROPERTY_art");
//    $arFilter = Array("IBLOCK_ID" => $IBLOCK_ID, "INCLUDE_SUBSECTIONS" => "Y");
//    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 5000), $arSelect);
//    while ($ob = $res->GetNextElement()) {
//        $arFields[] = $ob->GetFields();
//    }
//    
//    //echo "<pre>";
//    //var_dump($arFields);
}

