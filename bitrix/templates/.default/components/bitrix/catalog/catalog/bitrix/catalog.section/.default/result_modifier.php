<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

require $_SERVER['DOCUMENT_ROOT'].'/include/img.php';





            //$imgSRC = str_replace('D:/OpenServer/OpenServer/domains/int.loc/', '', $img);




foreach($arResult["ITEMS"] as $k => $item){
  
    if($item["DETAIL_PICTURE"]["SRC"]){
        
        $img = thumb($_SERVER['DOCUMENT_ROOT'].$item["DETAIL_PICTURE"]["SRC"], 250);
        $arResult["ITEMS"][$k]["DETAIL_PICTURE"]["SRC"] = str_replace('/var/www/webgold/data/www/mysecretplace.ru', '', $img);
        
//        var_dump($_SERVER['DOCUMENT_ROOT'].$item["DETAIL_PICTURE"]["SRC"]);
//        var_dump($img);
//        
//        die();
    }
    
    
    //die();
    if($item["PROPERTIES"]["price"]["~VALUE"]){
        //Цена
        //$content = get_content();
        //$dollar = get_dollar($content);
        //$xd = ceil($dollar);
        $start = ceil($item["PROPERTIES"]["price"]["~VALUE"]);

        $PRICE = number_format($start,0,'',' ');
        $arResult["ITEMS"][$k]["PROPERTIES"]["price"]["~VALUE"] = $PRICE;
        
    }
    
}

$cp = $this->__component; // объект компонента
if (is_object($cp)){
    $cp->SetResultCacheKeys(array('TIMESTAMP_X'));
}







