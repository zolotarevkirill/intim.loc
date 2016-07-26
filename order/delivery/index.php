
<?php
//require 'city_arr.php';
//require 'delivery_variants.php';
require 'CalculatePriceDeliveryCdek.php';

$city_id = $_REQUEST['city_id'];
$tarif_id =  $_REQUEST['tarif_id'];

$date = '2016-05-20';
$login = '3e1b3be31d5df09bfdca03f452ce82cd';
$secure_password = 'a018d43fff7880d165258da46b78d304';
$secure = md5($date . '&' . $secure_password);



$check = new CalculatePriceDeliveryCdek();



$check->setAuth($login, $secure_password);
$check->setSenderCityId(44); //ID города/района отправителя
$check->setReceiverCityId($city_id); //ID города/района получаетля
$check->addGoodsItemBySize(1, 10, 20, 30); //Вес, длина, ширина, высота
$check->setTariffId($tarif_id);
$check->calculate();

print json_encode($check->getResult());

//var_dump($check->calculate());
//var_dump($check->getError());
//print '<br/>';
//echo "<pre>";
//var_dump($check->getResult());


//$check->setTariffId(137);
//$check->dateExecute('2016-05-20');
//        $check->setTariffId(138);
//        $check->setTariffId(139);
//        $check->setTariffId(233);
//        $check->setTariffId(234);
//        $check->setTariffId(301);
//        $check->setTariffId(302);
//        $check->setTariffId(291);
//        $check->setTariffId(293);
//        $check->setTariffId(294);
//        $check->setTariffId(295);                   

//var_dump($check->calculate());
//print '<br/>';
//var_dump($check->getError());
//print '<br/>';
//echo "<pre>";
//var_dump($check->getResult());

