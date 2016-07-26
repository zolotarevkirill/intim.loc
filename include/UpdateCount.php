<?php 
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("main");
global $USER;
?>
<?php if (CModule::IncludeModule("iblock")): ?>
    <?php

    if ($_POST['select']) {
        $it = $_POST['item'];
        //$sess = $_POST['sess'];
        if ($USER->IsAuthorized()){
            $id_user = $USER->GetID();
            $sess = 'user' . $id_user;
        }else{
            $sess = session_id();
        }

        $count = $DB->Query("SELECT SUM(item_count) AS sum_count FROM b_cart WHERE sess_id = '$sess'");
        $numRows = $count->SelectedRowsCount();
        $rows = $count->Fetch();
        if ($rows["sum_count"] != NULL) {
            $select_item = $DB->Query("SELECT * FROM b_cart WHERE sess_id = '$sess' AND item_id = '$it'");

            while ($item = $select_item->Fetch()) {
                $products[] = $item;
            }
            if (count($products) > 0) {
                $count = 0;
                if ($_POST['select'] == 'plus') {
                    $count = (int) $products[0]['item_count'] + 1;
                } else {
                    $count = (int) $products[0]['item_count'] - 1;
                    if ($count < 0 || $count == 0) {
                        $DB->Query("DELETE FROM `intmag`.`b_cart` WHERE sess_id = '$sess' AND item_id = '$it'");
                        exit;
                    }
                }
                $DB->Query("UPDATE `intmag`.`b_cart` SET `item_count`='$count' WHERE sess_id = '$sess' AND item_id = '$it'");
            } else {
                echo "FALSE";
            }
        } else {
            echo "FALSE";
        }
    }
    ?>
<?php endif; ?>


