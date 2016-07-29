<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("main");
global $USER;
?>
<?php if (CModule::IncludeModule("iblock")): ?>
    <?php if ($_POST): ?>
        <?php

        global $DB;
        $cnt = 0;
        $sum = 0;
        if ($USER->IsAuthorized()) {
            $id_user = $USER->GetID();
            $sess = 'user' . $id_user;
        } else {
            $sess = session_id();
        }
        $auth = "";
        
            $item = trim($_POST['item']);
            $ptice = trim($_POST['price']);

            if ($item != null || $ptice != null) {
                $select_item = $DB->Query("SELECT * FROM b_cart WHERE `item_id` =  '$item' AND `sess_id` = '$sess'");
                $numRowsItem = $select_item->SelectedRowsCount();
                if ($numRowsItem == 0) {
                    $quanty = 1;
                    $insert_item = $DB->Query("INSERT INTO b_cart (`sess_id`, `item_id`, `item_count`, `auth`,`price`) VALUES ('$sess', '$item', '$quanty', '$auth','$ptice')");
                } else {
                    $product = $select_item->Fetch();
                    $count_start = $product["item_count"];
                    $count_new = $count_start + 1;
                    $update_item = $DB->Query("UPDATE b_cart SET item_count='$count_new' WHERE sess_id= '$sess' AND `auth` =  '$auth' AND `item_id` = '$item' AND `price` = '$ptice'");
                }
            }


            $count = $DB->Query("SELECT * FROM b_cart WHERE sess_id = '{$sess}'");
            $numRows = $count->SelectedRowsCount();
            if ($numRows > 0) {
                while ($rows = $count->Fetch()) {
                    $arr_items[] = $rows;
                }
            }
            if (count($arr_items) > 0) {
                $cnt = count($arr_items);
                foreach ($arr_items as $item) {
                    $sum = $sum + ($item["item_count"] * $item["price"]);
                }
            }

            $arr_items['CNT'] = $cnt;
            $arr_items['SUM'] = $sum;
        

 
        echo json_encode($arr_items);
        ?>




    <?php endif; ?>
<?php endif; ?>




