<?php

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("main");
global $USER;
?>
<?php if (CModule::IncludeModule("iblock")): ?>
    <?php

    if ($_POST) {
        if (!$_POST['order_name']) {
            echo "#order-name";
            exit;
        } else {
            $order_name = trim($_POST['order_name']);
            if (mb_strlen($order_name) < 4) {
                echo "#order-name";
                exit;
            }
        }


        if (!$_POST['order_city']) {
            echo "#order-city";
            exit;
        } else {
            $order_city = trim($_POST['order_city']);
        }
        if (!$_POST['order_street']) {
            echo "#order-street";
            exit;
        } else {
            $order_street = trim($_POST['order_street']);
        }

        if (!$_POST['order_room']) {
            echo "#order-room";
            exit;
        } else {
            $order_room = trim($_POST['order_room']);
        }



        if (!$_POST['oplata']) {
            $order_oplata = "";
        } else {
            $order_oplata = trim($_POST['oplata']);
        }

        if (!$_POST['dostavka']) {
            $order_dostavka = "";
        } else {
            $order_dostavka = $_POST['dostavka'];
        }

        if (!$_POST['order_index']) {
            $order_index = "";
        } else {
            $order_index = trim($_POST['order_index']);
        }
        if (!$_POST['order_phone']) {
            echo "#order-phone";
            exit;
        } else {
            $order_phone = trim($_POST['order_phone']);
            if (mb_strlen($order_phone) < 10) {
                echo "#order-phone";
                exit;
            }
        }
        if (!$_POST['order_phone2']) {
            $order_phone2 = "";
        } else {
            $order_phone2 = trim($_POST['order_phone2']);
        }


        //NEW SDEK
        if (!$_POST['deliveryprice']) {
            $deliveryprice = "";
        } else {
            $deliveryprice = trim($_POST['deliveryprice']);
        }


        if (!$_POST['deliveryDateMax']) {
            $deliveryDateMax = "";
        } else {
            $deliveryDateMax = trim($_POST['deliveryDateMax']);
        }

        if (!$_POST['postomat']) {
            $postomat = "";
        } else {
            $postomat = trim($_POST['postomat']);
        }

        if (!$_POST['postmat_id']) {
            $postmat_id = "";
        } else {
            $postmat_id = trim($_POST['postmat_id']);
        }

        if (!$_POST['dostavka_id']) {
            $dostavka_id = "";
        } else {
            $dostavka_id = trim($_POST['dostavka_id']);
        }

        if (!$_POST['order_city_id']) {
            $order_city_id = "";
        } else {
            $order_city_id = trim($_POST['order_city_id']);
        }
        //NEW SDEK AND

        global $DB;
        if ($USER->IsAuthorized()) {
            $id_user = $USER->GetID();
            $sess = 'user' . $id_user;
        } else {
            $sess = session_id();
        }

        //Сбор коризины
        $count = $DB->Query("SELECT SUM(item_count) AS sum_count FROM b_cart WHERE sess_id = '$sess'");
        $numRows = $count->SelectedRowsCount();
        $rows = $count->Fetch();
        if ($rows["sum_count"] != NULL) {
            $elemnts_id = array();
            $msg = "";
            $select_item = $DB->Query("SELECT * FROM `b_cart` WHERE `sess_id` = '$sess' ORDER BY `item_id` ");
            while ($items = $select_item->Fetch()) {
                $products[] = $items;
            }

            foreach ($products as $v) {
                $elemnts_id[] = $v['item_id'];
                $counts_elemnt = $counts_elemnt . "\r\n" . $v['item_id'] . " - " . $v['item_count'];
            }






            $el = new CIBlockElement;
            $PROP = array();
            $PROP[24] = $order_name; //Имя получателя
            $PROP[25] = $order_city; //Город
            $PROP[26] = "" . $order_street . " " . $order_room . ""; //Улица, дом, квартира
            $PROP[27] = $order_index; //Почтовый индекс
            $PROP[28] = $order_phone; //Номер телефона
            $PROP[29] = $order_phone2; //Дополнительный номер тел
            $PROP[30] = $elemnts_id; //Товары
            $PROP[31] = $counts_elemnt; //Колличество
            $PROP[39] = $sess;
            $PROP[43] = "" . $order_dostavka;
            $PROP[44] = "" . $order_oplata;
            $PROP[45] = "" . $deliveryprice;
            $PROP[46] = "" . $deliveryDateMax;
            $PROP[47] = "" . $postomat;
            $PROP[48] = "" . $postmat_id;
            $PROP[49] = "" . $dostavka_id;
            $PROP[50] = "" . $order_city_id;

            $arLoadProductArray = Array(
                "MODIFIED_BY" => 1,
                "IBLOCK_SECTION_ID" => false,
                "IBLOCK_ID" => 8,
                "PROPERTY_VALUES" => $PROP,
                "NAME" => $order_name,
                "ACTIVE" => "Y",
            );

            if ($PRODUCT_ID = $el->Add($arLoadProductArray)) {
                require "libmail.php";
                if ($USER->IsAuthorized()) {

                    $order_id = $PRODUCT_ID;
                    $EMAIL = $USER->GetEmail();
                    $date = Date('d-m-Y');
                    if ($EMAIL) {
                        $subject = "«MySecretPlace»: Вы оформили заказ N " . $order_id;
                        $message = "«MySecretPlace»: Вы оформили заказ N " . $order_id . " \n Ваш заказ номер " . $order_id . " от " . $date . " принят в работу. Наш менджер свяжется с Вами в ближайшее время для подтверждения заказа.";
                        //mail($EMAIL, $subject, $message, $headers);
                        //Отправка клиенту
                        $m = new Mail;
                        $m->From("info@mysecretplace.ru");
                        $m->To($EMAIL);
                        $m->CC("zolotarevkirill@yandex.ru");
                        $m->Subject($subject);
                        $m->Body($message);
                        $m->smtp_on("ssl://smtp.yandex.ru", "info@mysecretplace.ru", "3245139", 465);
                        $m->Send();

                        //Отправка админу
                        $m = new Mail;
                        $m->From("info@mysecretplace.ru");
                        $m->To("info@mysecretplace.ru");
                        $m->CC("zolotarevkirill@yandex.ru");
                        $m->Subject('Новый заказ на сайте');
                        $m->Body('Пройдите в административный разедл');
                        $m->smtp_on("ssl://smtp.yandex.ru", "info@mysecretplace.ru", "3245139", 465);
                        $m->Send();
                    }
                }


                //Отправка админу
                $m = new Mail;
                $m->From("info@mysecretplace.ru");
                $m->To("info@mysecretplace.ru");
                $m->CC("zolotarevkirill@yandex.ru");
                $m->Subject('Новый заказ на сайте');
                $m->Body('Пройдите в административный разедл');
                $m->smtp_on("ssl://smtp.yandex.ru", "info@mysecretplace.ru", "3245139", 465);
                $m->Send();


                $DB->Query("DELETE FROM b_cart WHERE sess_id = '$sess'");
                echo $PRODUCT_ID;
            } else {
                echo "Error";
            }
        } else {
            echo "FALSE";
        }
    }
    ?>
<?php endif; ?>
