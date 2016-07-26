<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Оформление заказа");
CModule::IncludeModule("main");
require 'city_arr.php';



global $USER;

if ($USER->IsAuthorized()) {
    $rsUser = CUser::GetByID($USER->GetID());
    $arUser = $rsUser->Fetch();
}
?>
<script>
    $(document).ready(function () {
        UpdateOrder();
        GetPostList(44);
        GetDeliveryCost();
        
        $('#postmatdiv').hide();
        
        $('#newcity').change(function(){
            GetPostList($(this).val());
            GetDeliveryCost();
        });
        
        
        $('#newdostavka').change(function(){
            if($(this).val() == '302'){
                $('#postmatdiv').show();
                $('#oplt option:last').hide();
            }else{
                $('#postmatdiv').hide();
                $('#oplt option:last').show();
            }
            GetDeliveryCost();
        });
    });

    function GetPostList(city_id) {
        $('#newdostavka option:last').hide();
        var PostListJson = $.get('http://www.mysecretplace.ru/order/postomat.php?city_id=' + city_id, function (data) {
            var PostList = JSON.parse(data);
            $('#postomat option').remove();
            $.each(PostList,function(k,v){
                $('#newdostavka option:last').show();
                $('#postomat').append('<option value="'+k+'">'+v+'</option>');
            });
            
        });
    }
    
    
    function GetDeliveryCost(){
        var city_id = $('#newcity').val();
        var tarif_id = $('#newdostavka').val();
        $.get('/order/delivery/?city_id='+city_id+'&tarif_id='+tarif_id,function(data){
            var Result = JSON.parse(data)['result'];
            $('#deliveryprice').val(Result.price);
            $('#deliveryDateMax').val(Result.deliveryDateMax);
            var text = 'По выбранным параметрам доставка будет '+Result.deliveryDateMax+' Стоимость доставки составит '+Result.price+' рублей.';
            $('#deliverytext').text(text);
        })
      
    }
