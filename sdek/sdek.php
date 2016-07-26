<?php

// 
//Здравствуйте.
//Параметры тестовой учетной записи:
//Account: dc9eb86ff3b08443d1a85849e6d29995
//Secure_password: 51fa4a4db27e0037e494e8e504761f6b
//Email: zolotarevkirill@yandex.ru
//
//Параметры боевой учетной записи:
//Account: 3e1b3be31d5df09bfdca03f452ce82cd
//Secure_password: a018d43fff7880d165258da46b78d304
//Email: zolotarevkirill@yandex.ru
//http://gw.edostavka.ru:11443/call_courier.php
//поля secure,  вычисляемое по алгоритму:
//secure = md5(date.'&'.secure_password), где
//secure_password — секретный код, предоставляемый СДЭКом,
//date — дата документа (для всех запросов - значение параметра Date xml-запроса, кроме запроса «Статусы заказов» в формате get-запроса, где используется значение параметра DateFirst). 
//Во всех модулях дата_время передается в формате UTC( 0000-00-00T00:00:00 ), если иное не указано в описании. 
//ИМ отправляет POST запрос на адрес:
//•	для документа «Список заказов на доставку» 	http://gw.edostavka.ru:11443/new_orders.php;
//•	для документа «Прозвон получателя» 	http://gw.edostavka.ru:11443/new_schedule.php;
//•	для документа «Вызов курьера» 	http://gw.edostavka.ru:11443/call_courier.php;
//•	для документа «Список заказов на удаление» 	http://gw.edostavka.ru:11443/delete_orders.php.
//•	для документа «Печатная форма квитанции к заказу» http://gw.edostavka.ru:11443/orders_print.php.
//с заполненной переменной $_POST['xml_request'], в которой передается содержимое XML фaйла.


$date = '2016-05-16';
$secure_password = '51fa4a4db27e0037e494e8e504761f6b';

$secure = md5($date.'&'.$secure_password);

$xml_request = '<?xml version="1.0" encoding="UTF-8" ?>
<DeliveryRequest Number="236" Date="2016-05-16" Account="dc9eb86ff3b08443d1a85849e6d29995" Secure="'.$secure.'" OrderCount="1">
    
    <Order Number="5504" 	
	DeliveryRecipientCost="150" 
	SendCityCode="270" 
	RecCityCode="44"
	RecipientName="Lubomir Dmitry Vladimirovich"
	Phone="9197747341"
	SellerName="Ruston"
	RecientCurrency="RUB"
	ItemsCurrency="RUB"
	Comment="Офис группы компаний Ланит. При приезде позвонить на мобильный телефон."
	TariffTypeCode="11">
	<Address Street="Боровая" House="д. 7, стр. 2" Flat="оф.10" />
	<Package Number="1" BarCode="102" Weight="810">
	   <Item WareKey="25000358171" Cost="164" Payment="0" Weight="158" Amount="1" Comment="ХочуУчиться Логика (Беденко 		М.В.)"/>
	   <Item WareKey="25000428787" Cost="107" Payment="0" Weight="194" Amount="1" Comment="ЛомоносовскаяШкола(о) Считаю и 	решаю Д/детей 5-6 л"/>
	   <Item WareKey="33000002164" Cost="107"  Payment="0" Weight="174" Amount="1" Comment="ЛомоносовскаяШкола(о) Говорю 	красиво Д/детей 6-7 л"/>
	   <Item WareKey="33000002165" Cost="107" Payment="0" Weight="174" Amount="1" Comment="ЛомоносовскаяШкола(о) Говорю 	красиво Д/детей 6-7 л"/>
	</Package>
	
	
	<Schedule>	
 	   <Attempt ID="3" Date="2016-05-18" TimeBeg="19:00:00" TimeEnd="22:00:00"/>
	</Schedule>	
    </Order>
</DeliveryRequest>
';




$link = "http://gw.edostavka.ru:11443/new_orders.php";
$chx = curl_init();//инициализация curl
curl_setopt($chx, CURLOPT_URL, $link);//адрес запроса
curl_setopt($chx, CURLOPT_TIMEOUT, 90);
curl_setopt($chx, CURLOPT_RETURNTRANSFER, 1);// Ожидание ответа сервера
curl_setopt($chx, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
curl_setopt($chx, CURLOPT_POST, 1);
curl_setopt($chx, CURLOPT_POSTFIELDS, "xml_request=".$xml_request);
$result = curl_exec($chx);
curl_close($chx);
echo $result."<br/>";
var_dump($result);