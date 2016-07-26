<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "Линчый кабинет");
$APPLICATION->SetPageProperty("description", "Линчый кабинет");
$APPLICATION->SetTitle("Линчый кабинет - История заказв");
global $USER;
if (!$USER->IsAuthorized()) {
    LocalRedirect("http://www.mysecretplace.ru/");
}
$rsUser = CUser::GetByID($USER->GetID());
$arUser = $rsUser->Fetch();

$user_id = $USER->GetID();
$sess = 'user' . $user_id;

if (CModule::IncludeModule("iblock")) {
    $arSelect = Array("ID", "NAME", "PROPERTY_ORDERS", "DATE_CREATE");
    $arFilter = Array("IBLOCK_ID" => 8, "=PROPERTY_USER" => $sess);
    $res = CIBlockElement::GetList(Array("DATE_CREATE" => "DESC"), $arFilter, false, Array("nPageSize" => 50), $arSelect);
    while ($ob = $res->GetNextElement()) {
        $arFields[] = $ob->GetFields();
    }

    foreach ($arFields as $k => $v) {
        foreach ($v["PROPERTY_ORDERS_VALUE"] as $i) {
            $arSelect = Array("ID", "NAME", "PROPERTY_price");
            $arFilter = Array("IBLOCK_ID" => 5, "=ID" => $i);
            $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 50), $arSelect);
            while ($ob = $res->GetNextElement()) {
                $arFields[$k]['PRODUCTS'][] = $ob->GetFields();
            }
        }
    }
    
 

}
?>
<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-3 col-sm-3">
                <section class="content white">
                    <div class="holder-bg">
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-sm-12">
                                <h2>Личный кабинет</h2>
                                <ul class="login-list">
                                    <li class="active"><a href="/account/adress/">Адрес доставки</a></li>
                                    <li><a href="/account/">Личные данные</a></li>
                                    <li><a href="/account/history/">История заказов</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-xs-12 col-md-9 col-sm-9">
                <section class="content white">
                    <div class="holder-bg">
                        <div class="row">
                            <div class="col-xs-12 col-md-12 col-sm-12">
                                <h2>История заказов</h2>
                            </div>
                        </div>
                        <div class="row">
                            <?php foreach($arFields as $item):?>
                            <div class="col-xs-12 col-md-12 col-sm-12">
                                <div class="history-item">
                                    <div><h4><?=$item["DATE_CREATE"]?></h4></div>
                                    <div>
                                        <p>
                                            <?php $sum = 0; ?>
                                            <?php foreach($item["PRODUCTS"] as $pr):?>
                                                <a href="#"><?=$pr["NAME"]?></a>, 
                                                <?php $sum = ($sum + (int)$pr["PROPERTY_PRICE_VALUE"]);?>
                                            <?php endforeach; ?>
                                        </p>
                                    </div>
                                    <div><p><?=number_format($sum, 0, '', ' ')?> руб.</p></div>
                                    <div><button type="button" class="btn btn-warning povtor" data-item="<?=$item['ID']?>" data-user="<?=$user_id?>">Повторить заказ</button></div>
                                </div>
                                <hr>
                            </div>
                            <?php endforeach; ?>
                            

                        </div>

                    </div>
                </section>
            </div>
        </div>
    </div>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

