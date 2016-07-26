<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("main");
global $USER;
if (CModule::IncludeModule("iblock")) {
    global $DB;
    
    if (count($_POST) == 5) {
        $quanty = $_POST['quanty'];
        
        if ($USER->IsAuthorized()){
            $id = $USER->GetID();
            $sess = 'user'.$id;
        }else{
          $sess = $_POST['sess'];  
        }
        
        $auth = $_POST['auth'];
        $item = $_POST['item'];

        $select_item = $DB->Query("SELECT * FROM `b_cart` WHERE `item_id` =  '$item' AND `sess_id` = '$sess'");
        $numRowsItem = $select_item->SelectedRowsCount();

        if ($numRowsItem == 0) {
            $insert_item = $DB->Query("INSERT INTO `intmag`.`b_cart` (`sess_id`, `item_id`, `item_count`, `auth`) VALUES ('$sess', '$item', '$quanty', '$auth')");
            echo "OK";
        } else {
            $product = $select_item->Fetch();
            $count_start = $product["item_count"];
            $count_new = $count_start + $quanty;
            $update_item = $DB->Query("UPDATE `intmag`.`b_cart` SET item_count='$count_new' WHERE sess_id= '$sess' AND `auth` =  '$auth' AND `item_id` = '$item'");
            echo "OK";
        }
    } else {
        echo "Error 1";
    }
} else {
    echo "Error 0";
}
