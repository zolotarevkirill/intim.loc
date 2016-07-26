<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "Линчый кабинет");
$APPLICATION->SetPageProperty("description", "Линчый кабинет");
$APPLICATION->SetTitle("Линчый кабинет");
global $USER;
if (!$USER->IsAuthorized()){
    LocalRedirect("http://www.mysecretplace.ru/");
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
                                <h2>Личные данные</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-6 col-sm-6">
                                <h4><strong>Ваши данные</strong></h4>
                                <form class="order-form login" data-toggle="validator" action="/include/account.php" method="post" role="form" data-form="send" id="accForm1">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12 col-sm-12">
                                                <label>Имя и фамилия</label>
                                            </div>
                                            <div class="col-xs-12 col-md-12 col-sm-12">
                                                <input type="text" id="FirstName" class="my-input form-control" placeholder="Имя" value="<?=$USER->GetFirstName();?>">
                                                <input type="hidden" id="userID" class="my-input form-control" value="<?=$USER->GetID();?>">
                                            </div>
                                            <div class="col-xs-12 col-md-12 col-sm-12">
                                                <input type="text" id="LastName" class="my-input form-control" placeholder="Фамилия" value="<?=$USER->GetLastName();?>">
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $rsUser = CUser::GetByID($USER->GetID());
                                    $arUser = $rsUser->Fetch();
                                    //echo "<pre>";
                                    //var_dump($arUser);
                                    ?>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12 col-sm-12">
                                                <label>Дата рождения</label>
                                            </div>
                                            <div class="col-xs-12 col-md-12 col-sm-12">
                                                <input type="text" id="PERSONAL_BIRTHDATE" class="my-input form-control" placeholder="дд.мм.гггг" value="<?=$arUser["PERSONAL_BIRTHDAY"]?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12 col-sm-12">
                                                <label>Пол</label>
                                            </div>
                                            <div class="col-xs-12 col-md-12 col-sm-12">
                                                <select name="sex" id="PERSONAL_GENDER" class="my-input form-control">
                                                    <?php if($arUser["PERSONAL_GENDER"] != "M" && $arUser["PERSONAL_GENDER"] !== "F"):?>
                                                        <option value="none" selected>Неуказан</option>
                                                    <?php else:?>
                                                        <option value="none">Неуказан</option>
                                                    <?php endif;?>
                                                        
                                                        
                                                    <?php if($arUser["PERSONAL_GENDER"] == "M"):?>
                                                        <option value="M" selected>Мужской</option>
                                                    <?php else:?>
                                                        <option value="M">Мужской</option>
                                                    <?php endif;?>
                                                        
                                                    <?php if($arUser["PERSONAL_GENDER"] == "F"):?>
                                                        <option value="F" selected>Женский</option>
                                                    <?php else:?>
                                                        <option value="F">Женский</option>
                                                    <?php endif;?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                             <div class="col-xs-12 col-md-12 col-sm-12">
                                                <label>Телефон</label>
                                                <div class="col-xs-12 col-md-12 col-sm-12">
                                                    <input type="text" id="PERSONAL_PHONE" class="my-input form-control" placeholder="+7 999 111 11 11" value="<?=$arUser["PERSONAL_PHONE"]?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12 col-sm-12">
                                                <button type="submit" id="acc1" class="btn btn-warning">Сохранить</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <h4><strong>Смена e-mail</strong></h4>
                                <form class="order-form login" data-toggle="validator" action="" method="post" role="form" data-form="send">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12 col-sm-12">
                                                <label>Новый Email</label>
                                            </div>
                                            <div class="col-xs-12 col-md-12 col-sm-12">
                                                <input type="text" id="UserEmail" class="my-input form-control" value="<?=$arUser['EMAIL']?>" placeholder="Новый Email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12 col-sm-12">
                                                <button type="submit" id="acc2" class="btn btn-warning">Сохранить</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-xs-12 col-md-6 col-sm-6">
                                <h4><strong>Смена пароля</strong></h4>
                                <form class="order-form login" data-toggle="validator" action="" method="post" role="form" data-form="send" id="PswdForm">
                                    <p>Ваш пароль должен содержать не менее 6 символов. Мы рекомендуем вам использовать 8 - символьный пароль с использованием цифр и специальных символов.</p>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12 col-sm-12">
                                                <label>Старый пароль</label>
                                            </div>
                                            <div class="col-xs-12 col-md-12 col-sm-12">
                                                <input type="password" id="pswd1" class="my-input form-control" placeholder="Старый пароль">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12 col-sm-12">
                                                <label>Введите ваш новый пароль</label>
                                            </div>
                                            <div class="col-xs-12 col-md-12 col-sm-12">
                                                <input type="password" id="pswd2" class="my-input form-control"  data-minlength="6" placeholder="Введите пароль" required>
                                            </div>
                                            <div class="col-xs-12 col-md-12 col-sm-12">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12 col-sm-12">
                                                <label>Повторите ваш пароль</label>
                                            </div>
                                            <div class="col-xs-12 col-md-12 col-sm-12">
                                                <input type="password"  id="pswd3" class="form-control"  data-match="#pswd2" data-match-error="Пароли не совпадаеют!" placeholder="Подтвердите пароль" required>
                                            </div>
                                            <div class="col-xs-12 col-md-12 col-sm-12">
                                                <div class="help-block with-errors help-new"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12 col-sm-12">
                                                <button type="submit" id="acc3" class="btn btn-warning">Сохранить</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
<div style="display: none;" class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	Изминения <strong>сохраненны!</strong>  
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