</script>
<section class="content white">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-sm-12">
                <div class="holder-bg">
                    <div class="trash-item">

                        <?php if ($_GET['order'] == 1): ?>
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-sm-12">
                                    <h3 class="text-center">Спасибо! Ваш заказ оформлен. <br/>Номер Вашего заказа <?= $_GET['clientid'] ?><br/>Информация о заказе отправленна Вам на почту.</h3>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-sm-12">
                                    <h3 class="text-center">Пожалуйста, заполните адрес доставки.</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-7 col-sm-7">
                                    <form class="order-form" data-toggle="validator" action="" method="post" role="form" data-form="send">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-xs-12 col-md-5 col-sm-5 text-right">
                                                    <label>Имя получателя:</label>
                                                </div>
                                                <div class="col-xs-12 col-md-7 col-sm-7">
                                                    <?php if ($USER->IsAuthorized()): ?>
                                                        <input type="text" value="<?= $USER->GetFullName() ?>" name="order-name" id="order-name"  class="my-input form-control" placeholder="Иванов Иван Иванович">
                                                    <?php else: ?>
                                                        <input type="text" name="order-name" id="order-name"  class="my-input form-control" placeholder="Иванов Иван Иванович">
                                                    <?php endif; ?>
                                                    <p>Пожалуйста, введите полностью ФИО получателя без сокращений (например: Ivanov Ivan Ivanovich).</p>
                                                </div>
                                                <div class="col-xs-12 col-md-offset-5 col-sm-offset-5 col-md-7 col-sm-7">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php if ($USER->IsAuthorized()): ?>
                                        
                                            <?php
                                            //echo "<pre>";
                                            //var_dump($arUser);
                                            ?>
                                        
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-5 col-sm-5 text-right">
                                                        <label>Город:</label>
                                                    </div>
                                                    <div class="col-xs-12 col-md-7 col-sm-7">
                                                        <select name="newcity" id="newcity" class="form-control">
                                                            <?php if($arUser["PERSONAL_CITY"] == 'Москва'):?>
                                                            <option value="44">Москва</option>
                                                            <?php else:?>
                                                                <?php foreach ($city as $k => $v): ?>
                                                                        <?php if($arUser["PERSONAL_CITY"] == $v):?>
                                                                            <option value="<?= $k ?>"><?= $v ?></option>
                                                                         <?php endif;?>
                                                                <?php endforeach; ?>
                                                            <?php endif;?>
                                                            <optgroup label="Московская область">
                                                                <?php foreach ($city as $k => $v): ?>
                                                                    <option value="<?= $k ?>"><?= $v ?></option>
                                                                <?php endforeach; ?>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                    <div class="col-xs-12 col-md-offset-5 col-sm-offset-5 col-md-7 col-sm-7">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-5 col-sm-5 text-right">
                                                        <label>Улица, дом, квартира:</label>
                                                    </div>
                                                    <div class="col-xs-12 col-md-7 col-sm-7">
                                                        <input type="text" name="order-street" id="order-street" class="my-input form-control" placeholder="улица, дом" value="<?= $arUser["PERSONAL_STREET"] ?>">
                                                    </div>
                                                    <div class="col-xs-12 col-md-offset-5 col-sm-offset-5 col-md-7 col-sm-7">
                                                        <input type="text" name="order-room" id="order-room" class="my-input form-control" placeholder="квартира" value="<?=$arUser["PERSONAL_NOTES"]?>">
                                                    </div>
                                                    <div class="col-xs-12 col-md-offset-5 col-sm-offset-5 col-md-7 col-sm-7">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                            
                                        <?php else: ?>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-5 col-sm-5 text-right">
                                                        <label>Город:</label>
                                                    </div>
                                                    <div class="col-xs-12 col-md-7 col-sm-7">
                                                        <select name="newcity" id="newcity" class="form-control">
                                                            <option value="44">Москва</option>
                                                            <optgroup label="Московская область">
                                                                <?php foreach ($city as $k => $v): ?>
                                                                    <option value="<?= $k ?>"><?= $v ?></option>
                                                                <?php endforeach; ?>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                    <div class="col-xs-12 col-md-offset-5 col-sm-offset-5 col-md-7 col-sm-7">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-5 col-sm-5 text-right">
                                                        <label>Улица, дом, квартира:</label>
                                                    </div>
                                                    <div class="col-xs-12 col-md-7 col-sm-7">
                                                        <input type="text" name="order-street" id="order-street" class="my-input form-control" placeholder="улица, дом">
                                                    </div>
                                                    <div class="col-xs-12 col-md-offset-5 col-sm-offset-5 col-md-7 col-sm-7">
                                                        <input type="text" name="order-room" id="order-room" class="my-input form-control" placeholder="квартира">
                                                    </div>
                                                    <div class="col-xs-12 col-md-offset-5 col-sm-offset-5 col-md-7 col-sm-7">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-5 col-sm-5 text-right">
                                                        <label>Почтовый индекс:</label>
                                                    </div>
                                                    <div class="col-xs-12 col-md-7 col-sm-7">
                                                        <input type="text" name="order-index" id="order-index" class="my-input form-control" placeholder="123456">
                                                        <p>Если в Вашей стране нет почтового индекса, введите "None".</p>
                                                    </div>
                                                    <div class="col-xs-12 col-md-offset-5 col-sm-offset-5 col-md-7 col-sm-7">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>


                                        <?php if ($USER->IsAuthorized()): ?>


                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-5 col-sm-5 text-right">
                                                        <label>Номер телефона:</label>
                                                    </div>
                                                    <div class="col-xs-12 col-md-7 col-sm-7">
                                                        <input type="tel" data-item="" name="order-phone"  value="<?= $arUser["PERSONAL_PHONE"] ?>" id="order-phone" class="my-input form-control" placeholder="+7 968 704 88 70">
                                                        <p>Код страны - код оператора - номер телефона</p>
                                                    </div>
                                                    <div class="col-xs-12 col-md-offset-5 col-sm-offset-5 col-md-7 col-sm-7">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-5 col-sm-5 text-right">
                                                        <label>Email:</label>
                                                    </div>
                                                    <div class="col-xs-12 col-md-7 col-sm-7">
                                                        <input type="text" data-item="text" name="order-phone2" id="order-phone2" value="<?= $arUser['EMAIL'] ?>" class="my-input form-control" placeholder="info@mysecretplace.ru">
                                                        <p>Электронный адрес для связи с Вами</p>
                                                    </div>
                                                    <div class="col-xs-12 col-md-offset-5 col-sm-offset-5 col-md-7 col-sm-7">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php else: ?>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-5 col-sm-5 text-right">
                                                        <label>Номер телефона:</label>
                                                    </div>
                                                    <div class="col-xs-12 col-md-7 col-sm-7">
                                                        <input type="tel" data-item="phone" name="order-phone" id="order-phone" class="my-input form-control" placeholder="+7 968 704 88 70">
                                                        <p>Код страны - код оператора - номер телефона</p>
                                                    </div>
                                                    <div class="col-xs-12 col-md-offset-5 col-sm-offset-5 col-md-7 col-sm-7">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-5 col-sm-5 text-right">
                                                        <label>Дополнительный номер телефона:</label>
                                                    </div>
                                                    <div class="col-xs-12 col-md-7 col-sm-7">
                                                        <input type="tel" data-item="phone" name="order-phone2" id="order-phone2" class="my-input form-control" placeholder="+7 968 704 88 70">
                                                        <p>Код страны - код города - номер телефона</p>
                                                    </div>
                                                    <div class="col-xs-12 col-md-offset-5 col-sm-offset-5 col-md-7 col-sm-7">
                                                        <div class="help-block with-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </form>
                                </div>
                                <div class="col-xs-12 col-md-5 col-sm-5">
                                    <br>
                                    <h4>
                                        По любым вопросам касательно доставки обращаться по контактам ниже либо на странице контактов есть список отделов.
                                    </h4>
                                    <address>
                                        <div><i class="glyphicon glyphicon-earphone"></i><a href="tel:74959674867">+7 495 967 48 67</a></div>
                                        <div><i class="glyphicon glyphicon-envelope"></i><a href="mailto:info@mysecretplace.ru">info@mysecretplace.ru</a></div>
                                        <div><i class="glyphicon glyphicon-map-marker"></i><p>105005 Россия, г.Москва улица Бакунинская дом 4 стр 2</p></div>
                                    </address>
                                </div>
                            </div>

                            <!-- NEW-->
                            <div class="row">
                                <div class="col-xs-12 col-md-12 col-sm-12">
                                    <h3 class="text-center">Доставка</h3><br/>
                                    <input type="hidden" name="deliveryprice" id="deliveryprice" value="0"/>
                                    <input type="hidden" name="deliveryDateMax" id="deliveryDateMax" value="0"/>
                                </div>
                            </div>
                            <div class="row order-form">
                                <div class="col-xs-12 col-md-7 col-sm-7">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-5 col-sm-5 text-right">
                                                <label>Способ доставки:</label>
                                            </div>
                                            <div class="col-xs-12 col-md-7 col-sm-7">
                                                <select name="newdostavka" id="newdostavka" class="form-control">
                                                    <option value="139">Доставка курьером</option>
                                                    <option value="302">Пункт выдачи «POSTOMAT»</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-md-offset-5 col-sm-offset-5 col-md-7 col-sm-7">
                                                <div class="help-block with-errors"> <p id="deliverytext"></p></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-5 col-sm-5" id="postmatdiv">
                                    <!--Суда ПВЗ список -->
                                    <select name="postomat" id="postomat" class="form-control">
                                        <option value="">Постомат</option>
                                    </select>
                                </div>
                            </div>
                            <!-- NEW-->

                            <div class="row order-form">
                                <div class="col-xs-12 col-md-12 col-sm-12 text-center">
                                    <h3 class="text-center">Оплата</h3><br/>
                                </div>
                                <div class="col-xs-12 col-md-7 col-sm-7">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-5 col-sm-5 text-right">
                                                <label>Способ оплаты:</label>

                                            </div>
                                            <div class="col-xs-12 col-md-7 col-sm-7">
                                                <select name="oplata" id="oplt" class="form-control">
                                                    <option value="NaN">Выберите способ оплаты...</option>
                                                    <option value="z1">Оплата наличными курьеру</option>
                                                    <option value="z3">Безналичная оплата картой курьеру</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-md-offset-5 col-sm-offset-5 col-md-7 col-sm-7">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                        <!--
                                        <div class="row">
                                            <form action="https://money.yandex.ru/eshop.xml" method="post">
                                                <input name="shopId" value="51531" type="hidden"/>
                                                <input name="scid" value="4321" type="hidden"/>
                                                <input name="sum" value="100.50" type="hidden">
                                                <input name="customerNumber" value="abc000" type="hidden"/>
                                                <input name="paymentType" value="AC" type="hidden"/>
                                                <input name="orderNumber" value="abc1111111" type="hidden"/>
                                                <input name="cps_phone" value="79110000000" type="hidden"/>
                                                <input name="cps_email" value="user@domain.com" type="hidden"/>
                                                <input type="submit" value="Заплатить"/>
                                            </form>
                                        </div>
                                        -->
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-5 col-sm-5">
                                    <p class="textDostavka1" id="z1">
                                        При наличной оплате Вы получаете скидку 3% на все товары в Вашем заказе. Данный способ оплаты действителен при курьерской доставке по Москве и МО. У вас есть возможность оплатить заказ, передав деньги непосредственно в руки курьеру.
                                    </p>
                                    <p class="textDostavka1" id="z3">
                                        Оплата картой курьеру- К оплате принимаются карты VISA Classic/Gold/Platinum и MasterCard Standart/Gold, а также большинство карт VISA Electron, предназначенных для оплаты покупок в интернет и имеющих CVC2/CVV2 код.
                                    </p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
</section>
<br>
<section class="content white">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-12 col-sm-12">
                <div class="holder-bg ajax-order">

                </div>
            </div>
        </div>
    </div>
</section>
<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>