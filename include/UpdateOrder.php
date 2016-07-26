<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("main");
global $USER;
?>
<?php if (CModule::IncludeModule("iblock")): ?>

    <?php
    global $DB;
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
    ?>


    <?php if ($rows["sum_count"] != NULL): ?>

        <?php
        $elemnts_id = array();

        $select_item = $DB->Query("SELECT * FROM `b_cart` WHERE `sess_id` = '$sess' ORDER BY `item_id` ");
        while ($items = $select_item->Fetch()) {
            $products[] = $items;
        }

        //Выборка товаров по ID
        foreach ($products as $v) {
            $elemnts_id[] = $v['item_id'];
            $counts_elemnt[$v['item_id']] = $v['item_count'];
        }


        $arSelect = Array("ID", "NAME", "DETAIL_PICTURE", "PROPERTY_price", "PROPERTY_art");
        $arFilter = Array("IBLOCK_ID" => 5, "ID" => $elemnts_id);
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
        while ($ob = $res->GetNextElement()) {
            $Fields[] = $ob->GetFields();
        }
        foreach ($Fields as $k => $Item) {
            $Fields[$k]["DETAIL_PICTURE"] = CFile::GetPath($Item["DETAIL_PICTURE"]);
            $Fields[$k]["PROPERTY_PRICE_VALUE"] = (int) $Item["PROPERTY_PRICE_VALUE"];
        }

        $sum = 0;
        $cn = 0;
        foreach ($Fields as $k => $Item) {
            $sum = (int) $sum + ((int) $Item["PROPERTY_PRICE_VALUE"] * (int) $counts_elemnt[$Item ["ID"]]);
            $cn = $cn + (int) $counts_elemnt[$Item ["ID"]];
        }
        ?>


        <div class="trash-item">
            <div class="row">
                <div class="col-xs-12 col-md-9 col-sm-9">
                    <h3>Корзина (<span><?php echo $cn; ?></span>)</h3>
                </div>

            </div>
            <div class="trash-item-header">
                <div class="row my-flex">
                    <div class="col-xs-12 col-md-2 col-sm-2">
                        <p>ПРОДУКТ</p>
                    </div>
                    <div class="col-xs-12 col-md-6 col-sm-6 my-flex">
                        <p>ТОВАР</p>
                    </div>
                    <div class="col-xs-12 col-md-2 col-sm-2 text-center">
                        <p>КОЛЛИЧЕСТВО</p>
                    </div>
                    <div class="col-xs-12 col-md-2 col-sm-2 text-right">
                        <p>ИТОГ</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- items -->
        <?php foreach ($Fields as $Item): ?>
            <?php
            $price = (int) $Item["PROPERTY_PRICE_VALUE"] * (int) $counts_elemnt[$Item ["ID"]];
            ?>
            <div class="trash-item-inner">
                <div class="row my-flex">
                    <div class="col-xs-12 col-md-2 col-sm-2">
                        <a href="#"><img src="<?= $Item["DETAIL_PICTURE"] ?>" class="full-width" alt="<?= $Item ["NAME"] ?>"></a>
                    </div>
                    <div class="col-xs-12 col-md-6 col-sm-6 my-flex">
                        <div class="my-flex trash-item-description">
                            <div>
                                <p class="item-name"><?= $Item ["NAME"] ?></p>
                                <p class="item-article">Арт: <?= $Item["PROPERTY_ART_VALUE"] ?></p>
                                <p class="item-price">Цена: <span><?= number_format($Item["PROPERTY_PRICE_VALUE"], 0, '', ' ') ?> ₽</span></p>
                            </div>
                            <div>
                                <a href="#" class="item-remove" data-item="remove-item-trash" onclick="javascript: DeleteOrderCart(<?= $Item ["ID"] ?>);
                                        return false;">Удалить</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-2 col-sm-2 text-center">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default btn-number"  data-type="minus" onclick="javascript: minusElement(<?= $Item ["ID"] ?>, '<?= $sess ?>');
                                        return false;"  data-field="quant[1]">
                                    <span class="glyphicon glyphicon-minus"></span>
                                </button>
                            </span>
                            <input type="text" name="quant[1]" class="form-control input-number" value="<?= $counts_elemnt[$Item ["ID"]] ?>" min="1" max="100">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default btn-number" data-type="plus" onclick="javascript: plusElement(<?= $Item ["ID"] ?>, '<?= $sess ?>');
                                        return false;" data-field="quant[1]">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-2 col-sm-2 text-right">
                        <p class="item-price-total"> <?= number_format($price, 0, '', ' ') ?> ₽</p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- items END -->
        <div class="trash-item-subfooter">
            <div class="row">
                <div class="col-xs-12 col-md-6 col-sm-6">
                </div>
                <div class="col-xs-12 col-md-6 col-sm-6 text-right">
                    <p class="trash-price-total">Итого: <span> <?= number_format($sum, 0, '', ' ') ?> ₽</span></p>
                    <p class="trash-terms">Скидки, налог и доставка будут влючены в общую стоимость</p>
                </div>
            </div>
        </div>
        <div class="trash-item-footer">
            <div class="row">
                <div class="col-xs-12 col-md-9 col-sm-9">
                    <h3>Корзина (<span><?php echo $cn; ?></span>)</h3>
                </div>
                <div class="col-xs-12 col-md-3 col-sm-3">
                    <a href="#" onclick="javascript: Order();" class="btn btn-warning full-width order-btn">ОФОРМИТЬ ЗАКАЗ</a>
                    <!--<button type="submit"  value="checkout__btn" name="from"></button>-->
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="trash-item">
            <div class="row">
                <div class="col-xs-12 col-md-9 col-sm-9">
                    <h3>Корзина (<span>0</span>)</h3>
                </div>

            </div>
            <div class="trash-item-header">
                <div class="row my-flex">
                    <div class="col-xs-12 col-md-2 col-sm-2">
                        <p>ПРОДУКТ</p>
                    </div>
                    <div class="col-xs-12 col-md-6 col-sm-6 my-flex">
                        <p>ТОВАР</p>
                    </div>
                    <div class="col-xs-12 col-md-2 col-sm-2 text-center">
                        <p>КОЛЛИЧЕСТВО</p>
                    </div>
                    <div class="col-xs-12 col-md-2 col-sm-2 text-right">
                        <p>ИТОГ</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="trash-item-subfooter">
            <div class="row">
                <div class="col-xs-12 col-md-6 col-sm-6">

                </div>
                <div class="col-xs-12 col-md-6 col-sm-6 text-right">
                    <p class="trash-price-total">Итого: <span> 0 ₽</span></p>
                    <p class="trash-terms">Скидки, налог и доставка будут влючены в общую стоимость</p>
                </div>
            </div>
        </div>
        <div class="trash-item-footer">
            <div class="row">
                <div class="col-xs-12 col-md-9 col-sm-9">
                    <h3>Корзина (<span>0</span>)</h3>
                </div>
                <div class="col-xs-12 col-md-3 col-sm-3">
                    <a href="#" class="btn btn-warning full-width order-btn">ОФОРМИТЬ ЗАКАЗ</a>
                    <!--<button type="submit"  value="checkout__btn" name="from"></button>-->
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>

