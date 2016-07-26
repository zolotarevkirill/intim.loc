<?php

$db = new PDO('mysql:host=localhost', 'root', '');
$db->exec('use intimbd');
$db->exec('SET NAMES utf8');

$data = file('msk-new1.csv');
unset($data[0]);


//Парсинг категорий из файла
//$category = [];
//
//foreach ($data as $v) {
//    $row = explode(';', iconv('cp1251', 'utf-8', $v));
//
//    $cat = explode('/', $row[7]);
//    if (strlen($cat[0]))
//        $category[$cat[0]] = [];
//}
//
//foreach ($data as $v) {
//
//    $row = explode(';', iconv('cp1251', 'utf-8', $v));
//
//    $cat = explode('/', $row[7]);
//    if (strlen($cat[0]) && strlen($cat[1]))
//        $category[$cat[0]][$cat[1]] = TRUE;
//}



//
//
//
////Заполнение категорий значениями
foreach ($category as $k1 => $v1) {
    $title = $k1;
    
    $db->query("INSERT INTO category (title) VALUES ('$title')");
    $id = $db->lastInsertId();

    foreach ($v1 as $v2 => $k2) {
        $title = $v2;
        $parent_id = $id;
        
        $db->query("INSERT INTO category (title, parent_id) VALUES ('$title', '$parent_id')");
    }
}

//ARKTIKUL,CODE,NAME,CENA_ROZN,CENA_OPT,URL,OSTATOK,GROUP,OPISANIE,GARANT,IMPORT,EAN,PROIZV,STRANA,MATERIAL,CVET,DLINA,DIAM,IST,UPAK,CENA_IM
$products = [];
//print 1;
//
////Генерация запросов для добавления товаров
foreach ($data as $v) {
    $row = explode(';', iconv('cp1251', 'utf-8', $v));
    $cat = explode('/', $row[7]);
    
    foreach ($row as $k => $v) {
        $row[$k] = str_replace("'", "\'", $v);
    }

    if (count($cat) == 1) {
        $q = $db->query("SELECT id FROM category WHERE title = '{$cat[0]}' AND parent_id IS NULL");
        if ($q->rowCount() == 1) {
            $id = $q->fetchObject()->id;
            print "INSERT INTO data (`ARKTIKUL`,`CODE`,`NAME`,`CENA_ROZN`,`CENA_OPT`,`URL`,`OSTATOK`,`GROUP`,`OPISANIE`,`GARANT`,`IMPORT`,`EAN`,`PROIZV`,`STRANA`,`MATERIAL`,`CVET`,`DLINA`,`DIAM`,`IST`,`UPAK`,`CENA_IM`, `category_id`) VALUES ('{$row[0]}', '{$row[1]}', '{$row[2]}', '{$row[3]}', '{$row[4]}', '{$row[5]}', '{$row[6]}', '{$row[7]}', '{$row[8]}', '{$row[9]}', '{$row[10]}', '{$row[11]}', '{$row[12]}', '{$row[13]}', '{$row[14]}', '{$row[15]}', '{$row[16]}', '{$row[17]}', '{$row[18]}', '{$row[19]}', '{$row[20]}', '$id');<br/>";
        }
    } else if (count($cat) == 2) {
        $q = $db->query("SELECT category.* FROM category WHERE title = '{$cat[1]}' AND parent_id = (SELECT id FROM category WHERE title = '{$cat[0]}' AND parent_id IS NULL)");
        if ($q->rowCount() == 1) {
            $id = $q->fetchObject()->id;
            print "INSERT INTO data (`ARKTIKUL`,`CODE`,`NAME`,`CENA_ROZN`,`CENA_OPT`,`URL`,`OSTATOK`,`GROUP`,`OPISANIE`,`GARANT`,`IMPORT`,`EAN`,`PROIZV`,`STRANA`,`MATERIAL`,`CVET`,`DLINA`,`DIAM`,`IST`,`UPAK`,`CENA_IM`, `category_id`) VALUES ('{$row[0]}', '{$row[1]}', '{$row[2]}', '{$row[3]}', '{$row[4]}', '{$row[5]}', '{$row[6]}', '{$row[7]}', '{$row[8]}', '{$row[9]}', '{$row[10]}', '{$row[11]}', '{$row[12]}', '{$row[13]}', '{$row[14]}', '{$row[15]}', '{$row[16]}', '{$row[17]}', '{$row[18]}', '{$row[19]}', '{$row[20]}', '$id');<br/>";
        }
    }
}

//print 2;