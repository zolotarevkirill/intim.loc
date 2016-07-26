<?php
require $_SERVER['DOCUMENT_ROOT'].'/include/img.php';
//require $_SERVER['DOCUMENT_ROOT'].'/include/cbr.php';


//Картинка
//$img = thumb($_SERVER['DOCUMENT_ROOT'].$arResult["DETAIL_PICTURE"]["SRC"], 700);
//$arResult["DETAIL_PICTURE"]["SRC"] = str_replace('/var/www/webgold/data/www/mysecretplace.ru', '', $img);




//Цена
//$content = get_content();
//$dollar = get_dollar($content);
//$xd = ceil($dollar);



$start = ceil($arResult["PROPERTIES"]["price"]["~VALUE"]);

$PRICE = number_format($start,0,'',' ');
$arResult["PRICE"] = $PRICE;


$cp = $this->__component; // объект компонента
if (is_object($cp)){
    $cp->SetResultCacheKeys(array('TIMESTAMP_X'));
}
     





  
  
  
  

  
  


