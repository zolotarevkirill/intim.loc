<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
global $USER;
CModule::IncludeModule("main");
CModule::IncludeModule("iblock");

if ($_POST) {
    


    if ($_POST['action'] == 'update_user_info') {
        $PGENDER = trim($_POST["PGENDER"]);
        $PBIRTHDATE = trim($_POST["PBIRTHDATE"]);
        $LastName = trim($_POST["LastName"]);
        $FirstName = trim($_POST["FirstName"]);
        $userID = trim($_POST['userID']);
        $PERSONAL_PHONE = trim($_POST['PERSONAL_PHONE']);
        update_user_info($PGENDER, $PBIRTHDATE, $LastName, $FirstName, $userID,$PERSONAL_PHONE);
    }

    if ($_POST['action'] == 'update_user_email') {
        $Email = $_POST['UserEmail'];
        $userID = trim($_POST['userID']);

        echo (check_email($Email)) ? update_user_email($Email, $userID) : "Error!";
    }

    if ($_POST['action'] == 'update_user_pswd') {
        $user = new CUser;

        $pswd1 = trim($_POST['pswd1']);
        $pswd2 = trim($_POST['pswd2']);
        $pswd3 = trim($_POST['pswd3']);
        $userID = trim($_POST['userID']);

        $rsUser = $user->GetByID($userID);
        $arUser = $rsUser->Fetch();


        $message = '';
        $real = isUserPassword($userID, $pswd1);


        if ($real == 1) {
            if ($pswd2 == $pswd3 && $pswd2 != NULL && $pswd2 != '' && $pswd3 != NULL && $pswd3 != '') {
                $user = new CUser;
                $fields = Array(
                    "PASSWORD" => $pswd2,
                    "CONFIRM_PASSWORD" => $pswd2
                );
                $user->Update($userID, $fields);
                echo "Пароль успешно изменен!";
            } else {
                echo "Пароли не свопадают!";
            }
        } else {
            echo "Вы ввели не верный текущий пароль!";
        }
    }


    if ($_POST['action'] == 'update_user_adress') {
        $userID = trim($_POST['userID']);
        $adressUser = trim($_POST['userAdress']);

        update_user_adress($userID, $adressUser);
    }


    if ($_POST['action'] == 'update_user_order') {
        $order_id = trim($_POST['order_id']);
        $userID = trim($_POST['userID']);
        $action = trim($_POST['action']);
        
        $sess = 'user' . $userID;
        
        $arSelect = Array("ID", "NAME", "PROPERTY_ORDERS", "DATE_CREATE");
        $arFilter = Array("IBLOCK_ID" => 8, "=PROPERTY_USER" => $sess);
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 50), $arSelect);
        while ($ob = $res->GetNextElement()) {
            $arFields[] = $ob->GetFields();
        }
        
        
        
        
        foreach($arFields as $it){
            $last['id'] = 0;
            $last['cnt'] = 0;
            
            foreach($it["PROPERTY_ORDERS_VALUE"] as $v){
                
                $select_item = $DB->Query("SELECT * FROM `b_cart` WHERE `item_id` =  '$v' AND `sess_id` = '$sess'");
                $numRowsItem = $select_item->SelectedRowsCount();
                if ($numRowsItem == 0){
                    $insert_item = $DB->Query("INSERT INTO `intmag`.`b_cart` (`sess_id`, `item_id`, `item_count`, `auth`) VALUES ('$sess', '$v', '1', '$auth')");
                }else{
                   $product = $select_item->Fetch();
                   $count_start = $product["item_count"];
                   $count_new = $count_start + 1;
                   $update_item = $DB->Query("UPDATE `intmag`.`b_cart` SET item_count='$count_new' WHERE sess_id= '$sess' AND `auth` =  '$auth' AND `item_id` = '$v'");
                }
                
  
            };
            
        }
        

    }
}

function update_user_info($sex, $brth, $lname, $name, $userID,$PERSONAL_PHONE) {



    $user = new CUser;
    $fields = Array(
        "NAME" => $name,
        "LAST_NAME" => $lname,
        "PERSONAL_GENDER" => $sex,
        "PERSONAL_BIRTHDAY" => $brth,
        "PERSONAL_PHONE" => $PERSONAL_PHONE
    );
    $user->Update($userID, $fields);
    $strError .= $user->LAST_ERROR;
}

function update_user_adress($userID, $adressUser) {
    $user = new CUser;
    $fields = Array(
        "PERSONAL_STREET" => $adressUser
    );
    $user->Update($userID, $fields);
}

function update_user_email($Email, $userID) {
    $user = new CUser;
    $fields = Array(
        "EMAIL" => $Email,
    );
    $user->Update($userID, $fields);
    $strError .= $user->LAST_ERROR;
}

function isUserPassword($userId, $password) {
    $userData = CUser::GetByID($userId)->Fetch();

    $salt = substr($userData['PASSWORD'], 0, (strlen($userData['PASSWORD']) - 32));

    $realPassword = substr($userData['PASSWORD'], -32);
    $password = md5($salt . $password);

    return ($password == $realPassword);
}
