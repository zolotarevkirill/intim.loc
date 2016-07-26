<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "Линчый кабинет");
$APPLICATION->SetPageProperty("description", "Линчый кабинет");
$APPLICATION->SetTitle("Линчый кабинет");
global $USER;
if (!$USER->IsAuthorized()) {
    LocalRedirect("http://www.mysecretplace.ru/");
}
$rsUser = CUser::GetByID($USER->GetID());
$arUser = $rsUser->Fetch();


//echo "<pre>";
//var_dump($arUser);
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
                                <h2>Ваш адрес доставки</h2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-md-9 col-sm-9">
                                <form class="order-form login" data-toggle="validator" action="/include/account.php" method="post" role="form" data-form="send" id="accForm1">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xs-12 col-md-12 col-sm-12">
                                                <label>Ваш адрес</label>
                                            </div>
                                            <div class="col-xs-12 col-md-12 col-sm-12">
                                                <input type="text" id="adressUser" class="my-input form-control" placeholder="Введите адрес" value="<?=$arUser["PERSONAL_STREET"]?>">
                                                <input type="hidden" id="userID" class="my-input form-control" value="<?=$USER->GetID();?>">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-xs-12 col-md-3 col-sm-3">
                                <button type="button" id="acadres" class="btn btn-warning full-width">
                                    <?php if($arUser["PERSONAL_STREET"]):?>
                                        Изменить адрес
                                    <?php else:?>
                                        Сохранить адрес
                                    <?php endif;?>
                                </button>
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

