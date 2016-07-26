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
        $products = array();
        $sess = session_id();

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
            $select_item = $DB->Query("SELECT * FROM `b_cart` WHERE `sess_id` = '$sess' ORDER BY `item_id` ");
            while ($items = $select_item->Fetch()) {
                $products[] = $items;
            }
            //Выборка товаров по ID
            foreach ($products as $v) {
                $elemnts_id[] = $v['item_id'];
                $counts_elemnt[$v['item_id']] = $v['item_count'];
            }
            $arSelect = Array("ID", "NAME", "DETAIL_PICTURE", "PROPERTY_price");
            $arFilter = Array("IBLOCK_ID" => 5, "ID" => $elemnts_id);
            $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
            while ($ob = $res->GetNextElement()) {
                $Fields[] = $ob->GetFields();
            }
            foreach ($Fields as $k => $Item) {
                $Fields[$k]["DETAIL_PICTURE"] = CFile::GetPath($Item["DETAIL_PICTURE"]);
                $Fields[$k]["PROPERTY_PRICE_VALUE"] = (int) $Item["PROPERTY_PRICE_VALUE"] ;
            }

            $sum = 0;
            foreach ($Fields as $k => $Item) {
                $sum = (int) $sum + ((int) $Item["PROPERTY_PRICE_VALUE"] * $counts_elemnt[$Item['ID']]);
            }
            ?> 


            <div class="offcanvas-body">
                <div class="viewport-menu">
                    <?php foreach ($Fields as $Item): ?>
                        <div class="offcanvas-body-item">
                            <div>
                                <a href="#"><img src="<?= $Item["DETAIL_PICTURE"] ?>" alt="<?= $Item ["NAME"] ?>"></a>
                            </div>
                            <div>
                                <p class="item-name"><?= $Item ["NAME"] ?></p>
                                <p class="item-quantity">Кол-во: <span><?= $counts_elemnt[$Item ["ID"]] ?></span></p>
                                <p class="item-price" data-price="<?= $Item["PROPERTY_PRICE_VALUE"] ?>"><?= $Item["PROPERTY_PRICE_VALUE"] ?> &#8381;</p>
                            </div>
                            <div>
                                <button type="button" data-item="<?= $Item ["ID"] ?>" onclick="javascript: DeleteCart(<?= $Item ["ID"] ?>);
                                        return false;" class="item-delete btn" data-item="offcanvas-item-delete"><i class="glyphicon glyphicon-remove"></i></button>
                            </div>
                        </div>
            <?php endforeach; ?>
                </div>
            </div>    
            <div class="offcanvas-footer">
                <div class="offcanvas-footer-lvl-1">
                    <div class="row">
                        <div class="col-xs-5 col-md-6 col-sm-6">
                            <h3>Итого</h3>
                        </div>
                        <div class="col-xs-7 col-md-6 col-sm-6 text-right">
                            <h3><?= number_format($sum, 0, '', ' ') ?> &#8381;</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-sm-12">
                        <hr class="line" />
                    </div>
                </div>
                <div class="offcanvas-footer-lvl-2">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-sm-12">
                            <a href="/order/" class="btn btn-warning full-width">Оформить заказ</a>
                            <!--<button type="button" class="btn btn-warning full-width" value="view_cart_btn" name="from">Оформить заказ</button>-->
                        </div>
                    </div>
                </div>
            </div>

            <?php
        } else {
            ?>  

            <div class="offcanvas-body">

            </div>
            <div class="offcanvas-footer">
                <div class="offcanvas-footer-lvl-1">
                    <div class="row">
                        <div class="col-xs-5 col-md-6 col-sm-6">
                            <h3>Итого</h3>
                        </div>
                        <div class="col-xs-7 col-md-6 col-sm-6 text-right">
                            <h3>0 &#8381;</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-12 col-sm-12">
                        <hr class="line" />
                    </div>
                </div>
                <div class="offcanvas-footer-lvl-2">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-sm-12">
                            <button type="button" class="btn btn-warning full-width" value="view_cart_btn" name="from">Оформить заказ</button>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    <?php endif; ?>
<?php endif; ?>


