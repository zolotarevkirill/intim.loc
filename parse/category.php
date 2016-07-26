<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");

global $DB;
$ID = 0;
$IBLOCK_ID = 5;
$path = "http://int.loc/upload/new_img/";


if (CModule::IncludeModule("iblock")) {

    CModule::IncludeModule("main");

    $categories = $DB->Query("SELECT * FROM category");
    $products = $DB->Query("SELECT * FROM data");


    while ($row = $categories->Fetch()) {
        $rows[] = $row;
    }

    while ($product = $products->Fetch()) {
        $prods[] = $product;
    }


    //Element
    //ARKTIKUL = 9
    //CODE = CODE
    //NAME == NAME
    //CENA_OPT == 11
    //CENA_ROZN = 12
    //OSTATOK = 13
    //OPISANIE = DETAIL_TEXT
    //PROIZV = 16
    //STRANA = 15
    //MATERIAL = 14
    //CVET = 33
    //DLINA = 34
    //DIAM = 35
    //IST = 36
    //UPAK = 37
    //CENA_IM = 38
    //category_id







    foreach ($rows as $k => $row) {

        if (!$row["parent_id"]) {

            $bs = new CIBlockSection;
            $arFields = Array(
                "ACTIVE" => "Y",
                //"IBLOCK_SECTION_ID" => $IBLOCK_SECTION_ID,
                "IBLOCK_ID" => $IBLOCK_ID,
                "NAME" => $row["title"],
                "SORT" => $row["id"],
                "CODE" => translit($row["title"])
            );


            $ID = $bs->Add($arFields);

            $cat_first[$k]['NAME'] = $ID;
            $cat_first[$k]['ID_BD'] = $row["id"];

            if (!$ID) {
                echo $bs->LAST_ERROR;
            }

            foreach ($prods as $p) {
                if ($p["category_id"] == $row["id"]) {
                    $el = NULL;
                    $el = new CIBlockElement;

                    $PROP = array();
                    $PROP[9] = $p['ARKTIKUL'];
                    $PROP[11] = $p['CENA_OPT'];
                    $PROP[12] = $p['CENA_ROZN'];
                    $PROP[13] = $p['OSTATOK'];
                    $PROP[16] = $p['PROIZV'];
                    $PROP[15] = $p['STRANA'];
                    $PROP[14] = $p['MATERIAL'];
                    $PROP[33] = $p['CVET'];
                    $PROP[34] = $p['DLINA'];
                    $PROP[35] = $p['DIAM'];
                    $PROP[36] = $p['IST'];
                    $PROP[37] = $p['UPAK'];
                    $PROP[38] = $p['CENA_IM'];

                    $arLoadProductArray = Array(
                        "MODIFIED_BY" => 1,
                        "IBLOCK_SECTION_ID" => $ID,
                        "IBLOCK_ID" => $IBLOCK_ID,
                        "PROPERTY_VALUES" => $PROP,
                        "NAME" => $p["NAME"],
                        "CODE" => translit($p["NAME"]),
                        "ACTIVE" => "Y",
                        "PREVIEW_TEXT" => $p["OPISANIE"],
                        "DETAIL_TEXT" => $p["OPISANIE"],
                        "DETAIL_PICTURE" => CFile::MakeFileArray($path . "img_" . $p['id'] . ".jpg")
                    );

                   

                    $el->Add($arLoadProductArray);
                }
            }
        }
    }



    //echo "<pre>";
    //var_dump($cat_first);
    //die();

    foreach ($rows as $k => $row) {
        foreach ($cat_first as $val) {
            if ($val['ID_BD'] == $row["parent_id"]) {

                $bs = new CIBlockSection;

                $arFields = Array(
                    "ACTIVE" => "Y",
                    "IBLOCK_SECTION_ID" => $val['NAME'],
                    "IBLOCK_ID" => $IBLOCK_ID,
                    "NAME" => $row["title"],
                    "SORT" => $row["id"],
                    "CODE" => translit($row["title"])
                );



                $ID = $bs->Add($arFields);

                if (!$ID) {
                    echo $bs->LAST_ERROR;
                }

                foreach ($prods as $p) {
                    if ($p["category_id"] == $row["id"]) {
                        $el = NULL;
                        $el = new CIBlockElement;

                        $PROP = array();
                        $PROP[9] = $p['ARKTIKUL'];
                        $PROP[11] = $p['CENA_OPT'];
                        $PROP[12] = $p['CENA_ROZN'];
                        $PROP[13] = $p['OSTATOK'];
                        $PROP[16] = $p['PROIZV'];
                        $PROP[15] = $p['STRANA'];
                        $PROP[14] = $p['MATERIAL'];
                        $PROP[33] = $p['CVET'];
                        $PROP[34] = $p['DLINA'];
                        $PROP[35] = $p['DIAM'];
                        $PROP[36] = $p['IST'];
                        $PROP[37] = $p['UPAK'];
                        $PROP[38] = $p['CENA_IM'];

                        $arLoadProductArray = Array(
                            "MODIFIED_BY" => 1,
                            "IBLOCK_SECTION_ID" => $ID,
                            "IBLOCK_ID" => $IBLOCK_ID,
                            "PROPERTY_VALUES" => $PROP,
                            "NAME" => $p["NAME"],
                            "CODE" => translit($p["NAME"]),
                            "ACTIVE" => "Y",
                            "PREVIEW_TEXT" => $p["OPISANIE"],
                            "DETAIL_TEXT" => $p["OPISANIE"],
                            "DETAIL_PICTURE" => CFile::MakeFileArray($path . "img_" . $p['id'] . ".jpg")
                        );

                       

                        $el->Add($arLoadProductArray);
                    }
                }
            }
        }
    }



    echo "GOOD";

//        if ($row['id'] == '1') {
//            //$trans = translit($row["title"]);
//            //var_dump($trans);
//            echo $trans . "<br/>";
//            echo $row["title"] . "<br/>";
//            echo $row["parent_id"] . "<br/>";
//            
//            
//        }
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
