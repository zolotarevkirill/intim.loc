<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("main");
global $USER;
?>
<?php if (CModule::IncludeModule("iblock")): ?>
    <?php

    if ($_POST['item']) {
        $id = trim($_POST['item']);

        global $DB;
        
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
            $DB->Query("DELETE FROM `intmag`.`b_cart` WHERE  `item_id`='$id' AND sess_id = '$sess'");
            
            echo "DELETE FROM `intmag`.`b_cart` WHERE  `item_id`='$id' AND sess_id = '$sess'";
            echo "TRUE";
        } else {
            echo "FALSE";
        }
    } else {
        echo "FALSE";
    }
    ?>
<?php endif; ?>

