<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

global $USER;
CModule::IncludeModule("main");
CModule::IncludeModule("CFile");
$base_url = 'http://www.mysecretplace.ru';
$shop_name = 'Интернет-бутик SECRETPLACE';
$shop_company = 'ООО SECRETPLACE';
$shop_url = 'http://www.mysecretplace.ru';


if (CModule::IncludeModule("iblock")) {


    $IBLOCK_ID = 5;
    $Select = Array("NAME");
    $arFilter = Array('IBLOCK_ID' => $IBLOCK_ID, 'ACTIVE' => 'Y');
    $Sections = CIBlockSection::GetList(
                    Array("SORT" => "ASC"), $arFilter, $Select
    );
    $Categoryes = Array();
    while ($Section = $Sections->Fetch()) {
        $Categoryes[] = $Section;
    }


    $arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL", "PROPERTY_price", "DETAIL_PICTURE", "IBLOCK_SECTION_ID", "DETAIL_TEXT", "PROPERTY_producer");
    $arFilter = Array("IBLOCK_ID" => $IBLOCK_ID, "ACTIVE" => "Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 5000), $arSelect);
    while ($ob = $res->GetNextElement()) {
        $arFields[] = $ob->GetFields();
    }


    foreach ($arFields as $k => $t) {
        $arFields[$k]['DETAIL_PICTURE'] = CFile::GetPath($t['DETAIL_PICTURE']);
    }


//    echo "<pre>";
//    var_dump($arFields);
//    die();
}


$xml = new SimpleXMLElement('<yml_catalog date="' . date('Y-m-d H:m') . '"></yml_catalog>');
$shop = $xml->addChild('shop');
$shop->addChild('name', $shop_name);
$shop->addChild('company', $shop_company);
$shop->addChild('url', $shop_url);

$shop_currencies = $shop->addChild('currencies');
$currency = $shop_currencies->addChild('currency');

$currency->addAttribute('id', 'RUR');
$currency->addAttribute('rate', '1');
$categories = $shop->addChild('categories');

foreach ($Categoryes as $v) {
    $category = $categories->addChild('category', $v['NAME']);
    $category->addAttribute('id', $v['ID']);
    if ($v['IBLOCK_SECTION_ID'] != NULL) {
        $category->addAttribute('parentId', $v['IBLOCK_SECTION_ID']);
    }
}

$offers = $shop->addChild('adult','true');
$offers = $shop->addChild('offers');

foreach ($arFields as $v) {

    if(strlen($v['DETAIL_TEXT']) > 0){
        $text = htmlspecialchars($v['DETAIL_TEXT']);
    }else{
        $text = '';
    }

    $offer = $offers->addChild('offer');
    $offer->addAttribute('id', $img);
    $offer->addAttribute('available', 'true');

    $offer->addChild('url', $base_url . $v['DETAIL_PAGE_URL']);
    $offer->addChild('price', $v['PROPERTY_PRICE_VALUE']);
    $offer->addChild('currencyId', 'RUR');
    $offer->addChild('categoryId', $v['IBLOCK_SECTION_ID']);
    $offer->addChild('picture', $base_url . $v['DETAIL_PICTURE']);
    $offer->addChild('name', $v['NAME']);
    $offer->addChild('vendor', $v["PROPERTY_PRODUCER_VALUE"]);
    $offer->addChild('description', $text);
}


print $xml->asXML('price.xml');


