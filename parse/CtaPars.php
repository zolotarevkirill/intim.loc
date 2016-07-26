<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
require $_SERVER['DOCUMENT_ROOT'] . '/include/img.php';
global $DB, $USER_FIELD_MANAGER;



$ID = 0;
$IBLOCK_ID = 5;


if (CModule::IncludeModule("iblock")) {
    $categories = $DB->Query("SELECT * FROM category");

    while ($row = $categories->Fetch()) {
        $rows[] = $row;
    }


    foreach ($rows as $k => $v) {




        if (!$v["parent_id"]) {


            $ID_CAT = '';
            $get_cat_id = $DB->Query("SELECT id FROM category WHERE parent_id = " . $v['id'] . " LIMIT 1");
            while ($iditem = $get_cat_id->Fetch()) {

                $ID_CAT = $iditem;
            }
            if ($ID_CAT == '0' || $ID_CAT == NULL) {
                $ID_CAT['id'] = $v['id'];
            }
            $ID_IMG = '';
            $get_image_id = $DB->Query("SELECT id FROM data WHERE category_id = {$ID_CAT['id']} LIMIT 1");
            while ($idimg = $get_image_id->Fetch()) {
                $ID_IMG = $idimg;
            }

            $img = thumb($_SERVER['DOCUMENT_ROOT'] . "/upload/img/img/img_{$ID_IMG['id']}.jpg", 300);
            $imgSRC = str_replace('E:/SERV/OpenServer/domains/sex.loc/', '', $img);


            $bs = new CIBlockSection;
            $arFields = Array(
                "ACTIVE" => "Y",
                "CODE" => translit($v['title']),
                "IBLOCK_ID" => $IBLOCK_ID,
                "NAME" => $v["title"],
                "PICTURE" => CFile::MakeFileArray("http://sex.loc/{$imgSRC}"),
                "SORT" => $v["id"],
            );

            $ID = $bs->Add($arFields);

            $cat_first[$k]['NAME'] = $ID;
            $cat_first[$k]['ID_BD'] = $v["id"];

            if (!$ID) {
                
                echo translit($v['title'])."<br/>";
                echo $v["title"]."<br/>";
                echo $bs->LAST_ERROR;
                die();
            }
        }
    }

    foreach ($rows as $k => $v) {
        foreach ($cat_first as $val) {
            if ($val['ID_BD'] == $v["parent_id"]) {


                $ID_CAT = '';
                $get_cat_id = $DB->Query("SELECT id FROM category WHERE parent_id = " . $v['id'] . " LIMIT 1");
                while ($iditem = $get_cat_id->Fetch()) {

                    $ID_CAT = $iditem;
                }
                if ($ID_CAT == '0' || $ID_CAT == NULL) {
                    $ID_CAT['id'] = $v['id'];
                }
                $ID_IMG = '';
                $get_image_id = $DB->Query("SELECT id FROM data WHERE category_id = {$ID_CAT['id']} LIMIT 1");
                while ($idimg = $get_image_id->Fetch()) {
                    $ID_IMG = $idimg;
                }

                $img = thumb($_SERVER['DOCUMENT_ROOT'] . "/upload/img/img/img_{$ID_IMG['id']}.jpg", 300);
                $imgSRC = str_replace('E:/SERV/OpenServer/domains/sex.loc/', '', $img);

                $bs = new CIBlockSection;
                $arFields = Array(
                    "ACTIVE" => "Y",
                    "IBLOCK_SECTION_ID" => $val['NAME'],
                    "CODE" => translit($v['title']),
                    "IBLOCK_ID" => $IBLOCK_ID,
                    "NAME" => $v["title"],
                    "PICTURE" => CFile::MakeFileArray("http://sex.loc/{$imgSRC}"),
                    "SORT" => $v["id"],
                );

                $ID = $bs->Add($arFields);

                if (!$ID) {
//                    echo translit($v['title'])."<br/>";
//                    echo $v["title"]."<br/>";
//                    echo $bs->LAST_ERROR;
//                    die();
                    
                    $arFields['CODE'] = translit($v['title']).'2';
                    $ID = $bs->Add($arFields);
                    if (!$ID){
                        echo $bs->LAST_ERROR;
                        die();
                    }
                }
            }
        }
    }


    if (CModule::IncludeModule("iblock")) {

        $products = $DB->Query("SELECT data.*,category.title as 'category_title' FROM data LEFT JOIN category ON category.id = data.category_id");
        while ($row = $products->Fetch()) {
            $rows[] = $row;
        }

        $arFilter = array('IBLOCK_ID' => 5);
        $rsSections = CIBlockSection::GetList(array(), $arFilter);
        while ($arSction = $rsSections->Fetch()) {
            $Categories[] = $arSction;
        }

        foreach ($Categories as $c) {
            foreach ($rows as $item) {
                if ($item['category_title'] == $c['NAME']) {

                    $el = new CIBlockElement;
                    $PROP = array();
                    $PROP[32] = $item['id'];
                    $PROP[9] = $item['ARKTIKUL'];
                    $PROP[40] = $item['CODE'];
                    $PROP[12] = $item['CENA_ROZN'];
                    $PROP[41] = $item['CENA_OPT'];
                    $PROP[13] = $item['OSTATOK'];
                    $PROP[42] = $item['GARANT'];
                    $PROP[16] = $item['PROIZV'];
                    $PROP[15] = $item['STRANA'];
                    $PROP[14] = $item['MATERIAL'];
                    $PROP[33] = $item['CVET'];
                    $PROP[34] = $item['DLINA'];
                    $PROP[35] = $item['DIAM'];
                    $PROP[36] = $item['IST'];
                    $PROP[37] = $item['UPAK'];
                    $PROP[38] = $item['CENA_IM'];

                    $IMG_LOAD = CFile::MakeFileArray("http://sex.loc/upload/img/img/img_{$item['id']}.jpg");

                    if (is_array($IMG_LOAD)) {
                        if ($IMG_LOAD["type"] == 'image/jpeg') {
                            $arLoadProductArray = Array(
                                "MODIFIED_BY" => 1,
                                "CODE" => translit($item['NAME']) . "" . rand(1, 10000),
                                "PROPERTY_VALUES" => $PROP,
                                "IBLOCK_SECTION_ID" => $c['ID'],
                                "IBLOCK_ID" => 5,
                                "NAME" => $item['NAME'],
                                "PREVIEW_TEXT" => $item['OPISANIE'],
                                "DETAIL_TEXT" => $item['OPISANIE'],
                                "PREVIEW_PICTURE" => CFile::MakeFileArray("http://sex.loc/upload/img/img/img_{$item['id']}.jpg"),
                                "DETAIL_PICTURE" => CFile::MakeFileArray("http://sex.loc/upload/img/img/img_{$item['id']}.jpg"),
                                "ACTIVE" => "Y"
                            );
                        }
                    } else {
                        $arLoadProductArray = Array(
                            "MODIFIED_BY" => 1,
                            "CODE" => translit($item['NAME']) . "" . rand(1, 10000),
                            "PROPERTY_VALUES" => $PROP,
                            "IBLOCK_SECTION_ID" => $c['ID'],
                            "IBLOCK_ID" => 5,
                            "NAME" => $item['NAME'],
                            "PREVIEW_TEXT" => $item['OPISANIE'],
                            "DETAIL_TEXT" => $item['OPISANIE'],
                            "PREVIEW_PICTURE" => CFile::MakeFileArray("http://sex.loc/upload/img/img/noimg.jpg"),
                            "DETAIL_PICTURE" => CFile::MakeFileArray("http://sex.loc/upload/img/img/noimg.jpg"),
                            "ACTIVE" => "Y"
                        );
                    }

                    if ($PRODUCT_ID = $el->Add($arLoadProductArray)) {
                        echo "New ID: " . $PRODUCT_ID;
                    } else {
                         
                        $arLoadProductArray = Array(
                            "MODIFIED_BY" => 1,
                            "CODE" => translit($item['NAME']) . "" . rand(1, 10000),
                            "PROPERTY_VALUES" => $PROP,
                            "IBLOCK_SECTION_ID" => $c['ID'],
                            "IBLOCK_ID" => 5,
                            "NAME" => $item['NAME'],
                            "PREVIEW_TEXT" => $item['OPISANIE'],
                            "DETAIL_TEXT" => $item['OPISANIE'],
                            "PREVIEW_PICTURE" => CFile::MakeFileArray("http://sex.loc/upload/img/img/noimg.jpg"),
                            "DETAIL_PICTURE" => CFile::MakeFileArray("http://sex.loc/upload/img/img/noimg.jpg"),
                            "ACTIVE" => "Y"
                        );
                        
                        $PRODUCT_ID = $el->Add($arLoadProductArray);
                       
                    }
                }
            }
        }


        echo "Готово";
    }


    echo "VSE";
}

function translit($s) {
    $s = (string) $s; // преобразуем в строковое значение
    $s = strip_tags($s); // убираем HTML-теги
    $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
    $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
    $s = trim($s); // убираем пробелы в начале и конце строки
    $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр (иногда надо задать локаль)
    $s = strtr($s, array('а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'e', 'ж' => 'j', 'з' => 'z', 'и' => 'i', 'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'shch', 'ы' => 'y', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya', 'ъ' => '', 'ь' => ''));
    $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
    $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
    return $s; // возвращаем результат
}
