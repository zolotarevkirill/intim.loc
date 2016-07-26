<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
global $USER;
CModule::IncludeModule("main");
CModule::IncludeModule("iblock");

if ($_POST) {
    $email = trim($_POST['rmail']);
    $rp1 = trim($_POST['rp1']);
    $rp2 = trim($_POST['rp2']);
    $arResult = $USER->Register($email, "", "", $rp1, $rp2, $email);

    //echo "<pre>";
    //var_dump($arResult);

    if ($arResult["TYPE"] == 'ERROR') {
        ShowMessage($arResult);
    } else {
        //Отправка письма юзеру
        //$message = ;

        $to = $email;
        $subject = 'Регистрация на сайте www.mysecretplace.ru';
        $message = '
<html>
<head>
  <title>Поздравляем! Вы были успешно зарегистрированны в интернет бутике «SecretPlace»</title>
</head>
<body>
  <p>Ваши данные для авторизации на сайте ниже. Вы можете всегда изменить их в личном кабинете.</p>
  <table>
    <tr>
      <th>Логин:</th><th>' . $email . '</th><th></th><th></th>
    </tr>
    <tr>
      <th>Пароль:</th><th>' . $rp1 . '</th><th></th><th></th>
    </tr>
  </table>
</body>
</html>
';
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        mail($to, $subject, $message, $headers);
        
        
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        mail("info@mysecretplace.ru", $subject, $message, $headers);

        ShowMessage($arResult);
    }


    //ShowMessage($arResult); // выводим результат в виде сообщения
    //echo $USER->GetID();
}
